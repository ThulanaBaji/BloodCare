<?php

class Dashboard extends CI_Controller {
    public function __construct(){
		parent::__construct();

		$this->load->library('session');
        if(!$this->session->has_userdata('user')){
            $this->session->set_flashdata('error','Please login first to access the page');
            redirect('login');
        }

        $this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->model('hospital_model');
		$this->load->model('donor_model');
	}

    public function index(){
        $sessionData = $this->session->userdata('user');

        $data = $sessionData;
        $data['active'] = '1';

        $id = $sessionData['id'];
        $role = $sessionData['role'];

        if($role == 'donor'){
            $res = $this->donor_model->getInfo($id);
            foreach ($res as $key => $value)
                $data[$key] = $value;
            $data['view'] = 'donor/dashboard/dashboard';

            $this->load->view('donor/dashboard', $data);
        }
        else if($role == 'hospital'){
            $res = $this->hospital_model->getInfo($id);
            foreach ($res as $key => $value)
                $data[$key] = $value;
            $data['view'] = 'hospital/dashboard/dashboard';

            $this->load->view('hospital/dashboard', $data);
        }
        else if($role == 'admin'){
            $res = $this->admin_model->getInfo($id);
            foreach ($res as $key => $value)
                $data[$key] = $value;
            $data['view'] = 'admin/dashboard/dashboard';

            $this->load->view('admin/dashboard', $data);
        }
    }

    /**
     * users: donor
     */
    public function appointment(){
        
        $sessionData = $this->session->userdata('user');

        $data = $sessionData;
        $data['active'] = '2';

        $id = $sessionData['id'];
        $role = $sessionData['role'];

        if($role != 'donor')
            redirect('dashboard');

        $res = $this->donor_model->getInfo($id);
        foreach ($res as $key => $value)
            $data[$key] = $value;
        $data['view'] = 'donor/dashboard/appointment';

        $this->load->view('donor/dashboard', $data);
        
    }
    /**
     * -------------------------------------end of content [appointment]
     */

    //donor
    public function camps(){
        
        $sessionData = $this->session->userdata('user');

        $data = $sessionData;
        $data['active'] = '3';

        $id = $sessionData['id'];
        $role = $sessionData['role'];

        if($role != 'donor')
            redirect('dashboard');

        $res = $this->donor_model->getInfo($id);
        foreach ($res as $key => $value)
            $data[$key] = $value;
        $data['view'] = 'donor/dashboard/camps';

        $this->load->view('donor/dashboard', $data);
        
    }

    //donor, hospital, admin
    public function notifications(){
        
        $sessionData = $this->session->userdata('user');

        $data = $sessionData;
        $data['active'] = '4';

        $id = $sessionData['id'];
        $role = $sessionData['role'];

        if($role == 'donor'){
            $res = $this->donor_model->getInfo($id);
            foreach ($res as $key => $value)
                $data[$key] = $value;
            $data['view'] = 'donor/dashboard/notifications';

            $this->load->view('donor/dashboard', $data);
        }
        else if($role == 'hospital'){
            $res = $this->hospital_model->getInfo($id);
            foreach ($res as $key => $value)
                $data[$key] = $value;
            $data['view'] = 'hospital/dashboard/notifications';
            $data['active'] = '5';

            $this->load->view('hospital/dashboard', $data);
        }
        else if($role == 'admin'){
            $res = $this->admin_model->getInfo($id);
            foreach ($res as $key => $value)
                $data[$key] = $value;
            $data['view'] = 'admin/dashboard/notifications';

            $this->load->view('admin/dashboard', $data);
        }
        
    }

    //donor
    public function donations(){
        
        $sessionData = $this->session->userdata('user');

        $data = $sessionData;
        $data['active'] = '5';

        $id = $sessionData['id'];
        $role = $sessionData['role'];

        if($role != 'donor')
            redirect('dashboard');

        $res = $this->donor_model->getInfo($id);
        foreach ($res as $key => $value)
            $data[$key] = $value;
        $data['view'] = 'donor/dashboard/donations';

        $this->load->view('donor/dashboard', $data);
        
    }

