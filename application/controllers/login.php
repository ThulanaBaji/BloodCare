<?php

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
        $this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
	
		if(isset($_POST['email'])){
			if($this->form_validation->run() == TRUE){
				redirect('/');
        	}
		}

        $this->load->view('login');
	}
}
