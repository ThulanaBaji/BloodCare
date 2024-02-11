<?php

//processes/provides requests/data from/for the donor actions

class hospital_model extends CI_Model {

    //name, profile, email, contact, status
    public function getInfo($id){
        $query_str = 'SELECT (SELECT COUNT(id) FROM notification_hospital WHERE hospital_id = ? AND status = ?) as ncount, `name`, `profile`, `email`, `city`,`status` FROM `hospital` WHERE `id` = ?';

        $result = $this->db->query($query_str, array($id, MSG_SENT, $id));
        return $result->row();
    }

    /**
     * ---------------------------------------------- Dashboard
     */

    public function getDonationsCount($id){
        $str = 'SELECT COUNT(id) as count FROM donor_donation WHERE hospital_id = ?';
        $result = $this->db->query($str, $id);
        return $result->result_array()[0]['count'];
    }

    public function getProcessingBloodCount($id){
        $str = 'SELECT COUNT(id) as count FROM donor_donation WHERE hospital_id = ? AND status = ?';
        return $this->db->query($str, array($id, DONATION_PROCESSING))->result_array()[0]['count'];
    }

    public function getPendingRequestCount($id){
        $str = 'SELECT COUNT(id) as count FROM hospital_request WHERE hospital_id = ? AND status = ?';
        return $this->db->query($str, array($id, REQUEST_PENDING))->result_array()[0]['count'];
    }


    /**
     * ---------------------------------------------- Requests
     */

    public function getRequests($id){
        $str = 'SELECT *
                FROM hospital_request
                WHERE hospital_id = ?
                ORDER BY FIELD(status, ?) DESC, request_datetime DESC';
        $result = $this->db->query($str, array($id, REQUEST_PENDING));
        return $result->result_array();
    }

    public function makeRequest($data, $id){
        $qd = array(
            'hospital_id' => $id,
            'request' => $data['bloodsjson'],
            'priority' => $data['priority'],
            'request_datetime' => time()*1000,
            'reference' => $data['reference'],
            'status' => REQUEST_PENDING
        );

        $this->db->insert('hospital_request', $qd);
    }

    public function cancelRequest($id, $hospital_id){
        $str = 'UPDATE hospital_request SET status=?, responsed_datetime=? WHERE id=? AND hospital_id=?';
        $this->db->query($str, array(REQUEST_CANCELLED, time()*1000, $id, $hospital_id));
    }


    /**
     * ---------------------------------------------- Donation Processing
     */

    //- - - - today subsection

