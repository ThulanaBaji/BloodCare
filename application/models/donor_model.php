<?php

//processes/provides requests/data from/for the donor actions

class donor_model extends CI_Model {

    //name, profile, email, contact
    public function getInfo($id){
        $query_str = 'SELECT CONCAT(`firstname` , " ", `lastname`) as name, `profile`, `email` FROM `donor` WHERE `id` = ?';

        $result = $this->db->query($query_str, $id);
        return $result->row();
    }
}