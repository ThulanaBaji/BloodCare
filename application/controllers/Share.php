<?php

class Share extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function camp($id){
        $this->load->model('view_model');
        $camp = $data['camp'] = $this->view_model->getCamp($id);

        $data['location'] = $camp->location_city . ', ' . $camp->location_district;
        $data['date'] = date("F j\, Y", substr($camp->start_datetime, 0, -3));
        $data['time'] = date('H:i', substr($camp->start_datetime, 0, -3)).' - '.
                date('H:i', substr((int)$camp->start_datetime + (int)$camp->duration, 0, -3)).' in '.
                date('j F', substr((int)$camp->start_datetime + (int)$camp->duration, 0, -3));
        $data['with'] = $camp->hname . ', ' . $camp->hcity;
        $data['count'] = $camp->cur_seats . '/' . $camp->max_seats;
        $data['url'] = base_url('uploads/camp/profileimages/'.$camp->profile);
        $data['status'] = $camp->status;

        $this->load->view('share/camp', $data);
    }
}