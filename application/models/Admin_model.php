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
}