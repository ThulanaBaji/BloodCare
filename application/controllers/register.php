<?php

class Register extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->database();
		$this->load->model('user_model');
	}

	public function index()
	{
		if($this->session->has_userdata('user'))
			redirect('/dashboard');
		$this->load->view('register');
	}

	//registration for a donor
	public function donor(){
		if($this->session->has_userdata('user'))
			redirect('/dashboard');
		$this->load->view('donor/register');
	}

	//registration for a hospital
	public function hospital(){
		if($this->session->has_userdata('user'))
			redirect('/dashboard');

		$message = $this->session->flashdata('message');
		$error = $this->session->flashdata('error');
		$data = '';

		if($message != '')
			$data = array('message' => $message);
		if($error != '')
			$data = array('error' => $error);

		$this->load->view('hospital/register', $data);
	}

	//registration form submission for a donor
	public function registerDonor(){
		if(!isset($_POST['email']))
			redirect('register/donor');

		if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){ 
		
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.SECRET_KEY.'&response='.$_POST['g-recaptcha-response']); 
			$responseData = json_decode($verifyResponse); 
			if(!$responseData->success){
				$this->session->set_flashdata('error', 'recaptcha failed');
				redirect('register/hospital');
			}
		}

		if($this->user_model->nonHospitalExists($_POST['email'])){
			$this->session->set_flashdata('message', 'You have already registered, login to access your portal');
			redirect('login');
		} 
		else{
			$this->user_model->registerDonor($_POST);
			$this->session->set_flashdata('message', 'Your registration was successful, login to access your portal');
			redirect('login');
		}
	}

	public function registerHospital(){
		if(!isset($_POST['email']))
			redirect('register/hospital');

		if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){ 
			
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.SECRET_KEY.'&response='.$_POST['g-recaptcha-response']); 
			$responseData = json_decode($verifyResponse); 
			if(!$responseData->success){
				$this->session->set_flashdata('error', 'recaptcha failed');
				redirect('register/hospital');
			}
		}
			
		$result = $this->user_model->getHospitalState($_POST['email']);

		switch($result){
			case 0:
				$random_hash = md5(uniqid(rand().time(), true));
			
				if($this->sendverification($_POST['email'], $random_hash)){
					$this->user_model->registerHospital($_POST, $random_hash);

					$this->session->set_flashdata('message', 'We\'ve sent you a verification link. Please check your inbox');
					redirect('register/verify');
				}
				else{
					$this->session->set_flashdata('message', 'Sorry! We couldn\'t send you a verification link. Please register again later. If this continues, contact our support team');
					$this->session->set_flashdata('button_text', 'Register');
					$this->session->set_flashdata('button_url', 'register/hospital');

					redirect('register/verify');
				}
				break;

			case -3:
				$random_hash = md5(uniqid(rand().time(), true));
			
				if($this->sendverification($_POST['email'], $random_hash)){
					$this->user_model->updateVerificationKey($_POST['email'], $random_hash);

					$this->session->set_flashdata('message', 'You have already submitted the registration form, however your verification link was expired, so we sent a new verification link. Please check your inbox');
					redirect('register/verify');
				}else{
					$this->session->set_flashdata('message', 'You have already submitted the registration form, however your verification link was expired, but we were unable to send a new verification link. Please try logging in again. That way we can send you a new verification link.');
					$this->session->set_flashdata('button_text', 'Login');
					$this->session->set_flashdata('button_url', 'login');
					redirect('register/verify');
				}
				break;

			case -2:
				$this->session->set_flashdata('message', 'We have already registered you. Please verify your account with the verification link we have sent to your inbox');
				redirect('register/verify');
				break;

			case 1:
				$this->session->set_flashdata('message', 'We have already registered you, login to access your portal');
				redirect('login');
				break;
			
			case -1:
				$this->session->set_flashdata('message', 'We have already registered you, login to access your portal');
				redirect('login');
				break;
			
		}
	}

	public function verify($email = null, $key = null){
		if(isset($email)){
			
			$result = $this->user_model->getHospitalState($email);

			switch($result){
				case 0:
					$this->session->set_flashdata('error', 'Register first to receive a verification link');
					redirect('register/hospital');
					break;
	
				case -3:
					$random_hash = md5(uniqid(rand().time(), true));
				
					if($this->sendverification($email, $random_hash)){
						$this->user_model->updateVerificationKey($email, $random_hash);
	
						$this->session->set_flashdata('message', 'We sent you a new verification link. Please check your inbox');
						redirect('register/verify');
					}else{
						$this->session->set_flashdata('message', 'Your verification link was expired, but we couldn\'t send you a new verification link. Try generating a new link');
						$this->session->set_flashdata('button_text', 'Generate verification link');
						$this->session->set_flashdata('button_url', 'register/verify/'.$email);
						redirect('register/verify');
					}
					break;
	
				case -2:
					if(isset($key)){
						$verify_result = $this->user_model->verifyHospital($email, $key);

						if($verify_result)
							$this->load->view('verify/page', array('message' => 'Your account is verified. Please login to access your portal', 'button_text' => 'Login', 'button_url' => 'login'));
						else
							$this->load->view('verify/page', array('message' => 'Invalid verification link. Go to home','button_text' => 'Home', 'button_url' => ''));
					}
					break;
	
				case 1:
					$this->session->set_flashdata('message', 'Your account is already verified, login to access your portal');
					$this->session->set_flashdata('button_text', 'Login');
					$this->session->set_flashdata('button_url', 'login');
					redirect('register/verify');
					break;
				
				case -1:
					$this->session->set_flashdata('message', 'Your account is already verified, login to access your portal');
					$this->session->set_flashdata('button_text', 'Login');
					$this->session->set_flashdata('button_url', 'login');
					redirect('register/verify');
					break; 
			}
		}
		else{
			$message = $this->session->flashdata('message');
			$button_text = $this->session->flashdata('button_text');
			$button_url = $this->session->flashdata('button_url');

			if(!empty($message)){
				if(!empty($button_text)){
					$data = array('message' => $message, 'button_text' => $button_text, 'button_url' => $button_url);
					$this->load->view('verify/page', $data);
				}else{
					$this->load->view('verify/page', array('message' => $message));
				}
			}else{
				redirect('/');
			}
		}
	}

	public function sendverification($to, $key){
		$this->load->library('email');

        $this->email->from('bloodcarelk@gmail.com', 'BloodCare');
        $this->email->to($to);
        $this->email->subject('Verify your account');

		$link = base_url().'verify/'.$to.'/'.$key;
		$mailContent = $this->load->view('verify/email', array('link' => $link), true);
        $this->email->message($mailContent);
		
		$this->email->set_newline("\r\n");

        if($this->email->send())
			return true;
		return false;
	}
}