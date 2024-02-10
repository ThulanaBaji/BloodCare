<?php

class Profile extends CI_Controller
{
    private $id;
    private $role = 'donor';

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

        $this->load->database();
        $this->load->model('donor_model');
    }

    public function index(){
        
        $data['active'] = '6';
        $data['view'] = 'donor/dashboard/profile';

        $res = $this->donor_model->getEditInfo($this->id);
        foreach ($res as $key => $value)
            $data[$key] = $value;

        $success = $this->session->flashdata('success');
		$error = $this->session->flashdata('error');
		if($success != '')
			$data['success'] = $success;
		if($error != '')
			$data ['error'] = $error;

        $this->load->view('donor/dashboard', $data);
    }

    public function updateimage(){

        if(!empty($_FILES['profile']['name'])){
            $arr = explode('.', $_FILES['profile']['name']);
            $filename = time().strval(rand(100,999)).'.'.$arr[count($arr) - 1];

            $config['upload_path'] = 'uploads/donor/profileimages/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $filename;

            $this->load->library('upload', $config);
            
            if(!$this->upload->do_upload('profile')){
                $this->session->set_flashdata('error','profile image upload failed');
                redirect('donor/profile');
            }

            $str = 'profile="' . $filename.'"';
            $this->donor_model->updateDetails($str, $this->id);
            redirect('donor/profile');

        }else{
            $this->session->set_flashdata('error','Choose an image first');
            redirect('donor/profile');
        }
    }

    public function updatename(){
        if(isset($_POST['fname']) && $_POST['fname'] != '' && isset($_POST['lname']))
        {
            $str = 'firstname="' . $_POST['fname'] . '", lastname="' . $_POST['lname'].'"';
            $this->donor_model->updateDetails($str, $this->id);
            redirect('donor/profile');
        }

        $this->session->set_flashdata('error','Please check your inputs again');
        redirect('donor/profile');
    }

    public function updatecontact(){
        if(isset($_POST['contact']) && $_POST['contact'] != '')
        {
            $str = 'contact="' . $_POST['contact'].'"';
            $this->donor_model->updateDetails($str, $this->id);
            redirect('donor/profile');
        }

        $this->session->set_flashdata('error','Please check your inputs again');
        redirect('donor/profile');

    }

    public function updatelocation(){
        if(isset($_POST['city']) && $_POST['city'] != '' && isset($_POST['district']) && $_POST['district'] != '' && isset($_POST['province']) && $_POST['province'] != '')
        {
            $str = 'city="' . $_POST['city'] . '", district="' . $_POST['district'] . '", province="' . $_POST['province'].'"';
            $this->donor_model->updateDetails($str, $this->id);
            redirect('donor/profile');
        }

        $this->session->set_flashdata('error','Please check your inputs again');
        redirect('donor/profile');

    }

    public function changepassword(){
        $oldp = $_POST['oldp'];
        $newp = $_POST['newp'];
        $newpc = $_POST['newpc'];
        $passwordreg = "^(?=.*?[A-Za-z])(?=.*?[0-9])(?=.*?[#?!@$%\^&*-]).{8,}^";

        if(strlen($newp) < 8 || strlen($newpc) < 8 || $newp != $newpc || !preg_match($passwordreg, $newp)){
            $this->session->set_flashdata('error','Please check your inputs again');
            redirect('donor/profile');
        }

        if($this->donor_model->checkOldPassword($oldp, $this->id) == 0){
            $this->session->set_flashdata('error','Your password was incorrect');
            redirect('donor/profile');
        }

        if($this->donor_model->updatePassword($oldp, $newp, $this->id) == 1){
            $this->session->set_flashdata('message','Password changed. Log in back');
            $this->session->unset_userdata('user');
            redirect('login');
        }

        $this->session->set_flashdata('error','Something went wrong. Please try again');
        redirect('donor/profile');

    }
}