<?php

//processes/provides requests/data from/for the donor actions

class hospital_model extends CI_Model {

    //name, profile, email, contact, status
    public function getInfo($id){
        $query_str = 'SELECT `name`, `profile`, `email`, `status` FROM `hospital` WHERE `id` = ?';

        $result = $this->db->query($query_str, $id);
        return $result->row();
    }

    /**
     * --------------------------------Camps section
     */

    //ongoing, cancelled-filled-vacant
    public function getCamps($id){
        $str = 'SELECT bloodcamp.*, hospital.name as "hname", hospital.city as "hcity",
                       (SELECT COUNT(bloodcamp_donor.id) 
                       FROM bloodcamp_donor 
                       WHERE bloodcamp_donor.bloodcamp_id = bloodcamp.id AND bloodcamp_donor.status="'.CAMP_JOINED.'") as "cur_seats" 
                FROM `bloodcamp` 
                INNER JOIN hospital on bloodcamp.hospital_id = hospital.id
                WHERE hospital_id = '.$id.' AND start_datetime + duration > '.time()*1000;
        $result = $this->db->query($str);

        return $result->result_array();
    }

    public function getOrganizedCamps($id){
        $str = 'SELECT bloodcamp.*, hospital.name as "hname", hospital.city as "hcity",
                       (SELECT COUNT(bloodcamp_donor.id) 
                       FROM bloodcamp_donor 
                       WHERE bloodcamp_donor.bloodcamp_id = bloodcamp.id AND bloodcamp_donor.status="'.CAMP_JOINED.'") as "cur_seats" 
                FROM `bloodcamp` 
                INNER JOIN hospital on bloodcamp.hospital_id = hospital.id
                WHERE hospital_id = '.$id.' AND start_datetime + duration <= '.time()*1000;
        $result = $this->db->query($str);

        return $result->result_array();
    }

    public function getOrganizedCampsCount($id){
        return count($this->getOrganizedCamps($id));
    }

    public function addCamp($id, $data)
    {
        $str = 'INSERT INTO `bloodcamp`(`id`, `name`, `organizer`, `profile`, `hospital_id`, 
                                        `start_datetime`, `duration`, `location_pin`, `location_district`, `location_city`, 
                                        `location_address`, `max_seats`, `message`, `status`) 
                       VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
        $this->db->query($str, array(NULL, $data['name'], $data['organizer'], $data['image'], $id,
                                     $data['datetime'], $data['duration'], $data['pin'], $data['district'], $data['city'],
                                     $data['address'], $data['maxseats'], '', CAMP_VACANT));

    }

    public function updateCamp($id, $data, $default){
        $str = 'UPDATE `bloodcamp` SET `name`= ?,`organizer`= ?,
        `start_datetime`= ?,`duration`=?,
        `location_pin`=?,`location_district`=?,`location_city`=?,
        `location_address`=?,`max_seats`=?';
        if (!$default)
            $str .= ', profile = "'.$data['image'].'"';
        $str .= ' WHERE `hospital_id`= ? AND id = ?';

        $this->db->query($str, array($data['name'], $data['organizer'],
                        $data['datetime'], $data['duration'], 
                        $data['pin'], $data['district'], $data['city'], 
                        $data['address'], $data['maxseats'], 
                        $id, $data['campid']));
    }

    public function cancelCamp($hospitalid, $campid, $message){
        $str = 'UPDATE `bloodcamp` SET `message`= ?,`status`= ? WHERE id=? AND hospital_id=?';
        $this->db->query($str, array($message, CAMP_CANCELLED, $campid, $hospitalid));
    }


    /**
     * --------------------------------Appointments section
     */

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

    public function addAppointment($id, $time, $duration){

        $str = 'SELECT id FROM appointmentslot WHERE hospital_id = ? AND datetime = ? AND duration = ?';
        $result = $this->db->query($str, array($id, $time, $duration));
        if($result->num_rows() > 0)
            return FALSE;

        $str = 'SELECT id, status FROM appointmentslot WHERE hospital_id = ? AND status IN ? AND
                ((datetime <= ? AND (datetime + duration) > ?) OR (datetime < ? AND (datetime + duration) >= ?))';        
        $result = $this->db->query($str, array($id, array(APPOINTMENT_VACANT, APPOINTMENT_RESERVED), $time, $time, ($time + $duration), ($time + $duration)));

        if($result->num_rows() > 0){
            foreach($result->result_array() as $row){
                if($row['status'] == APPOINTMENT_VACANT){
                    $str = 'DELETE FROM appointmentslot WHERE id = ?';
                    $this->db->query($str, $row['id']);
                }else{
                    $str = 'UPDATE appointmentslot SET status = ?, message = ? WHERE id = ?';
                    $this->db->query($str, array(APPOINTMENT_REJECTED, 'service available appointments changed, please make another appointment.', $row['id']));
                }
            }
        }

        $str = 'INSERT INTO `appointmentslot`(`id`, `hospital_id`, `datetime`, `duration`, `status`) VALUES (?, ?, ?, ?, ?)';

        $data = array( NULL, $id, $time, $duration, APPOINTMENT_VACANT);
        $this->db->query($str, $data);
        return TRUE;
    }

    public function addAppointmentBreak($id, $from, $to){
        $count = 0;

        $str = 'SELECT id, status FROM appointmentslot WHERE hospital_id = ? AND status IN ? AND
                ((datetime%86400000 <= ? AND (datetime + duration)%86400000 > ?) OR (datetime%86400000 < ? AND (datetime + duration)%86400000 >= ?))';        
        $result = $this->db->query($str, array($id, array(APPOINTMENT_VACANT, APPOINTMENT_RESERVED), $from, $from, $to, $to));

        if($result->num_rows() > 0){
            foreach($result->result_array() as $row){
                if($row['status'] == APPOINTMENT_VACANT){
                    $str = 'DELETE FROM appointmentslot WHERE id = ?';
                    $this->db->query($str, $row['id']);
                }else{
                    $str = 'UPDATE appointmentslot SET status = ?, message = ? WHERE id = ?';
                    $this->db->query($str, array(APPOINTMENT_REJECTED, 'Unfortunately, service is having a break at this hour. Please make another appointment.', $row['id']));
                }

                $count++;
            }
        }
        
        return $count;
    }

    public function rejectAppointment($id, $hospital_id, $message){
        $query_str = 'UPDATE `appointmentslot` SET `status` = ?, `message` = ? WHERE id = ? AND hospital_id = ?';
        $result = $this->db->query($query_str, array(APPOINTMENT_REJECTED, $message, $id, $hospital_id));

        return $result;
    }

    /**
     * ------------------------end of section
     */

    public function saveConfig($id, $configType, $config){
        $query_str = 'SELECT `id` FROM `hospital_configure` WHERE `hospital_id` = ?';
        $result = $this->db->query($query_str, $id);

        if($result->num_rows() > 0){
            $query_str = 'UPDATE `hospital_configure` SET `'.$configType.'`= ? WHERE `hospital_id` = ?';
            $result = $this->db->query($query_str, array($config, $id));
        }else{
            $query_str = 'INSERT INTO `hospital_configure`(`id`, `hospital_id`, `'.$configType.'`) VALUES (?, ?, ?)';
            $result = $this->db->query($query_str, array(NULL, $id, $config));
        }
    }

    public function getConfig($id, $configType){
        $query_str = 'SELECT `'.$configType.'` FROM `hospital_configure` WHERE `hospital_id` = ? AND `'.$configType.'` != ""';
        $result = $this->db->query($query_str, $id);

        if($result->num_rows() > 0)
            return $result->row()->$configType;
        return '[]';
    }
}