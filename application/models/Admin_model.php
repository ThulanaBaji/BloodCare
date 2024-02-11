<?php

//processes/provides requests/data from/for the donor actions

class admin_model extends CI_Model
{

    //name, profile, email, contact
    public function getInfo($id)
    {
        $query_str = 'SELECT `name`, `email`, `employee_id` FROM `admin` WHERE `id` = ?';

        $result = $this->db->query($query_str, $id);
        return $result->row();
    }

    /**
     * ------------------------------------------ Hospital verification
     */

    public function getHospitals(){
        return $this->db->select('*')->get('hospital')->result_array();
    }

    public function changeHospitalStatus($id, $hospital_id, $status, $message = null){
        $str = 'UPDATE hospital SET status = ?, responsed_datetime = ?, responsed_admin = ?, message = ? WHERE id = ?';
        $this->db->query($str, array($status, time()*1000, $id, $message, $hospital_id));
    }

    public function updateVerificationKey($email, $key){
        $expire_time = time() + 172800;

        $query_str = 'UPDATE `hospital` SET `expire` = ?, `verification` = ?  WHERE `email` = ?';
        $this->db->query($query_str, array($expire_time, $key, $email));
    }
}