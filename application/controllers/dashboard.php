<?php

class Dashboard extends CI_Controller {
    public function __construct(){
		parent::__construct();
		
        $this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->database();
		$this->load->model('hospital_model');
		$this->load->model('donor_model');
	}

    public function index(){
        if($this->sessionExist()){
            $sessionData = $this->session->userdata('user');

            $data = $sessionData;
            $data['active'] = '1';

            $id = $sessionData['id'];
            $role = $sessionData['role'];

            if($role == 'donor'){
                $res = $this->donor_model->getInfo($id);
                foreach ($res as $key => $value)
                    $data[$key] = $value;
                $data['view'] = 'donor/dashboard/dashboard';

                $this->load->view('donor/dashboard', $data);
            }
            else if($role == 'hospital'){
                $res = $this->hospital_model->getInfo($id);
                foreach ($res as $key => $value)
                    $data[$key] = $value;
                $data['view'] = 'hospital/dashboard/dashboard';

                $this->load->view('hospital/dashboard', $data);
            }
            else if($role == 'admin'){
                $res = $this->admin_model->getInfo($id);
                foreach ($res as $key => $value)
                    $data[$key] = $value;
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

            $data = $sessionData;
            $data['active'] = '2';

            $id = $sessionData['id'];
            $role = $sessionData['role'];

            if($role != 'donor')
                redirect('dashboard');

            $res = $this->donor_model->getInfo($id);
            foreach ($res as $key => $value)
                $data[$key] = $value;
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

            $data = $sessionData;
            $data['active'] = '3';

            $id = $sessionData['id'];
            $role = $sessionData['role'];

            if($role != 'donor')
                redirect('dashboard');

            $res = $this->donor_model->getInfo($id);
            foreach ($res as $key => $value)
                $data[$key] = $value;
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

            $data = $sessionData;
            $data['active'] = '4';

            $id = $sessionData['id'];
            $role = $sessionData['role'];

            if($role == 'donor'){
                $res = $this->donor_model->getInfo($id);
                foreach ($res as $key => $value)
                    $data[$key] = $value;
                $data['view'] = 'donor/dashboard/notifications';

                $this->load->view('donor/dashboard', $data);
            }
            else if($role == 'hospital'){
                $res = $this->hospital_model->getInfo($id);
                foreach ($res as $key => $value)
                    $data[$key] = $value;
                $data['view'] = 'hospital/dashboard/notifications';

                $this->load->view('hospital/dashboard', $data);
            }
            else if($role == 'admin'){
                $res = $this->admin_model->getInfo($id);
                foreach ($res as $key => $value)
                    $data[$key] = $value;
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

            $data = $sessionData;
            $data['active'] = '5';

            $id = $sessionData['id'];
            $role = $sessionData['role'];

            if($role != 'donor')
                redirect('dashboard');

            $res = $this->donor_model->getInfo($id);
            foreach ($res as $key => $value)
                $data[$key] = $value;
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

            $data = $sessionData;
            $data['active'] = '6';

            $id = $sessionData['id'];
            $role = $sessionData['role'];

            if($role == 'donor'){
                $res = $this->donor_model->getInfo($id);
                foreach ($res as $key => $value)
                    $data[$key] = $value;
                $data['view'] = 'donor/dashboard/profile';

                $this->load->view('donor/dashboard', $data);
            }
            else if($role == 'hospital'){
                $res = $this->hospital_model->getInfo($id);
                foreach ($res as $key => $value)
                    $data[$key] = $value;
                $data['view'] = 'hospital/dashboard/profile';
                $data['active'] = '5';

                $this->load->view('hospital/dashboard', $data);
            }
            else if($role == 'admin'){
                $res = $this->admin_model->getInfo($id);
                foreach ($res as $key => $value)
                    $data[$key] = $value;
                $data['view'] = 'admin/dashboard/profile';

                $this->load->view('admin/dashboard', $data);
            }
        }
        else{
            $this->session->set_flashdata('error','Please login first to access the page');
            redirect('login');
        }
    }

    //hospital
    public function requests(){
        if($this->sessionExist()){
            $sessionData = $this->session->userdata('user');

            $data = $sessionData;
            $data['active'] = '2';

            $id = $sessionData['id'];
            $role = $sessionData['role'];

            if($role != 'hospital')
                redirect('dashboard');

            $res = $this->hospital_model->getInfo($id);
            foreach ($res as $key => $value)
                $data[$key] = $value;
            $data['view'] = 'hospital/dashboard/requests';

            $this->load->view('hospital/dashboard', $data);
        }
        else{
            $this->session->set_flashdata('error','Please login first to access the page');
            redirect('login');
        }
    }

    //organize
    public function organize(){
        if($this->sessionExist()){
            $sessionData = $this->session->userdata('user');

            $data = $sessionData;
            $data['active'] = '3';

            $id = $sessionData['id'];
            $role = $sessionData['role'];

            if($role != 'hospital')
                redirect('dashboard');

            $res = $this->hospital_model->getInfo($id);
            foreach ($res as $key => $value)
                $data[$key] = $value;
            $data['view'] = 'hospital/dashboard/organize';

            $this->load->view('hospital/dashboard', $data);
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