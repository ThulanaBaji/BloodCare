<?php

class Appointments extends CI_Controller 
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
        $this->load->helper('hospital/Loadappointments');
		$this->load->model('hospital_model');
	}

    public function index(){
        
        $data['active'] = '4';
        $data['view'] = 'hospital/dashboard/appointments';

        $res = $this->hospital_model->getInfo($this->id);
        foreach ($res as $key => $value)
            $data[$key] = $value;

        //------LOAD appointment page specific data

        $subdata['config'] = $this->hospital_model->getConfig($this->id, 'appointment');
        $subdata['appointments'] = $this->hospital_model->getAppointments($this->id);

        $data['data'] = $subdata;

        //------------------------------------------

        $this->load->view('hospital/dashboard', $data);
    }

    //-------AJAX requests from the appointment page

    public function getappointmentswithin($from, $to){

        $appointments = $this->hospital_model->getAppointmentsOf($this->id, $from, $to);
        loadAppointments($appointments);
    }

    public function generateappointments(){

        $result = $this->hospital_model->getAppointmentLastGenerated($this->id);

        if($result == NULL){
            echo 'error: no configuration found. set your configuration first.';
            return;
        }

        $rawconfig = $this->hospital_model->getConfig($this->id, 'appointment');
        $config = json_decode($rawconfig);

        //refer to Playground.php
    }

    private function addappointment($time, $duration){
        $this->hospital_model->addAppointment($this->id, $time, $duration);
    }

    public function rejectappointments(){

        if(isset($_GET['ids']) && $_GET['ids'] != '' && isset($_GET['message']) && $_GET['message'] != '') {
            $arr = explode(',', $_GET['ids']);
            $msg = $_GET['message'];

            foreach($arr as $appointment_id){
                $this->hospital_model->rejectAppointment($appointment_id, $this->id, $msg);
            }

            $appointments = $this->hospital_model->getAppointments($this->id);
            loadAppointments($appointments);
        }
    }

    public function savehospitalconfig(){

        if(isset($_GET['obj']) && $_GET['obj'] != '') {
            $this->hospital_model->saveConfig($this->id, $_GET['configtype'], $_GET['obj']);
            echo "configuration saved !";
        }
    }

    public function gethospitalconfig(){

        if(isset($_GET['configtype']) && $_GET['configtype'] != '') {
            $result = $this->hospital_model->getConfig($this->id, $_GET['configtype']);
            print_r($result);
        }
    }
}