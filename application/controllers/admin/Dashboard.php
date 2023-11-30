<?php

class Dashboard extends CI_Controller {
    private $id;
    private $role = 'admin';

    public function __construct(){
		parent::__construct();

		$this->load->library('session');
        
        if(!$this->session->has_userdata('user')){
            $this->session->set_flashdata('error','Please login first to access the page');
            redirect('login');
        }

        if($this->session->userdata('user')['role'] != $this->role)
            show_404();

        $this->id = $this->session->userdata('user')['id'];

		$this->load->database();
		$this->load->model('admin_model');
	}

    public function index(){
        
        $data['active'] = '1';
        $data['view'] = 'admin/dashboard/dashboard';

        $res = $this->admin_model->getInfo($this->id);
        foreach ($res as $key => $value)
            $data[$key] = $value;

        $this->load->view('admin/dashboard', $data);
    }
    
    public function logout(){
        $this->session->unset_userdata('user');
        redirect('/');
    }
}