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
     * ----------------------------------------- Profile
     */

    public function updateDetails($strfrac, $id){
        $str = 'UPDATE hospital SET ' . $strfrac . ' WHERE id='.$id;
        $this->db->query($str);
    }

    public function checkOldPassword($pass, $id){
        $p = md5($pass);

        $str = 'SELECT id FROM admin WHERE id=? AND password=?';
        return $this->db->query($str, array($id, $p))->num_rows();
    }

    public function updatePassword($oldpass, $newpass, $id){
        if($this->checkOldPassword($oldpass, $id) > 0){
            $p = md5($newpass);
            $str = 'UPDATE admin SET password = ? WHERE id = ?';
            $this->db->query($str, array($p, $id));
            return 1;   
        } else
            return -1;
    }

    /**
     * ----------------------------------------- Inventory
     */

    public function getInventory(){
        return $this->db->select('*')->get('inventory')->result_array();
    }

    public function getBloods(){
        $str = 'SELECT bloods, total FROM inventory ORDER BY id DESC LIMIT 1';
        $result = $this->db->query($str)->result_array();

        if (count($result) == 0)
            return array('bloods' => '{"op":"0","on":"0","ap":"0","an":"0","bp":"0","bn":"0","abp":"0","abn":"0"}', 'total' => 0);
        return $result[0];
    }

    public function addBlood($id, $data){
        $qd = array(
            'id' => null,
            'admin_id' => $id,
            'reference' => $data['reference'],
            'tran_bloods' => $data['tranbloodjson'],
            'tran_total' => $data['trantotal'],
            'bloods' => $data['bloodjson'],
            'total' => $data['total'],
            'type' => INVENTORY_INFLOW,
            'create_time' => null
        );

        $this->db->insert('inventory', $qd);
    }

    public function releaseBlood($id, $data){
        $qd = array(
            'id' => null,
            'admin_id' => $id,
            'reference' => $data['reference'],
            'tran_bloods' => $data['tranbloodjson'],
            'tran_total' => $data['trantotal'],
            'bloods' => $data['bloodjson'],
            'total' => $data['total'],
            'type' => INVENTORY_OUTFLOW,
            'create_time' => null
        );

        $this->db->insert('inventory', $qd);
    }

    public function getLevel(){
        $str = 'SELECT bloods FROM inventory_desired ORDER BY id DESC LIMIT 1';
        $result = $this->db->query($str)->result_array();

        if (count($result) == 0)
            return '';
        return $result[0]['bloods'];
    }

    public function adjustLevel($id, $json){
        $qd = array(
            'id' => null,
            'admin_id' => $id,
            'bloods' => $json,
            'create_time' => null
        );

        $this->db->insert('inventory_desired', $qd); 
    }

    /**
     * ------------------------------------------ Bloood requests
     */

    public function getRequests(){
        $str = 'SELECT hospital_request.*, hospital.name, hospital.regnumber, hospital.city FROM hospital_request
                INNER JOIN hospital on hospital_request.hospital_id = hospital.id';
        return $this->db->query($str)->result_array();
    }

    public function acceptRequest($id, $data){
        $str = 'UPDATE hospital_request SET status = ?, responsed_datetime = ?, admin_id = ?, message = ? WHERE id = ?';
        $this->db->query($str, array(REQUEST_ACCEPTED, time()*1000, $id, $data['message'], $data['id']));
    }

    public function rejectRequest($id, $data){
        $str = 'UPDATE hospital_request SET status = ?, responsed_datetime = ?, admin_id = ?, message = ? WHERE id = ?';
        $this->db->query($str, array(REQUEST_REJECTED, time()*1000, $id, $data['message'], $data['id']));
    }

    /**
     * ------------------------------------------ Camp shedule
     */

    public function getCamps(){
        $str = 'SELECT hospital.regnumber, hospital.name as hname, hospital.city as hcity, bloodcamp.*, (SELECT COUNT(bloodcamp_donor.id) 
                                    FROM bloodcamp_donor 
                                    WHERE bloodcamp_donor.bloodcamp_id = bloodcamp.id AND bloodcamp_donor.status IN ("'.CAMP_JOINED.'")) as "cur_seats"
                                    FROM bloodcamp
                INNER JOIN hospital on hospital.id = bloodcamp.hospital_id
                WHERE start_datetime > ' . time() * 1000;
        return $this->db->query($str)->result_array();
    }

    public function revokeCamp($id, $camp_id, $message){
        $str = 'UPDATE bloodcamp SET status = ?, admin_id = ?, message = ? WHERE id = ?';
        $this->db->query($str, array(CAMP_REVOKED, $id, $message, $camp_id));
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