<?php

class Notifications extends CI_Controller {
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
        $this->load->helper('loadnotifications');
	}

    public function index(){
        
        $data['active'] = '6';
        $data['view'] = 'notifications';

        $res = $this->hospital_model->getInfo($this->id);
        foreach ($res as $key => $value)
            $data[$key] = $value;
        
        $data['notifications'] = $this->hospital_model->getNotifications($this->id);
        $data['totalncount'] = count($data['notifications']);
        $data['role'] = $this->role;

        $this->load->view('hospital/dashboard', $data);
    }

    public function del(){
        if (!isset($_GET['id']) || $_GET['id'] == '')
            redirect('hospital/notifications');

        $this->hospital_model->deleteNotification($this->id, $_GET['id']);

        echo loadNotifications($this->hospital_model->getNotifications($this->id));
    }

    public function seen(){
        if (!isset($_GET['id']) || $_GET['id'] == '')
            redirect('hospital/notifications');

        $this->hospital_model->seenNotification($this->id, $_GET['id']);
    }
}