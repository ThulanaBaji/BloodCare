<?php

class Profile extends CI_Controller {
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
        
        $data['active'] = '7';
        $data['view'] = 'admin/dashboard/profile';

        $res = $this->admin_model->getInfo($this->id);
        foreach ($res as $key => $value)
            $data[$key] = $value;

        $this->load->view('admin/dashboard', $data);
    }

    public function updatename(){
        if(isset($_POST['name']) && $_POST['name'] != '')
        {
            $str = 'name="' . $_POST['name'].'"';
            $this->admin_model->updateDetails($str, $this->id);
            redirect('admin/profile');
        }

        $this->session->set_flashdata('error','Please check your inputs again');
        redirect('admin/profile');
    }

    public function changepassword(){
        $oldp = $_POST['oldp'];
        $newp = $_POST['newp'];
        $newpc = $_POST['newpc'];
        $passwordreg = "^(?=.*?[A-Za-z])(?=.*?[0-9])(?=.*?[#?!@$%\^&*-]).{8,}^";

        if(strlen($newp) < 8 || strlen($newpc) < 8 || $newp != $newpc || !preg_match($passwordreg, $newp)){
            $this->session->set_flashdata('error','Please check your inputs again');
            redirect('admin/profile');
        }

        if($this->admin_model->checkOldPassword($oldp, $this->id) == 0){
            $this->session->set_flashdata('error','Your password was incorrect');
            redirect('admin/profile');
        }

        if($this->admin_model->updatePassword($oldp, $newp, $this->id) == 1){
            $this->session->set_flashdata('message','Password changed. Log in back');
            $this->session->unset_userdata('user');
            redirect('login/admin');
        }

        $this->session->set_flashdata('error','Something went wrong. Please try again');
        redirect('admin/profile');

    }
    
    public function logout(){
        $this->session->unset_userdata('user');
        redirect('/');
    }
}