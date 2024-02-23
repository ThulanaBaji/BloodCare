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

        if($this->session->userdata('user')['role'] != $this->role  || $this->session->userdata('user')['status'] != 'accepted')
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

        $result = $this->hospital_model->getConfig($this->id, 'appointment');

        if($result == "[]"){
            echo 'error: no configuration found. set your configuration first.';
            return;
        }

        $rawconfig = $this->hospital_model->getConfig($this->id, 'appointment');
        $config = json_decode($rawconfig);

        echo 'success: ';

        $duration = strtotime($config->duration);
        $duration = (date('i', $duration) + date('H', $duration) * 60)*60*1000;
        
        $arr = $this->generateappointmentarray($config);
        $count = count($arr);
        
        foreach ($arr as $time) {
            if(!$this->addappointment($time, $duration))
                $count--;
        }

        echo $count.' appointments added ';
        
        // $count = 0;

        // foreach ($config->breaks as $breakperiod) {
        //     $breakperiodstarttime = strtotime($breakperiod->start);
        //     $breakperiodendtime = strtotime($breakperiod->end);
        
        //     $start = ((date('i', $breakperiodstarttime) + date('H', $breakperiodstarttime) * 60)*60) * 1000;
        //     $end = ((date('i', $breakperiodendtime) + date('H', $breakperiodendtime) * 60)*60) * 1000;

        //     $count += $this->addappointmentbreak($start, $end);
        // }

        // echo $count.' appointments either rejected or removed';

        //refer to Playground.php

    }

    private function addappointment($time, $duration){
        return $this->hospital_model->addAppointment($this->id, $time, $duration);
    }

    private function addappointmentbreak($from, $to){
        return $this->hospital_model->addAppointmentBreak($this->id, $from, $to);
    }

    private function generateappointmentarray($config){
        $unavailable_days = $config->days; //Mo, Tu, We 
        $unavailable_dates = $config->dates; //08 DEC, 09 DEC
        $start = $config->start;
        $end = $config->end;
        $duration = $config->duration; //30mins
        $breaks = $config->breaks;

        $startdate=strtotime("today");
        $startdate=strtotime("+3 day", $startdate);
        $enddate=strtotime("+2 month", $startdate);

        $duration = strtotime($duration);
        $duration = date('i', $duration) + date('H', $duration) * 60;

        $array = array();

        while ($startdate < $enddate) {
            
            if((!in_array(date('w', $startdate), $unavailable_days)) && (!in_array((date('U', $startdate) * 1000), $unavailable_dates))){

                $starttime = strtotime($start);
                $endtime = strtotime($end);
                $endtime = strtotime("-".$duration." mins", $endtime);

                
                while ($starttime <= $endtime) {

                    $endappointmenttime = strtotime("+".$duration." mins", $starttime);
                    $timeavailable = true;

                    foreach ($breaks as $breakperiod) {
                        $breakperiodstarttime = strtotime($breakperiod->start);
                        $breakperiodendtime = strtotime($breakperiod->end);

                        if(($starttime >= $breakperiodstarttime && $starttime < $breakperiodendtime) ||
                           ($endappointmenttime > $breakperiodstarttime && $endappointmenttime <= $breakperiodendtime)){
                            $starttime = $breakperiodendtime;
                            $starttime = strtotime("-".$duration." mins", $starttime);

                            $timeavailable = false;
                            break;
                        }
                    }

                    if($timeavailable){
                        array_push($array, (($startdate + ((date('i', $starttime) + date('H', $starttime) * 60)*60)) * 1000));
                    }

                    $starttime = strtotime("+".$duration." mins", $starttime);
                }
            }
            
            $startdate = strtotime("+1 day", $startdate);
        }

        return $array;
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