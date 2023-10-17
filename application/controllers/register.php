<?php

class Register extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('register/index');
	}

	//registration for a donor
	public function donor(){
		$this->load->view('register/donor');
	}

	//registration for a hospital
	public function hospital(){
		$this->load->view('register/hospital');
	}
}
