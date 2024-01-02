<?php

//processes/provides requests/data from/for the donor actions

class donor_model extends CI_Model {

    //name, profile, email, contact
    public function getInfo($id){
        $query_str = 'SELECT CONCAT(`firstname` , " ", `lastname`) as name, `profile`, `email` FROM `donor` WHERE `id` = ?';

        $result = $this->db->query($query_str, $id);
        return $result->row();
    }

    public function getCamps($id){
        $str = 'SELECT bloodcamp.*, hospital.name as "hname", hospital.city as "hcity",
                       (SELECT COUNT(bloodcamp_donor.id) 
                       FROM bloodcamp_donor 
                       WHERE bloodcamp_donor.bloodcamp_id = bloodcamp.id AND bloodcamp_donor.status="'.CAMP_JOINED.'") as "cur_seats" 
                FROM `bloodcamp` 
                INNER JOIN hospital on bloodcamp.hospital_id = hospital.id
                WHERE bloodcamp.id NOT IN (SELECT bloodcamp_donor.bloodcamp_id FROM bloodcamp_donor 
                                           WHERE bloodcamp_donor.donor_id = '.$id.' AND bloodcamp_donor.status = "'.CAMP_JOINED.'") 
                      AND bloodcamp.status != "'.CAMP_CANCELLED.'" AND start_datetime + duration > '.time()*1000;
                
        $result = $this->db->query($str);

        return $result->result_array();
    }

    public function getJoinedCampCount($id){
        $str = 'SELECT COUNT(id) as count FROM bloodcamp_donor 
                WHERE donor_id = ' . $id . ' AND status = "' . CAMP_JOINED . '"';
        $result = $this->db->query($str);
        return $result->row();
    }

    /***
     * ------------------------------- Appointment section
     */

    public function getAppointments(){
        $str = 'SELECT hospital.email, hospital.name, hospital.profile, hospital.zipcode, hospital.city, hospital.district, hospital.province, `appointmentslot`.`id`, appointmentslot.datetime, appointmentslot.status,     appointmentslot.duration, appointmentslot.message FROM (`appointmentslot` 
        INNER JOIN hospital ON appointmentslot.hospital_id = hospital.id)
        WHERE appointmentslot.status IN ? AND appointmentslot.datetime > ?';

        $result = $this->db->query($str, array(array(APPOINTMENT_VACANT, APPOINTMENT_CANCELLED), time()*1000));
        return $result->result_array();
    }

    public function getOngoingAppointments($id){
        $str = 'SELECT hospital.email, hospital.name, hospital.profile, hospital.city, hospital.zipcode, hospital.district, hospital.province, a.datetime as starttime, (a.datetime + a.duration) as endtime, a.id, a.duration, a.status, a.message 
                FROM ((`donor_appointment` 
                INNER JOIN appointmentslot as a ON donor_appointment.appointmentslot_id = a.id) 
                INNER JOIN hospital ON hospital.id = a.hospital_id ) 
                WHERE donor_appointment.donor_id = ? AND a.datetime > (UNIX_TIMESTAMP()*1000) AND a.status IN ? 
                ORDER BY a.datetime;';

        $result = $this->db->query($str, array($id, array(APPOINTMENT_RESERVED, APPOINTMENT_REJECTED, APPOINTMENT_CANCELLED)));
        return $result->result_array();
    }

    public function getOngoingAppointmentCount($id){
        $str = 'SELECT a.id
        FROM ((`donor_appointment` 
        INNER JOIN appointmentslot as a ON donor_appointment.appointmentslot_id = a.id) 
        INNER JOIN hospital ON hospital.id = a.hospital_id ) 
        WHERE donor_appointment.donor_id = ? AND a.datetime > (UNIX_TIMESTAMP()*1000) AND a.status IN ? 
        ORDER BY a.datetime;';

        $result = $this->db->query($str, array($id, array(APPOINTMENT_RESERVED)));
        return $result->num_rows();
    }

    public function cancelAppointment($appointment_id, $id, $msg){
        $str = 'SELECT id FROM `donor_appointment` WHERE donor_id = ? AND appointmentslot_id = ?';
        $result = $this->db->query($str, array($id, $appointment_id));

        if($result->num_rows() == 1)
        {   
            $query_str = 'UPDATE `appointmentslot` SET `status` = ?, `message` = ? WHERE id = ?';
            $result = $this->db->query($query_str, array(APPOINTMENT_CANCELLED, $msg, $appointment_id));
        }
    }

    public function reserveAppointment($appointment_id, $donor_id){
        $str = 'SELECT id FROM `appointmentslot` WHERE id = ? AND datetime > (UNIX_TIMESTAMP()*1000) AND status in ?';
        $result = $this->db->query($str, array($appointment_id, array(APPOINTMENT_VACANT, APPOINTMENT_CANCELLED)));

        if($result->num_rows() == 1)
        {   
            $query_str = 'INSERT INTO `donor_appointment`(`id`, `donor_id`, `appointmentslot_id`) VALUES (?, ?, ?)';
            $result = $this->db->query($query_str, array(NULL, $donor_id, $appointment_id));

            $query_str = 'UPDATE `appointmentslot` SET `status` = ? WHERE id = ?';
            $result = $this->db->query($query_str, array(APPOINTMENT_RESERVED, $appointment_id));

        }
    }
}