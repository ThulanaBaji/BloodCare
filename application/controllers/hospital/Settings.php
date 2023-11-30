<?php

class Settings extends CI_Controller {
    public function __construct(){
		parent::__construct();

		$this->load->library('session');
        
        if(!$this->session->has_userdata('user')){
            $this->session->set_flashdata('error','Please login first to access the page');
            redirect('login');
        }

        $sessionData = $this->session->userdata('user');
        $role = $sessionData['role'];

        if($role == 'donor'){
            redirect('donor/Settings');
        }else if($role == 'admin'){
            redirect('admin/Settings');
        }
	}

    public function index(){
        echo 'settings';
        echo $GLOBALS['role'];
    }
}