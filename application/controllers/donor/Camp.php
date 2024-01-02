<?php

class Camp extends CI_Controller {
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
        
        $data['active'] = '3';
        $data['view'] = 'donor/dashboard/camp';

        $res = $this->donor_model->getInfo($this->id);
        foreach ($res as $key => $value)
            $data[$key] = $value;
        
        $success = $this->session->flashdata('success');
		$error = $this->session->flashdata('error');
		if($success != '')
			$data['success'] = $success;
		if($error != '')
			$data ['error'] = $error;

        $data['data'] = array('camps' => $this->donor_model->getCamps($this->id));
        $data['data']['joinedcount'] = $this->donor_model->getJoinedCampCount($this->id)->count;
        
        $this->load->helper('donor/Loadcamps');
        $this->load->view('donor/dashboard', $data);
    }
    
    public function joined(){
        $data['active'] = '3';
        $data['view'] = 'donor/dashboard/joinedcamp';

        $res = $this->donor_model->getInfo($this->id);
        foreach ($res as $key => $value)
            $data[$key] = $value;

        $success = $this->session->flashdata('success');
		$error = $this->session->flashdata('error');
		if($success != '')
			$data['success'] = $success;
		if($error != '')
			$data ['error'] = $error;

        $this->load->helper('donor/Loadjoinedcamps');

        $subdata['camps'] = $this->donor_model->getJoinedCamps($this->id);
        $subdata['joinedcampcount'] = $this->donor_model->getJoinedCampCount($this->id)->count;
        $data['data'] = $subdata;

        $this->load->view('donor/dashboard', $data);
    }

    public function joincamp(){
        if(isset($_GET['campid']) && $_GET['campid'] != '')
        {
            if($this->donor_model->joinCamp($this->id, $_GET['campid']) == 1)
                $this->session->set_flashdata('success','Joined the camp');
            else 
                $this->session->set_flashdata('error','Something went wrong, try again');
        }
        else{
            $this->session->set_flashdata('error','Bad request in joining the camp, try again');
        }

        redirect('donor/camp');
    }

    public function quitcamp(){
        if(isset($_GET['campid']) && $_GET['campid'] != '')
        {
            if($this->donor_model->quitCamp($this->id, $_GET['campid']) == 1)
                $this->session->set_flashdata('success','Quit the camp');
            else 
                $this->session->set_flashdata('error','Something went wrong, try again');
        }
        else{
            $this->session->set_flashdata('error','Bad request in quiting the camp, try again');
        }

        redirect('donor/camp/joined');
        
    }
}