<?php

class Dashboard extends CI_Controller 
{
    private $id;
    private $role = 'hospital';

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
		$this->load->model('hospital_model');
	}

    public function index(){
        
        $data['active'] = '1';
        $data['view'] = 'hospital/dashboard/dashboard';

        $res = $this->hospital_model->getInfo($this->id);
        foreach ($res as $key => $value)
            $data[$key] = $value;

        $data['donationCount'] = $this->hospital_model->getDonationsCount($this->id);
        $data['donationProcessingCount'] = $this->hospital_model->getProcessingBloodCount($this->id);
        $data['requestPendingCount'] = $this->hospital_model->getPendingRequestCount($this->id);

        $data['collectionTotal'] = array(
            'week' => 3,
            'month' => 3,
            'year' => 3
        );

        $thisyear = date('Y', time());
        $thisweek = date('W', time());

        $this->load->view('hospital/dashboard', $data);
    }

    public function logout(){
        $this->session->unset_userdata('user');
        redirect('/');
    }
}