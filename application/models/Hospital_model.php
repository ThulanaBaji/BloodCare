<?php

//processes/provides requests/data from/for the donor actions

class hospital_model extends CI_Model {

    //name, profile, email, contact, status
    public function getInfo($id){
        $query_str = 'SELECT `name`, `profile`, `email`, `contact`, `status` FROM `hospital` WHERE `id` = ?';

        $result = $this->db->query($query_str, $id);
        return $result->row();
    }

    public function getAppointments($id){
        $query_str = 'SELECT CONCAT(donor.firstname, " ", donor.lastname) as name, donor.profile, 
                             appointmentslot.id, appointmentslot.datetime as starttime, (appointmentslot.datetime + appointmentslot.duration) as endtime, 
                             appointmentslot.status, appointmentslot.message 
                       FROM (
                        (`appointmentslot` 
                        INNER JOIN donor_appointment ON donor_appointment.appointmentslot_id = appointmentslot.id) 
                        INNER JOIN donor ON donor.id = donor_appointment.donor_id ) 
                       WHERE appointmentslot.hospital_id = ? AND appointmentslot.datetime > ? AND appointmentslot.status != ?
                       ORDER BY starttime;';
        $result = $this->db->query($query_str, array($id, time()*1000, APPOINTMENT_VACANT));

        return $result->result_array();
    }

    public function getAppointmentsOf($id, $from, $to){
        $query_str = 'SELECT CONCAT(donor.firstname, " ", donor.lastname) as name, donor.profile, 
                             appointmentslot.id, appointmentslot.datetime as starttime, (appointmentslot.datetime + appointmentslot.duration) as endtime, 
                             appointmentslot.status, appointmentslot.message 
                       FROM (
                        (`appointmentslot` 
                        INNER JOIN donor_appointment ON donor_appointment.appointmentslot_id = appointmentslot.id) 
                        INNER JOIN donor ON donor.id = donor_appointment.donor_id ) 
                       WHERE appointmentslot.hospital_id = ? AND appointmentslot.datetime >= ? AND appointmentslot.datetime <= ? AND appointmentslot.status != ?
                       ORDER BY starttime;';
        $result = $this->db->query($query_str, array($id, $from, $to, APPOINTMENT_VACANT));

        return $result->result_array();
    }

    public function rejectAppointment($id, $hospital_id, $message){
        $query_str = 'UPDATE `appointmentslot` SET `status` = ?, `message` = ? WHERE id = ? AND hospital_id = ?';
        $result = $this->db->query($query_str, array(APPOINTMENT_REJECTED, $message, $id, $hospital_id));

        return $result;
    }

    public function saveConfig($id, $configType, $config){
        $query_str = 'SELECT `id` FROM `hospital_configure` WHERE `hospital_id` = ?';
        $result = $this->db->query($query_str, $id);

        if($result->num_rows() > 0){
            $query_str = 'UPDATE `hospital_configure` SET `'.$configType.'`= ? WHERE `hospital_id` = ?';
            $result = $this->db->query($query_str, array($config, $id));
        }else{
            $query_str = 'INSERT INTO `hospital_configure`(`id`, `hospital_id`, `'.$configType.'`) VALUES (NULL, ?, ?)';
            $result = $this->db->query($query_str, array($id, $config));
        }
    }

    public function getConfig($id, $configType){
        $query_str = 'SELECT `'.$configType.'` FROM `hospital_configure` WHERE `hospital_id` = ? AND `'.$configType.'` != ""';
        $result = $this->db->query($query_str, $id);

        return $result->row()->$configType;
    }
}