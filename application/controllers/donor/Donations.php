<?php

class Donations extends CI_Controller {
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
        
        $data['active'] = '5';
        $data['view'] = 'donor/dashboard/donations';

        $res = $this->donor_model->getInfo($this->id);
        foreach ($res as $key => $value)
            $data[$key] = $value;
        $data['donations'] = $this->donor_model->getDonations($this->id);
        $data['donationscount'] = $this->donor_model->getDonationsCount($this->id);

        $this->load->helper('donor/loaddonations');
        $this->load->view('donor/dashboard', $data);
    }
}