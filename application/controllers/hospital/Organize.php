<?php

class Organize extends CI_Controller
{
    private $id;
    private $role = 'hospital';

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');

        if (!$this->session->has_userdata('user')) {
            $this->session->set_flashdata('error', 'Please login first to access the page');
            redirect('login');
        }

        if ($this->session->userdata('user')['role'] != $this->role  || $this->session->userdata('user')['status'] == 'not accepted')
            show_404();

        $this->id = $this->session->userdata('user')['id'];

        $this->load->database();
//        $this->load->helper('hospital/Loadappointments');
        $this->load->model('hospital_model');
    }

    public function index()
    {
        $data['active'] = '3';
        $data['view'] = 'hospital/dashboard/organize';

        $res = $this->hospital_model->getInfo($this->id);
        foreach ($res as $key => $value)
            $data[$key] = $value;

        $success = $this->session->flashdata('success');
		$error = $this->session->flashdata('error');
		if($success != '')
			$data['success'] = $success;
		if($error != '')
			$data ['error'] = $error;

        $this->load->helper('hospital/Loadcamps');
        $data['camps'] = $this->hospital_model->getCamps($this->id);

        $this->load->view('hospital/dashboard', $data);
    }

    public function history(){
        $data['active'] = '3';
        $data['view'] = 'hospital/dashboard/organizedcamps';

        $res = $this->hospital_model->getInfo($this->id);
        foreach ($res as $key => $value)
            $data[$key] = $value;

        $success = $this->session->flashdata('success');
		$error = $this->session->flashdata('error');
		if($success != '')
			$data['success'] = $success;
		if($error != '')
			$data ['error'] = $error;

        $this->load->helper('hospital/Loadorganizedcamps');
        $data['camps'] = $this->hospital_model->getOrganizedCamps($this->id);
        $data['organizedcampscount'] = $this->hospital_model->getOrganizedCampsCount($this->id);

        $this->load->view('hospital/dashboard', $data);
    }

    public function addcamp(){
        $data = $_POST;

        if(!empty($_FILES['profile']['name'])){

            $arr = explode('.', $_FILES['profile']['name']);
            $filename = time().strval(rand(100,999)).'.'.$arr[count($arr) - 1];

            $config['upload_path'] = 'uploads/camp/profileimages/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $filename;

            $this->load->library('upload', $config);
            
            if(!$this->upload->do_upload('profile'))
                $filename = 'default.svg';

            $data['image'] = $filename; 
        }else{
            $data['image'] = 'default.svg';
        }

        $datetime = strtotime($_POST['date']) * 1000;
        $datetime += strtotime($_POST['time']) * 1000;
        $datetime -= strtotime('today') * 1000;
        $data['datetime'] = $datetime;

        $duration_arr = preg_split("/[,:\. ]/", $_POST['duration']);
        $duration = (((int) $duration_arr[0]) * 60 + (int) $duration_arr[1]) * 60 * 1000;
        $data['duration'] = $duration;

        $this->hospital_model->addCamp($this->id, $data);
        $this->session->set_flashdata('success', 'Camp added successfully');
        redirect('hospital/organize');
    }

    public function editcamp(){
        $data = $_POST;

        if(!empty($_FILES['profile']['name'])){

            $arr = explode('.', $_FILES['profile']['name']);
            $filename = time().strval(rand(100,999)).'.'.$arr[count($arr) - 1];

            $config['upload_path'] = 'uploads/camp/profileimages/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $filename;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('profile'))
                $default = true;

            $data['image'] = $filename; 
            $default = false;
        }else{
            $default = true;
        }

        $datetime = strtotime($_POST['date']) * 1000;
        $datetime += strtotime($_POST['time']) * 1000;
        $datetime -= strtotime('today') * 1000;
        $data['datetime'] = $datetime;

        $duration_arr = preg_split("/[,:\. ]/", $_POST['duration']);
        $duration = (((int) $duration_arr[0]) * 60 + (int) $duration_arr[1]) * 60 * 1000;
        $data['duration'] = $duration;

        $this->hospital_model->updateCamp($this->id, $data, $default);
        $this->session->set_flashdata('success', 'Camp details changed successfully');
        redirect('hospital/organize');
    }

    public function cancelCamp(){
        if(isset($_GET['message']) && $_GET['message'] != '' && isset($_GET['campid']) && $_GET['campid'] != ''){
            $this->hospital_model->cancelCamp($this->id, $_GET['campid'], $_GET['message']);
            $this->session->set_flashdata('success', 'Camp was cancelled');
            redirect('hospital/organize');
        }

        $this->session->set_flashdata('error', 'Bad request, try again');
        redirect('hospital/organize');
    }
}