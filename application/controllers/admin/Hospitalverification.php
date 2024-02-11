<?php

class Hospitalverification extends CI_Controller {
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
        
        $data['active'] = '4';
        $data['view'] = 'admin/dashboard/hospitalverification';

        $res = $this->admin_model->getInfo($this->id);
        foreach ($res as $key => $value)
            $data[$key] = $value;

        $success = $this->session->flashdata('success');
		$error = $this->session->flashdata('error');
		if($success != '')
			$data['success'] = $success;
		if($error != '')
			$data ['error'] = $error;

        $data['hospitals'] = $this->admin_model->getHospitals();
        
        if(isset($_GET['search']) && !empty($_GET['search']))
            $data['search'] = $_GET['search'];

        $this->load->view('admin/dashboard', $data);
    }

    public function accept($id = null){
        if(!isset($id) || empty($id)){
            $this->session->set_flashdata('error', 'bad request');
            redirect('admin/hospitalverification');
        }

        $this->admin_model->changeHospitalStatus($this->id, $id, HOSPITAL_ACCEPTED);
        $this->session->set_flashdata('success', 'Hospital was accepted');

        redirect('admin/hospitalverification');
    }

    public function revoke(){
        if(!isset($_POST['id']) || empty($_POST['id'])){
            $this->session->set_flashdata('error', 'bad request');
            redirect('admin/hospitalverification');
        }

        $this->admin_model->changeHospitalStatus($this->id, $_POST['id'], HOSPITAL_REVOKED, $_POST['message']);
        $this->session->set_flashdata('success', 'Hospital was revoked');

        redirect('admin/hospitalverification');
    }

    public function sendVerification($email){
        if(!isset($email) || empty($email)){
            $this->session->set_flashdata('error', 'bad request');
            redirect('admin/hospitalverification');
        }

        $random_hash = md5(uniqid(rand().time(), true));
        $this->sendmail($email, $random_hash);
        $this->admin_model->updateVerificationKey($email, $random_hash);
        
        $this->session->set_flashdata('success', 'verification email was sent');
        redirect('admin/hospitalverification');
    }

    public function sendmail($to, $key){
		$this->load->library('email');

        $this->email->from('bloodcarelk@gmail.com', 'BloodCare');
        $this->email->to($to);
        $this->email->subject('Verify your account');

		$link = base_url().'verify/'.$to.'/'.$key;
		$mailContent = $this->load->view('verify/email', array('link' => $link), true);
        $this->email->message($mailContent);
		
		$this->email->set_newline("\r\n");

        if($this->email->send())
			return true;
		return false;
	}
}