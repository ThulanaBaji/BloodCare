<?php

//processes/provides requests/data from/for the donor actions

class hospital_model extends CI_Model {

    //name, profile, email, contact, status
    public function getInfo($id){
        $query_str = 'SELECT `name`, `profile`, `email`, `contact`, `status` FROM `hospital` WHERE `id` = ?';

        $result = $this->db->query($query_str, $id);
        return $result->row();
    }
}