    public function getTodayCamps($id){
        $query_str = 'SELECT bloodcamp.name, bloodcamp.profile, (SELECT COUNT(bloodcamp_donor.id) 
                                                                 FROM bloodcamp_donor 
                                                                 WHERE bloodcamp_donor.bloodcamp_id = bloodcamp.id AND bloodcamp_donor.status IN ("'.CAMP_JOINED.'", "'.DONATION_DONATED.'")) as "registered" FROM bloodcamp
                      WHERE bloodcamp.hospital_id = ? AND bloodcamp.start_datetime > ? AND bloodcamp.start_datetime < ? AND bloodcamp.status != ?';
        $result = $this->db->query($query_str, array($id, strtotime('today')*1000, strtotime('tomorrow')*10000, CAMP_CANCELLED));
        return $result->result_array();
    }

    public function getTodayCampsWithDonors($id){
        $query_str = 'SELECT bloodcamp.organizer, bloodcamp.start_datetime, bloodcamp.duration, bloodcamp.location_pin, bloodcamp.location_address, bloodcamp.max_seats, bloodcamp.id, bloodcamp.name, bloodcamp.profile, bloodcamp.location_city, bloodcamp.location_district FROM bloodcamp
                      WHERE bloodcamp.hospital_id = ? AND bloodcamp.start_datetime > ? AND bloodcamp.start_datetime < ? AND bloodcamp.status != ?';
        $result = $this->db->query($query_str, array($id, strtotime('today')*1000, strtotime('tomorrow')*10000, CAMP_CANCELLED));
        
        $camps = $result->result_array();

        $index = 0;
        foreach($camps as $camp){
            $str = 'SELECT CONCAT(donor.firstname, " ", donor.lastname) as name, donor.profile, donor.membership_id, donor.id FROM bloodcamp_donor
                    INNER JOIN donor on bloodcamp_donor.donor_id = donor.id
                    WHERE bloodcamp_donor.bloodcamp_id = ? AND bloodcamp_donor.status = ?';
            $donors = $this->db->query($str, array($camp['id'], CAMP_JOINED))->result_array();
            $camps[$index]['donors'] = $donors;
            $index++;
        }

        return $camps;
    }

    public function getTodayAppointments($id){
        return $this->getAppointmentsOf($id, strtotime('today')*1000, strtotime('+3 month', strtotime('today'))*1000);
    }

    public function addDonation($data, $id){
        $qd = array(
            'id' => NULL,
            'donor_id' => $data['donorid'],
            'reference' => $data['reference'],
            'donation_medium' => $data['donationmedium'],
            'donated_datetime' => time()*1000,
            'hospital_id' => $id,
            'status' => DONATION_PROCESSING
        );

        $this->db->insert('donor_donation', $qd);
    }

    public function markDonated($donor_id, $medium_id, $medium){
        if($medium == DONATION_CAMP){
            $str = 'UPDATE bloodcamp_donor SET status = ? WHERE donor_id = ? AND bloodcamp_id = ?';
            $this->db->query($str, array(DONATION_DONATED, $donor_id, $medium_id));
        }
        else{
            $str = 'UPDATE donor_appointment SET status = ? WHERE donor_id = ? AND id = ?';
            $this->db->query($str, array(DONATION_DONATED, $donor_id, $medium_id));
        }
    }

    //- - - - processing subsection

    public function getProcessingDonations($id){
        $str = 'SELECT donor_donation.id, reference, donor.membership_id, CONCAT(donor.firstname, " ", donor.lastname) as name, donor.profile, donated_datetime, donation_medium FROM donor_donation
                INNER JOIN donor on donor.id = donor_donation.donor_id
                WHERE donor_donation.status = ? AND donor_donation.hospital_id = ?';
        return $this->db->query($str, array(DONATION_PROCESSING, $id))->result_array();
    }

    public function processDonation($data, $id){
        //blood type, blood vol, message = null
        $str = 'UPDATE donor_donation SET status = ?, processed_datetime = ?, blood_type = ?, blood_vol = ? WHERE hospital_id = ? AND id = ?';
        $this->db->query($str, array(DONATION_PROCESSED, time()*1000, $data['bloodtype'], $data['bloodvol'], $id, $data['donationid']));
    }

    public function rejectDonation($data, $id){
        $str = 'UPDATE donor_donation SET status = ?, processed_datetime = ?, blood_type = ?, blood_vol = ?, message = ? WHERE hospital_id = ? AND id = ?';
        $this->db->query($str, array(DONATION_REJECTED, time()*1000, $data['bloodtype'], $data['bloodvol'], $data['message'], $id, $data['donationid']));
    }

    //- - - - processed subsection
    public function getProcessedDonations($id){
        $str = 'SELECT reference, status, processed_datetime, donated_datetime, donation_medium, blood_vol, blood_type, message FROM donor_donation
                WHERE donor_donation.status in ? AND donor_donation.hospital_id = ?';
        return $this->db->query($str, array(array(DONATION_PROCESSED, DONATION_REJECTED), $id))->result_array();
    }

    /**
     * ---------------------------------------------- Notifications
     */

    public function getNotifications($id){
        $str = 'SELECT notification.*, notification_hospital.id as nid, status FROM notification_hospital
                INNER JOIN notification on notification.id = notification_hospital.notification_id
                WHERE status != "'.MSG_DEL.'" AND notification_hospital.hospital_id = ' . $id.' 
                ORDER BY notification.time DESC';
        return $this->db->query($str)->result_array();
    }

    public function deleteNotification($id, $notification_id){
        $str = 'UPDATE notification_hospital SET status = ? WHERE hospital_id = ? AND notification_id = ?';
        $this->db->query($str, array(MSG_DEL, $id, $notification_id));
    }

    public function seenNotification($id, $notification_id){
        $str = 'UPDATE notification_hospital SET status = ? WHERE hospital_id = ? AND notification_id = ?';
        $this->db->query($str, array(MSG_SEEN, $id, $notification_id));
    }

    /***
     * ---------------------------------------------- Edit profile section
     */

    public function getEditInfo($id){
        $query_str = 'SELECT (SELECT COUNT(id) FROM notification_hospital WHERE hospital_id = ? AND status = ?) as ncount, name, regnumber, `profile`, `contact`, `city`, zipcode, street_address, `district`, `province`, `email` FROM `hospital` WHERE `id` = ?';

        $result = $this->db->query($query_str, array($id, MSG_SENT, $id));
        return $result->row();
    }

    public function checkOldPassword($pass, $id){
        $p = md5($pass);

        $str = 'SELECT id FROM hospital WHERE id=? AND password=?';
        return $this->db->query($str, array($id, $p))->num_rows();
    }

    public function updatePassword($oldpass, $newpass, $id){
        if($this->checkOldPassword($oldpass, $id) > 0){
            $p = md5($newpass);
            $str = 'UPDATE hospital SET password = ? WHERE id = ?';
            $this->db->query($str, array($p, $id));
            return 1;   
        } else
            return -1;
    }

    public function updateDetails($strfrac, $id){
        $str = 'UPDATE hospital SET ' . $strfrac . ' WHERE id='.$id;
        $this->db->query($str);
    }

    /**
     * --------------------------------Camps section
     */

    //ongoing, cancelled-filled-vacant
    public function getCamps($id){
        $str = 'SELECT bloodcamp.*, hospital.name as "hname", hospital.city as "hcity",
                       (SELECT COUNT(bloodcamp_donor.id) 
                       FROM bloodcamp_donor 
                       WHERE bloodcamp_donor.bloodcamp_id = bloodcamp.id AND bloodcamp_donor.status IN ("'.CAMP_JOINED.'", "'.DONATION_DONATED.'")) as "cur_seats" 
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
                       WHERE bloodcamp_donor.bloodcamp_id = bloodcamp.id AND bloodcamp_donor.status IN ("'.CAMP_JOINED.'", "'.DONATION_DONATED.'")) as "cur_seats" 
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
        $query_str = 'SELECT CONCAT(donor.firstname, " ", donor.lastname) as name, donor.id as donorid, donor.membership_id, donor.profile, 
                             donor_appointment.id, appointmentslot.datetime as starttime, (appointmentslot.datetime + appointmentslot.duration) as endtime, 
                             appointmentslot.status, appointmentslot.message 
                       FROM (
                        (`appointmentslot` 
                        INNER JOIN donor_appointment ON donor_appointment.appointmentslot_id = appointmentslot.id) 
                        INNER JOIN donor ON donor.id = donor_appointment.donor_id ) 
                       WHERE appointmentslot.hospital_id = ? AND appointmentslot.datetime >= ? AND appointmentslot.datetime <= ? AND appointmentslot.status != ? AND donor_appointment.status != ?
                       ORDER BY starttime;';
        $result = $this->db->query($query_str, array($id, $from, $to, APPOINTMENT_VACANT, DONATION_DONATED));

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