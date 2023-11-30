<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->library('session');
		
		if($this->session->has_userdata('user'))
			$data = array('nav1_text' => 'Dashboard', 'nav1_link' => 'dashboard',
						  'nav2_text' => 'Logout', 'nav2_link' => 'dashboard/logout');
		else
			$data = array('nav1_text' => 'Login', 'nav1_link' => 'login',
						  'nav2_text' => 'Become a member', 'nav2_link' => 'register');

		$this->load->view('landing', $data);
	}
}
