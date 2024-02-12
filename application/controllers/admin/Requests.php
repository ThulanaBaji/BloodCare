<?php

class Requests extends CI_Controller
{
    private $id;
    private $role = 'admin';

    public function __construct(){
		parent::__construct();

		$this->load->library('session');
        
        if(!$this->session->has_userdata('user')){
            $this->session->set_flashdata('error','Please login first to access the page');
            redirect('login/admin');
        }

        if($this->session->userdata('user')['role'] != $this->role)
            show_404();

        $this->id = $this->session->userdata('user')['id'];

		$this->load->database();
		$this->load->model('admin_model');
	}

    public function index(){
        
        $data['active'] = '2';
        $data['view'] = 'admin/dashboard/requests';

        $res = $this->admin_model->getInfo($this->id);
        foreach ($res as $key => $value)
            $data[$key] = $value;

        $success = $this->session->flashdata('success');
		$error = $this->session->flashdata('error');
		if($success != '')
			$data['success'] = $success;
		if($error != '')
			$data ['error'] = $error;

        $data['requests'] = $this->admin_model->getRequests();

        $this->load->view('admin/dashboard', $data);
    }

    public function accept(){
        if(!isset($_POST['id'])){
            $this->session->set_flashdata('error', 'bad request');
            redirect('admin/requests');
        }

        $this->admin_model->acceptRequest($this->id, $_POST);
        
        $this->session->set_flashdata('success', 'Blood request was accepted');
        redirect('admin/requests');
    }

    public function reject(){
        if(!isset($_POST['id'])){
            $this->session->set_flashdata('error', 'bad request');
            redirect('admin/requests');
        }

        $this->admin_model->rejectRequest($this->id, $_POST);
        
        $this->session->set_flashdata('success', 'Blood request was rejected');
        redirect('admin/requests');
    }
}