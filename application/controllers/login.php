<?php

class Login extends CI_Controller {

	public function __construct(){
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
			redirect('/'.$this->session->userdata('user')['role'].'/dashboard');

		$message = $this->session->flashdata('message');
		$error = $this->session->flashdata('error');
		$data = '';

		if($message != '')
			$data = array('message' => $message);
		if($error != '')
			$data = array('error' => $error);

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
	
		if(isset($_POST['email'])){
			if($this->form_validation->run() == TRUE){
				$result = $this->user_model->authenticate($_POST);
				
				switch($result->code){
					case 0:
						$data = array('error' => 'Check your email or password again');
						break;
		
					case -3:
						$this->session->set_flashdata('message', 'Your verification link was expired. Click the button below to generate a new link');
						$this->session->set_flashdata('button_text', 'Generate verification link');
						$this->session->set_flashdata('button_url', 'register/verify/'.$_POST['email']);
						redirect('register/verify');
						break;
		
					case -2:
						$this->session->set_flashdata('message', 'We have sent you a registration link to your inbox. Please verify your account with it to login');
						redirect('register/verify');
						break;
		
					case 1:
						$userinfo = array(
							'id'=> $result->id,
							'role' => $result->role
						);

						$this->session->set_userdata('user', $userinfo);
						redirect($result->role.'/dashboard');
						return;
					
					case -1:
						$userinfo = array(
							'id'=> $result->id,
							'role' => $result->role
						);
						
						$this->session->set_userdata('user', $userinfo);
						redirect($result->role.'/dashboard');
						return;
				}
        	}
		}

        $this->load->view('login', $data);
	}
}