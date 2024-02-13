<?php

class Inventory extends CI_Controller
{
    private $id;
    private $role = 'admin';

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');

        if (!$this->session->has_userdata('user')) {
            $this->session->set_flashdata('error', 'Please login first to access the page');
            redirect('login/admin');
        }

        if ($this->session->userdata('user')['role'] != $this->role)
            show_404();

        $this->id = $this->session->userdata('user')['id'];

        $this->load->database();
        $this->load->model('admin_model');
    }

    public function index()
    {

        $data['active'] = '3';
        $data['view'] = 'admin/dashboard/inventory';

        $res = $this->admin_model->getInfo($this->id);
        foreach ($res as $key => $value)
            $data[$key] = $value;

        $success = $this->session->flashdata('success');
        $error = $this->session->flashdata('error');
        if ($success != '')
            $data['success'] = $success;
        if ($error != '')
            $data['error'] = $error;

        $data['desired'] = $this->admin_model->getLevel();
        $data['bloods'] = $this->admin_model->getBloods()['bloods'];
        $data['total'] = $this->admin_model->getBloods()['total'];
        $data['transactions'] = $this->admin_model->getInventory();

        $this->load->view('admin/dashboard', $data);
    }

    public function adjust(){
        if(!isset($_POST['token']) || $_POST['token'] != 'adjust'){
            $this->session->set_flashdata('error', 'bad request');
            redirect('admin/inventory');
        }

        $data = $_POST;
        $data = array_slice($data, 1);
        
        $this->admin_model->adjustLevel($this->id, json_encode($data));
        
        $this->session->set_flashdata('success', 'Blood levels were updated');
        redirect('admin/inventory');
    }

    public function bloodinflow(){
        if(!isset($_POST['reference']) || empty($_POST['reference']) || !isset($_POST['bloods']) || empty($_POST['bloods'])){
            $this->session->set_flashdata('error', 'bad request');
            redirect('admin/inventory');
        }

        $data = $_POST;

        $curdetails = $this->admin_model->getBloods();
        $bloods = json_decode($curdetails['bloods']);
        $trantotal = 0;


        foreach ($data['bloods'] as $btype => $vol) {
            $bloods->$btype += $vol;
            $trantotal += $vol;
        }

        $data['trantotal'] = $trantotal;
        $data['total'] = $trantotal + $curdetails['total'];
        $data['tranbloodjson'] = json_encode($data['bloods']);
        $data['bloodjson'] = json_encode($bloods);

        $this->admin_model->addBlood($this->id, $data);

        $this->session->set_flashdata('success', 'Blood volumes keyed in');
        redirect('admin/inventory');
    }

    public function bloodoutflow(){
        if(!isset($_POST['reference']) || empty($_POST['reference']) || !isset($_POST['bloods']) || empty($_POST['bloods'])){
            $this->session->set_flashdata('error', 'bad request');
            redirect('admin/inventory');
        }

        $data = $_POST;

        $curdetails = $this->admin_model->getBloods();
        $bloods = json_decode($curdetails['bloods']);
        $trantotal = 0;

        foreach ($data['bloods'] as $btype => $vol) {

            if($bloods->$btype < $vol){
                $this->session->set_flashdata('error', 'insufficient blood volume in inventory');
                redirect('admin/inventory');
            }

            $bloods->$btype -= $vol;
            $trantotal += $vol;
        }

        $data['trantotal'] = $trantotal;
        $data['total'] =  $curdetails['total'] - $trantotal;
        $data['tranbloodjson'] = json_encode($data['bloods']);
        $data['bloodjson'] = json_encode($bloods);

        $this->admin_model->releaseBlood($this->id, $data);

        
        $this->session->set_flashdata('success', 'Released blood volumes keyed in');
        redirect('admin/inventory');
    }

    public function test(){
        print_r();
    }
}