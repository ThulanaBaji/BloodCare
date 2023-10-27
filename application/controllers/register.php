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
		$this->load->view('hospital/register');
	}

	//registration form submission for a donor
	public function registerDonor(){
		if(!isset($_POST['email']))
			redirect('register');
		if($this->user_model->userExists($_POST['email'])){
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
			redirect('register');
		if($this->user_model->userExists($_POST['email'])){
			$this->session->set_flashdata('message', 'You have already registered, login to access your portal');
			redirect('login');
		}
		else{
			$random_hash = md5(uniqid(rand().time(), true));
			$this->user_model->registerHospital($_POST, $random_hash);
			$this->session->set_flashdata('message', 'Your registration was successful, login to access your portal');
			redirect('login');
		}
	}

	private function sendMail($email, $key){
		$this->load->library('email');

        $this->email->from('bloodcarelk@gmail.com', 'bloodcare');
        $this->email->to($email);
        $this->email->subject('Verification');
        $this->email->message('The email send using codeigniter library '.time());

        if(!$this->email->send())
            show_error($this->email->print_debugger());
	}
}