    //donor, hospital, admin
    public function profile(){
        
        $sessionData = $this->session->userdata('user');

        $data = $sessionData;
        $data['active'] = '6';

        $id = $sessionData['id'];
        $role = $sessionData['role'];

        if($role == 'donor'){
            $res = $this->donor_model->getInfo($id);
            foreach ($res as $key => $value)
                $data[$key] = $value;
            $data['view'] = 'donor/dashboard/profile';

            $this->load->view('donor/dashboard', $data);
        }
        else if($role == 'hospital'){
            $res = $this->hospital_model->getInfo($id);
            foreach ($res as $key => $value)
                $data[$key] = $value;
            $data['view'] = 'hospital/dashboard/profile';
            $data['active'] = '6';

            $this->load->view('hospital/dashboard', $data);
        }
        else if($role == 'admin'){
            $res = $this->admin_model->getInfo($id);
            foreach ($res as $key => $value)
                $data[$key] = $value;
            $data['view'] = 'admin/dashboard/profile';

            $this->load->view('admin/dashboard', $data);
        }
        
    }

    //hospital
    public function requests(){
        
        $sessionData = $this->session->userdata('user');

        $data = $sessionData;
        $data['active'] = '2';

        $id = $sessionData['id'];
        $role = $sessionData['role'];

        if($role != 'hospital')
            redirect('dashboard');

        $res = $this->hospital_model->getInfo($id);
        foreach ($res as $key => $value)
            $data[$key] = $value;
        $data['view'] = 'hospital/dashboard/requests';

        $this->load->view('hospital/dashboard', $data);
        
    }

    /**
     * users: hospital
     * 
     * view appointments from donors
     * 
     * reject (if needed) appointments from donors 
     * to donate blood at hospital_id
     */
    public function appointments(){
        $sessionData = $this->session->userdata('user');

        $data = $sessionData;
        $data['active'] = '4';

        $id = $sessionData['id'];
        $role = $sessionData['role'];

        if($role != 'hospital')
            redirect('dashboard');

        $res = $this->hospital_model->getInfo($id);
        foreach ($res as $key => $value)
            $data[$key] = $value;
        $data['view'] = 'hospital/dashboard/appointments';

        $result = $this->hospital_model->getConfig($id, 'appointment');
        $appointments = $this->hospital_model->getAppointments($id);
        $subdata['config'] = $result;
        $subdata['appointments'] = $appointments;
        $this->load->helper('hospital/Loadappointments');

        $data['data'] = $subdata;

        $this->load->view('hospital/dashboard', $data);
    }

    public function getappointmentswithin($from, $to){
        $sessionData = $this->session->userdata('user');
        $id = $sessionData['id'];

        $this->load->helper('hospital/Loadappointments');
        $appointments = $this->hospital_model->getAppointmentsOf($id, $from, $to);
        loadAppointments($appointments);
    }

    public function rejectappointments(){
        $sessionData = $this->session->userdata('user');
        $id = $sessionData['id'];

        if(isset($_GET['ids']) && $_GET['ids'] != '' && isset($_GET['message']) && $_GET['message'] != '') {
            $arr = explode(',', $_GET['ids']);
            $msg = $_GET['message'];

            foreach($arr as $appointment_id){
                $this->hospital_model->rejectAppointment($appointment_id, $id, $msg);
            }

            $this->load->helper('hospital/Loadappointments');
            $appointments = $this->hospital_model->getAppointments($id);
            loadAppointments($appointments);
        }
    }

    public function savehospitalconfig(){
        $sessionData = $this->session->userdata('user');

        if(isset($_GET['obj']) && $_GET['obj'] != '') {
            $this->hospital_model->saveConfig($sessionData['id'], $_GET['configtype'], $_GET['obj']);
            echo "configuration saved !";
        }
    }

    public function gethospitalconfig(){
        $sessionData = $this->session->userdata('user');

        if(isset($_GET['configtype']) && $_GET['configtype'] != '') {
            $result = $this->hospital_model->getConfig($sessionData['id'], $_GET['configtype']);
            print_r($result);
        }
    }
    /**
     * -------------------------------------end of content [appointment]
     */

    //hospital
    public function organize(){
        $sessionData = $this->session->userdata('user');

        $data = $sessionData;
        $data['active'] = '3';

        $id = $sessionData['id'];
        $role = $sessionData['role'];

        if($role != 'hospital')
            redirect('dashboard');

        $res = $this->hospital_model->getInfo($id);
        foreach ($res as $key => $value)
            $data[$key] = $value;
        $data['view'] = 'hospital/dashboard/organize';

        $this->load->view('hospital/dashboard', $data);
    }

    public function logout(){
        $this->session->unset_userdata('user');
        redirect('/');
    }

    private function sessionExist(){
        if($this->session->has_userdata('user'))
            return true;
        return false;
    }
}