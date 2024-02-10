<?php

class view_model extends CI_Model
{
    public function getCamp($id){
        $str = 'SELECT bloodcamp.*, hospital.name as "hname", hospital.city as "hcity",
                        (SELECT COUNT(bloodcamp_donor.id) 
                        FROM bloodcamp_donor 
                        WHERE bloodcamp_donor.bloodcamp_id = bloodcamp.id AND bloodcamp_donor.status="'.CAMP_JOINED.'") as "cur_seats" 
                FROM `bloodcamp` 
                INNER JOIN hospital on bloodcamp.hospital_id = hospital.id
                WHERE bloodcamp.id='.$id;
        return $this->db->query($str)->row();
    }
}