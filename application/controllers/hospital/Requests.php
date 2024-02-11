<?php

class Requests extends CI_Controller
{
    private $id;
    private $role = 'hospital';

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
        $this->load->model('hospital_model');
    }

    public function index()
    {

        $data['active'] = '2';
        $data['view'] = 'hospital/dashboard/requests';

        $res = $this->hospital_model->getInfo($this->id);
        foreach ($res as $key => $value)
            $data[$key] = $value;

        $data['requests'] = $this->hospital_model->getRequests($this->id);

        $this->load->view('hospital/dashboard', $data);
    }

    public function makeRequest(){

        if(isset($_POST['reference']) && isset($_POST['bloods']) && count($_POST['bloods']) > 0){
            $data = $_POST;

            $data['bloodsjson'] = json_encode($_POST['bloods']);

            $total = 0;
            foreach($_POST['bloods'] as $btype => $bvol){
                $total += intval($bvol);
            }
            $data['total'] = $total;

            $this->hospital_model->makeRequest($data, $this->id);
        }

        redirect('hospital/requests/');
    }

    public function test(){
        print_r($this->hospital_model->getRequests($this->id));
    }

    public function cancelRequest($id){
        if(isset($id) && is_numeric($id)){
            $this->hospital_model->cancelRequest($id, $this->id);
        }

        redirect('hospital/requests');
    }
}