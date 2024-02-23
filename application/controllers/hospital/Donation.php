<?php

class Donation extends CI_Controller
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
		$this->load->model('hospital_model');
	}

    public function index(){
        
        $data['active'] = '5';
        $data['view'] = 'hospital/dashboard/donationtoday';

        $res = $this->hospital_model->getInfo($this->id);
        foreach ($res as $key => $value)
            $data[$key] = $value;

        $data['todaycamps'] = $this->hospital_model->getTodayCamps($this->id);
        $data['todayappointments'] = $this->hospital_model->getTodayAppointments($this->id);
        $this->load->helper('hospital/loaddonation');

        $this->load->view('hospital/dashboard', $data);
    }

    public function todaycamps(){
        $data['active'] = '5';
        $data['view'] = 'hospital/dashboard/donationtodaycamps';

        $res = $this->hospital_model->getInfo($this->id);
        foreach ($res as $key => $value)
            $data[$key] = $value;

        $data['camps'] = $this->hospital_model->getTodayCampsWithDonors($this->id);

        $this->load->view('hospital/dashboard', $data);
    }

    public function todayappointments(){
        $data['active'] = '5';
        $data['view'] = 'hospital/dashboard/donationtodayappointments';

        $res = $this->hospital_model->getInfo($this->id);
        foreach ($res as $key => $value)
            $data[$key] = $value;

        $data['appointments'] = $this->hospital_model->getTodayAppointments($this->id);

        $this->load->view('hospital/dashboard', $data);
    }

    public function processing(){
        $data['active'] = '5';
        $data['view'] = 'hospital/dashboard/donationprocessing';

        $res = $this->hospital_model->getInfo($this->id);
        foreach ($res as $key => $value)
            $data[$key] = $value;

        $data['donations'] = $this->hospital_model->getProcessingDonations($this->id);

        $this->load->view('hospital/dashboard', $data);
    }

    public function processed(){
        $data['active'] = '5';
        $data['view'] = 'hospital/dashboard/donationprocessed';

        $res = $this->hospital_model->getInfo($this->id);
        foreach ($res as $key => $value)
            $data[$key] = $value;

        $data['donations'] = $this->hospital_model->getProcessedDonations($this->id);
        
        $this->load->view('hospital/dashboard', $data);
    }

    public function addDonation(){
        if (!isset($_POST['donorid']))
            return;

        if(isset($_POST['campid'])){
            $this->hospital_model->addDonation($_POST, $this->id);
            $this->hospital_model->markDonated($_POST['donorid'], $_POST['campid'], DONATION_CAMP);
        
            redirect('hospital/donation/todaycamps');
        }
        
        $this->hospital_model->addDonation($_POST, $this->id);
        $this->hospital_model->markDonated($_POST['donorid'], $_POST['appointmentid'], DONATION_APPOINTMENT);

        redirect('hospital/donation/todayappointments');
    }

    public function confirmDonation(){
        if (!isset($_POST['donationid']))
            redirect('hospital/donation/processing');

        $this->hospital_model->processDonation($_POST, $this->id);
        redirect('hospital/donation/processing');
    }

    public function rejectDonation(){
        if (!isset($_POST['donationid']))
            redirect('hospital/donation/processing');

        $this->hospital_model->rejectDonation($_POST, $this->id);
        redirect('hospital/donation/processing');
    }
}