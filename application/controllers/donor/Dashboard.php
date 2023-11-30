<?php

class Dashboard extends CI_Controller {
    private $id;
    private $role = 'donor';

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
		$this->load->model('donor_model');
	}

    public function index(){
        
        $data['active'] = '1';
        $data['view'] = 'donor/dashboard/dashboard';

        $res = $this->donor_model->getInfo($this->id);
        foreach ($res as $key => $value)
            $data[$key] = $value;

        $this->load->view('donor/dashboard', $data);
    }

    public function logout(){
        $this->session->unset_userdata('user');
        redirect('/');
    }
}