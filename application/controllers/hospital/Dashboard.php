<?php

class Dashboard extends CI_Controller 
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
		$this->load->model('hospital_model');
	}

    public function index(){
        
        $data['active'] = '1';
        $data['view'] = 'hospital/dashboard/dashboard';

        $res = $this->hospital_model->getInfo($this->id);
        foreach ($res as $key => $value)
            $data[$key] = $value;

        $data['donationCount'] = $this->hospital_model->getDonationsCount($this->id);
        $data['donationProcessingCount'] = $this->hospital_model->getProcessingBloodCount($this->id);
        $data['requestPendingCount'] = $this->hospital_model->getPendingRequestCount($this->id);

        $donations = $this->hospital_model->getAllDonations($this->id);
        $weektotal =  $monthtotal = $yeartotal = $lastweektotal =  $lastmonthtotal = $lastyeartotal = 0;
        $thisyear = date('Y', time()); $lastyear = date('Y', strtotime('last year'));
        $thisweek = date('W', time()); $lastweek = date('W', strtotime('last week'));
        $thismonth = date('m', time()); $lastmonth = date('m', strtotime('last month'));

        foreach ($donations as $donation) {
            if ($lastyear == date('Y', substr($donation['donated_datetime'], 0, -3)))
                $lastyeartotal += $donation['blood_vol'];

            if ($thisyear != date('Y', substr($donation['donated_datetime'], 0, -3)))
                continue;

            if ($thisweek == date('W', substr($donation['donated_datetime'], 0, -3)))
                $weektotal += $donation['blood_vol'];

            if ($lastweek == date('W', substr($donation['donated_datetime'], 0, -3)))
                $lastweektotal += $donation['blood_vol'];

            if ($thismonth == date('m', substr($donation['donated_datetime'], 0, -3)))
                $monthtotal += $donation['blood_vol'];

            if ($lastmonth == date('m', substr($donation['donated_datetime'], 0, -3)))
                $lastmonthtotal += $donation['blood_vol'];

            $yeartotal += $donation['blood_vol'];
        }
        $data['collectionData'] = array(
            'week' => $weektotal,
            'weekperc' => $lastweektotal == 0 ? 0 : round((($weektotal - $lastweektotal)/$lastweektotal)*100, 2),
            'month' => $monthtotal,
            'monthperc' => $lastmonthtotal == 0 ? 0 : round((($monthtotal - $lastmonthtotal)/$lastmonthtotal)*100, 2),
            'year' => $yeartotal,
            'yearperc' => $lastyeartotal == 0 ? 0 : round((($yeartotal - $lastyeartotal)/$lastyeartotal)*100, 2),
        );

        $requests = $this->hospital_model->getRequests($this->id);
        $weektotal =  $monthtotal = $yeartotal = $lastweektotal =  $lastmonthtotal = $lastyeartotal = 0;
        foreach ($requests as $req) {
            if ($req['status'] != REQUEST_ACCEPTED)
                continue;

            if ($lastyear == date('Y', substr($req['request_datetime'], 0, -3)))
                $lastyeartotal += $req['total'];

            if ($thisyear != date('Y', substr($req['request_datetime'], 0, -3)))
                continue;

            if ($thisweek == date('W', substr($req['request_datetime'], 0, -3)))
                $weektotal += $req['total'];

            if ($lastweek == date('W', substr($req['request_datetime'], 0, -3)))
                $lastweektotal += $req['total'];

            if ($thismonth == date('m', substr($req['request_datetime'], 0, -3)))
                $monthtotal += $req['total'];

            if ($lastmonth == date('m', substr($req['request_datetime'], 0, -3)))
                $lastmonthtotal += $req['total'];

            $yeartotal += $req['total'];
        }
        
        $data['requestData'] = array(
            'week' => $weektotal,
            'weekperc' => $lastweektotal == 0 ? 0 : round((($weektotal - $lastweektotal)/$lastweektotal)*100, 2),
            'month' => $monthtotal,
            'monthperc' => $lastmonthtotal == 0 ? 0 : round((($monthtotal - $lastmonthtotal)/$lastmonthtotal)*100, 2),
            'year' => $yeartotal,
            'yearperc' => $lastyeartotal == 0 ? 0 : round((($yeartotal - $lastyeartotal)/$lastyeartotal)*100, 2),
        );
        

        $weekcategory = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
        $weekdata = array_fill(0, 7, 0);
        $agodate = strtotime('7 days ago', strtotime('tomorrow'));
        $weekcategory = $this->rotateLeft($weekcategory, intval(date('N', $agodate)) - 1);

        $thirtyagodate = strtotime('30 days ago', strtotime('tomorrow'));
        $monthcategory = [];
        for ($i = $thirtyagodate; $i < strtotime('tomorrow'); $i = $i + 24 * 60 * 60)
            array_push($monthcategory, date('d M', $i));
        $monthdata = array_fill(0, 30, 0);
        
        $twelvemonthsago = strtotime('11 months ago', strtotime(date('Y-m-01')));
        $monthscategory = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $monthscategory = $this->rotateLeft($monthscategory, intval(date('n', $twelvemonthsago)) - 1);
        $monthsdata = array_fill(0, 12, 0);

        foreach($donations as $d){
            $epoch = intval(substr($d['donated_datetime'], 0, -3));
            //weekcalculation
            if( $epoch >= $agodate){
                $index = array_search(date('D', $epoch), $weekcategory);
                $weekdata[$index] += $d['blood_vol'];
            }

            if( $epoch >= $thirtyagodate){
                $index = array_search(date('d M', $epoch), $monthcategory);
                $monthdata[$index] += $d['blood_vol'];
            }

            if( $epoch >= $twelvemonthsago){
                $index = array_search(date('M', $epoch), $monthscategory);
                $monthsdata[$index] += $d['blood_vol'];
            }
        }

        $data['collectionchart']['week'] = array(
            'category' => json_encode($weekcategory),
            'data' => json_encode($weekdata)
        );
        $data['collectionchart']['month'] = array(
            'category' => json_encode($monthcategory),
            'data' => json_encode($monthdata)
        );
        $data['collectionchart']['year'] = array(
            'category' => json_encode($monthscategory),
            'data' => json_encode($monthsdata)
        );

        $weekcategory = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
        $weekdata = array_fill(0, 7, 0);
        $agodate = strtotime('7 days ago', strtotime('tomorrow'));
        $weekcategory = $this->rotateLeft($weekcategory, intval(date('N', $agodate)) - 1);

        $thirtyagodate = strtotime('30 days ago', strtotime('tomorrow'));
        $monthcategory = [];
        for ($i = $thirtyagodate; $i < strtotime('tomorrow'); $i = $i + 24 * 60 * 60)
            array_push($monthcategory, date('d M', $i));
        $monthdata = array_fill(0, 30, 0);
        
        $twelvemonthsago = strtotime('11 months ago', strtotime(date('Y-m-01')));
        $monthscategory = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $monthscategory = $this->rotateLeft($monthscategory, intval(date('n', $twelvemonthsago)) - 1);
        $monthsdata = array_fill(0, 12, 0);

        foreach($requests as $r){
            if ($r['status'] != REQUEST_ACCEPTED)
                continue;

            $epoch = intval(substr($r['request_datetime'], 0, -3));
            //weekcalculation
            if( $epoch >= $agodate){
                $index = array_search(date('D', $epoch), $weekcategory);
                $weekdata[$index] += $r['total'];
            }

            if( $epoch >= $thirtyagodate){
                $index = array_search(date('d M', $epoch), $monthcategory);
                $monthdata[$index] += $r['total'];
            }

            if( $epoch >= $twelvemonthsago){
                $index = array_search(date('M', $epoch), $monthscategory);
                $monthsdata[$index] += $r['total'];
            }
        }

        $data['requestchart']['week'] = array(
            'category' => json_encode($weekcategory),
            'data' => json_encode($weekdata)
        );
        $data['requestchart']['month'] = array(
            'category' => json_encode($monthcategory),
            'data' => json_encode($monthdata)
        );
        $data['requestchart']['year'] = array(
            'category' => json_encode($monthscategory),
            'data' => json_encode($monthsdata)
        );

        $data['appointmentdetails'] = array(
            'total' => $this->hospital_model->getAppointmentCount($this->id),
            'today' => count($this->hospital_model->getTodayAppointments($this->id)),
            'reserved' => $this->hospital_model->getReservedAppointmentCount($this->id)
        );

        $data['campdetails'] = array(
            'total' => $this->hospital_model->getOrganizedCampCount($this->id),
            'today' => count($this->hospital_model->getTodayCamps($this->id)),
            'ongoing' => $this->hospital_model->getOngoingCampCount($this->id)
        );

        $data['donationdetails'] = array(
            'appointment' => $this->hospital_model->getDonationAppointmentCount($this->id),
            'camp' => $this->hospital_model->getDonationCampCount($this->id)
        );

        $this->load->view('hospital/dashboard', $data);
    }

    private function rotateLeft($array, $rotations) {     
        for($i = 0; $i < $rotations; $i++){
            $firstElement = array_shift($array);
            array_push($array, $firstElement);
        }

        return $array;
    }

    public function logout(){
        $this->session->unset_userdata('user');
        redirect('/');
    }
}