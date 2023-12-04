<?php

//processes/provides requests/data from/for the donor actions

class donor_model extends CI_Model {

    //name, profile, email, contact
    public function getInfo($id){
        $query_str = 'SELECT CONCAT(`firstname` , " ", `lastname`) as name, `profile`, `email` FROM `donor` WHERE `id` = ?';

        $result = $this->db->query($query_str, $id);
        return $result->row();
    }

    public function getAppointments(){
        $str = 'SELECT hospital.email, hospital.name, hospital.profile, hospital.zipcode, hospital.city, hospital.district, hospital.province, `appointmentslot`.`id`, appointmentslot.datetime, appointmentslot.duration, appointmentslot.message FROM (`appointmentslot` 
        INNER JOIN hospital ON appointmentslot.hospital_id = hospital.id)
        WHERE appointmentslot.status = ? AND appointmentslot.datetime > ?';

        $result = $this->db->query($str, array(APPOINTMENT_VACANT, time()*1000));
        return $result->result_array();
    }

    public function getOngoingAppointments($id){
        $str = 'SELECT appointmentslot.id, appointmentslot.datetime as starttime, (appointmentslot.datetime + appointmentslot.duration) as endtime, appointmentslot.status, appointmentslot.message 
  FROM (
   (`appointmentslot` 
   INNER JOIN donor_appointment ON donor_appointment.appointmentslot_id = appointmentslot.id) 
   INNER JOIN donor ON donor.id = donor_appointment.donor_id ) 
  WHERE appointmentslot.hospital_id = ? AND appointmentslot.datetime > ? AND appointmentslot.status != ?
  ORDER BY starttime;';
    }
}