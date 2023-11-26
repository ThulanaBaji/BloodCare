<?php

#test

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

            $data = array('id' => $sessionData['id'], 'name' => $sessionData['name'], 'active' => '1');
            $role = $sessionData['role'];

            if($role == 'donor'){
                $data['view'] = 'donor/dashboard/dashboard';
                $this->load->view('donor/dashboard', $data);
            }
            else if($role == 'hospital'){
                $data['view'] = 'hospital/dashboard/dashboard';
                $data['accepted'] = $sessionData['accepted'];

                $this->load->view('hospital/dashboard', $data);
            }
            else if($role == 'admin'){
                $data['view'] = 'admin/dashboard/dashboard';
                $this->load->view('admin/dashboard', $data);
            }
        }
        else{
            $this->session->set_flashdata('error','Please login first to access the page');
            redirect('login');
        }
    }

    //donor
    public function appointment(){
        if($this->sessionExist()){
            $sessionData = $this->session->userdata('user');

            $data = array('id' => $sessionData['id'], 'name' => $sessionData['name'], 'active' => '2');
            $role = $sessionData['role'];

            if($role != 'donor')
                redirect('dashboard');

            $data['view'] = 'donor/dashboard/appointment';
            $this->load->view('donor/dashboard', $data);
        }
        else{
            $this->session->set_flashdata('error','Please login first to access the page');
            redirect('login');
        }
    }

    //donor
    public function camps(){
        if($this->sessionExist()){
            $sessionData = $this->session->userdata('user');

            $data = array('id' => $sessionData['id'], 'name' => $sessionData['name'], 'active' => '3');
            $role = $sessionData['role'];

            if($role != 'donor')
                redirect('dashboard');

            $data['view'] = 'donor/dashboard/camps';
            $this->load->view('donor/dashboard', $data);
        }
        else{
            $this->session->set_flashdata('error','Please login first to access the page');
            redirect('login');
        }
    }

    //donor, hospital, admin
    public function notifications(){
        if($this->sessionExist()){
            $sessionData = $this->session->userdata('user');

            $data = array('id' => $sessionData['id'], 'name' => $sessionData['name'], 'active' => '4');
            $role = $sessionData['role'];

            if($role == 'donor'){
                $data['view'] = 'donor/dashboard/notifications';
                $this->load->view('donor/dashboard', $data);
            }
            else if($role == 'hospital'){
                $data['view'] = 'hospital/dashboard/notifications';
                $this->load->view('hospital/dashboard', $data);
            }
            else if($role == 'admin'){
                $data['view'] = 'admin/dashboard/notifications';
                $this->load->view('admin/dashboard', $data);
            }
        }
        else{
            $this->session->set_flashdata('error','Please login first to access the page');
            redirect('login');
        }
    }

    //donor
    public function donations(){
        if($this->sessionExist()){
            $sessionData = $this->session->userdata('user');

            $data = array('id' => $sessionData['id'], 'name' => $sessionData['name'], 'active' => '5');
            $role = $sessionData['role'];

            if($role != 'donor')
                redirect('dashboard');

            $data['view'] = 'donor/dashboard/donations';
            $this->load->view('donor/dashboard', $data);
        }
        else{
            $this->session->set_flashdata('error','Please login first to access the page');
            redirect('login');
        }
    }

    //donor, hospital, admin
    public function profile(){
        if($this->sessionExist()){
            $sessionData = $this->session->userdata('user');

            $data = array('id' => $sessionData['id'], 'name' => $sessionData['name'], 'active' => '6');
            $role = $sessionData['role'];

            if($role == 'donor'){
                $data['view'] = 'donor/dashboard/profile';
                $this->load->view('donor/dashboard', $data);
            }
            else if($role == 'hospital'){
                $data['view'] = 'hospital/dashboard/profile';
                $this->load->view('hospital/dashboard', $data);
            }
            else if($role == 'admin'){
                $data['view'] = 'admin/dashboard/profile';
                $this->load->view('admin/dashboard', $data);
            }
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
}