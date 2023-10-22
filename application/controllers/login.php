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
			redirect('/dashboard');

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
				
				if(isset($result)){
					$userinfo = array(
						'id'=> $result->id,
						'name' => $result->name,
						'role' => $result->role,
						'login'=> true
					);
					$this->session->set_userdata('user', $userinfo);
					redirect('/dashboard');
					return;
				}
				else{
					$data = array('error' => 'Check your email or password again');
				}
        	}
		}

        $this->load->view('login', $data);
	}
}