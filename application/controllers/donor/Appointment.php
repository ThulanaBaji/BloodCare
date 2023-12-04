<?php

class Appointment extends CI_Controller {
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
        
        $data['active'] = '2';
        $data['view'] = 'donor/dashboard/appointment';

        $res = $this->donor_model->getInfo($this->id);
        foreach ($res as $key => $value)
            $data[$key] = $value;

        $data['data'] = array('appointmentsJSON' => $this->generateAppointmentJSON());

        $this->load->view('donor/dashboard', $data);
    }
    
    public function ongoing(){
        $data['active'] = '2';
        $data['view'] = 'donor/dashboard/ongoingappointment';

        $res = $this->donor_model->getInfo($this->id);
        foreach ($res as $key => $value)
            $data[$key] = $value;

        $this->load->helper('donor/Loadongoingappointments');

        $subdata['appointments'] = $this->donor_model->getOngoingAppointments($this->id);
        $data['data'] = $subdata;

        $this->load->view('donor/dashboard', $data);
    }

    private function generateAppointmentJSON(){
        $rows = $this->donor_model->getAppointments();
        $curindex = -1;

        if(count($rows) == 0) return '[]';

        $hnames = array();
        $hospitals = array();
        $dates = array();
        $dnames = array();
        $count = -1;
        
        foreach ($rows as $row) {

            if(!in_array($row['email'], $hnames)){   
                if($curindex != -1)
                    $hospitals[$curindex]['dates'] = $dates;
                
                array_push($hnames, $row['email']);
                array_push($hospitals, array(
                                                "name" => $row['name'], 
                                                "profile" => $row['profile'], 
                                                "city" => $row['city'],
                                                "zipcode" => $row['zipcode'],
                                                "district" => $row['district'],
                                                "province" => $row['province'],
                                                "dates" => array()
                                            ));
                
                $dates = array();
                $dnames = array();
                $count = -1;
                $curindex++;
            }
 
            $epochtime = $row['datetime'];

            $datetime = substr($row['datetime'], 0, -3);
            $date = date('d M Y', intval($datetime));
            $time = date('H:i', intval($datetime));

            $dur = intval($row['duration']);
            $totalmins = $dur / 1000 / 60;
            $hrs = floor($totalmins / 60);
            $mins = $hrs > 0 ? $totalmins % 60 : $totalmins;
            $duration = '(';
            $duration = $duration.($hrs > 0 ? ($hrs > 1 ? $hrs.' hrs' : $hrs.' hr') : '');
            $duration = $duration.($mins > 0 ? ($hrs > 0 ? ' '.$mins.' mins' : $mins.' mins') : '');
            $duration = $duration.')';

            if(!in_array($date, $dnames)){
                array_push($dnames, $date);
                array_push($dates, array());
                $count++;
            }
            
            array_push($dates[$count], array(
                "id" => $row['id'],
                "datetime" => $row['datetime'],
                "date" => $date,
                "start" => $time,
                "duration" => $duration
            ));
        }

        $hospitals[$curindex]['dates'] = $dates;
        
        return json_encode($hospitals);
    }
}