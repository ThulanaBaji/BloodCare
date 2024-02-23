<?php

class Profile extends CI_Controller
{
    private $id;
   private $status;
    private $role = 'hospital';

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');

        if (!$this->session->has_userdata('user')) {
            $this->session->set_flashdata('error', 'Please login first to access the page');
            redirect('login');
        }

        if ($this->session->userdata('user')['role'] != $this->role)
            show_404();

        $this->id = $this->session->userdata('user')['id'];
        $this->status = $this->session->userdata('user')['status'];

        $this->load->database();
        $this->load->model('hospital_model');
    }

    public function index(){
        
        $data['active'] = '7';
        $data['view'] = 'hospital/dashboard/profile';

        $res = $this->hospital_model->getEditInfo($this->id);
        foreach ($res as $key => $value)
            $data[$key] = $value;

        $success = $this->session->flashdata('success');
		$error = $this->session->flashdata('error');
		if($success != '')
			$data['success'] = $success;
		if($error != '')
			$data ['error'] = $error;

         if($this->status == 'not accepted'){
            $data['active'] = '2';

            $this->load->view('hospital/waitingdashboard', $data);
            return;
         }

        $this->load->view('hospital/dashboard', $data);
    }

    public function updateimage(){

        if(!empty($_FILES['profile']['name'])){
            $arr = explode('.', $_FILES['profile']['name']);
            $filename = time().strval(rand(100,999)).'.'.$arr[count($arr) - 1];

            $config['upload_path'] = 'uploads/hospital/profileimages/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $filename;

            $this->load->library('upload', $config);
            
            if(!$this->upload->do_upload('profile')){
                $this->session->set_flashdata('error','profile image upload failed');
                redirect('hospital/profile');
            }

            $str = 'profile="' . $filename.'"';
            $this->hospital_model->updateDetails($str, $this->id);
            redirect('hospital/profile');

        }else{
            $this->session->set_flashdata('error','Choose an image first');
            redirect('hospital/profile');
        }
    }

    public function updatename(){
        if(isset($_POST['regnum']) && $_POST['regnum'] != '' && isset($_POST['name']) && $_POST['name'] != '')
        {
            $str = 'regnumber="' . $_POST['regnum'] . '", name="' . $_POST['name'].'"';
            $this->hospital_model->updateDetails($str, $this->id);
            redirect('hospital/profile');
        }

        $this->session->set_flashdata('error','Please check your inputs again');
        redirect('hospital/profile');
    }

    public function updatecontact(){
        if(isset($_POST['contact']) && $_POST['contact'] != '')
        {
            $str = 'contact="' . $_POST['contact'].'"';
            $this->hospital_model->updateDetails($str, $this->id);
            redirect('hospital/profile');
        }

        $this->session->set_flashdata('error','Please check your inputs again');
        redirect('hospital/profile');

    }

    public function updatelocation(){
        if( isset($_POST['zipcode']) && $_POST['zipcode'] != '' && 
            isset($_POST['street']) && $_POST['street'] != '' && 
            isset($_POST['city']) && $_POST['city'] != '' && 
            isset($_POST['district']) && $_POST['district'] != '' && 
            isset($_POST['province']) && $_POST['province'] != '')
        {
            $str = 'zipcode="' . $_POST['zipcode'] . '", street_address="' . $_POST['street'] . '", city="' . $_POST['city'] . '", district="' . $_POST['district'] . '", province="' . $_POST['province'].'"';
            $this->hospital_model->updateDetails($str, $this->id);
            redirect('hospital/profile');
        }

        $this->session->set_flashdata('error','Please check your inputs again');
        redirect('hospital/profile');

    }

    public function changepassword(){
        $oldp = $_POST['oldp'];
        $newp = $_POST['newp'];
        $newpc = $_POST['newpc'];
        $passwordreg = "^(?=.*?[A-Za-z])(?=.*?[0-9])(?=.*?[#?!@$%\^&*-]).{8,}^";

        if(strlen($newp) < 8 || strlen($newpc) < 8 || $newp != $newpc || !preg_match($passwordreg, $newp)){
            $this->session->set_flashdata('error','Please check your inputs again');
            redirect('hospital/profile');
        }

        if($this->hospital_model->checkOldPassword($oldp, $this->id) == 0){
            $this->session->set_flashdata('error','Your password was incorrect');
            redirect('hospital/profile');
        }

        if($this->hospital_model->updatePassword($oldp, $newp, $this->id) == 1){
            $this->session->set_flashdata('message','Password changed. Log in back');
            $this->session->unset_userdata('user');
            redirect('login');
        }

        $this->session->set_flashdata('error','Something went wrong. Please try again');
        redirect('hospital/profile');

    }
}