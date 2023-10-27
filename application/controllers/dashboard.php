<?php

class Dashboard extends CI_Controller {
    public function __construct(){
		parent::__construct();
		
        $this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->database();
		$this->load->model('user_model');
	}

    public function index(){
        if($this->sessionExist()){
            $sessionData = $this->session->userdata('user');

            $data = array('id' => $sessionData['id'], 'name' => $sessionData['name']);
            $role = $sessionData['role'];

            if($role == 'hospital')
                $data['accepted'] = $sessionData['accepted'];

            $this->displayDashboard($role, $data);
        }
        else{
            $this->session->set_flashdata('error','Please login first to access the page');
            redirect('login');
        }
    }

    public function logout(){
        $this->session->unset_userdata('user');
        redirect('/');
    }

    private function sessionExist(){
        if($this->session->has_userdata('user'))
            return true;
        return false;
    }

    private function displayDashboard($role, $data){
        switch($role){
            case 'admin':
                $this->load->view('admin/dashboard', $data);
                break;
            case 'donor':
                $this->load->view('donor/dashboard', $data);
                break;
            case 'hospital':
                $this->load->view('hospital/dashboard', $data);
                break;
        }
    }
}