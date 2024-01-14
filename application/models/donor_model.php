<?php

//processes/provides requests/data from/for the donor actions

class donor_model extends CI_Model {

    //name, profile, email, contact
    public function getInfo($id){
        $query_str = 'SELECT (SELECT COUNT(id) FROM donor_donation WHERE donor_id = ?) as dcount, (SELECT COUNT(id) FROM notification_donor WHERE donor_id = ? AND status = ?) as ncount, CONCAT(`firstname` , " ", `lastname`) as name, `profile`, `email` FROM `donor` WHERE `id` = ?';

        $result = $this->db->query($query_str, array($id, $id, MSG_SENT, $id));
        return $result->row();
    }

    /**
     * --------------------------------------------- Donations
     */

    public function getDonations($id){
        $str = 'SELECT donor_donation.*, CONCAT(hospital.name, ", ", hospital.city) as hospital_name, bloodcamp.name FROM donor_donation
                INNER JOIN bloodcamp ON bloodcamp.id = donor_donation.bloodcamp_id
                INNER JOIN hospital ON hospital.id = donor_donation.hospital_id 
                WHERE donor_donation.donor_id = ?
                ORDER BY donor_donation.datetime';
        return $this->db->query($str, $id)->result_array();
    }

    public function getDonationsCount($id){
        $str = 'SELECT donor_donation.*, CONCAT(hospital.name, ", ", hospital.city) as hospital_name, bloodcamp.name FROM donor_donation
                INNER JOIN bloodcamp ON bloodcamp.id = donor_donation.bloodcamp_id
                INNER JOIN hospital ON hospital.id = donor_donation.hospital_id 
                WHERE donor_donation.donor_id = ? AND donor_donation.status = ?
                ORDER BY donor_donation.datetime';
        return count($this->db->query($str, array($id, DONATION_PROCESSED))->result_array());
    }

    /**
     * ---------------------------------------------- Notifications
     */

    public function getNotifications($id){
        $str = 'SELECT notification.*, notification_donor.id as nid, status FROM notification_donor
                INNER JOIN notification on notification.id = notification_donor.notification_id
                WHERE status != "'.MSG_DEL.'" AND notification_donor.donor_id = ' . $id.' 
                ORDER BY notification.time DESC';
        return $this->db->query($str)->result_array();
    }

    public function deleteNotification($id, $notification_id){
        $str = 'UPDATE notification_donor SET status = ? WHERE donor_id = ? AND notification_id = ?';
        $this->db->query($str, array(MSG_DEL, $id, $notification_id));
    }

    public function seenNotification($id, $notification_id){
        $str = 'UPDATE notification_donor SET status = ? WHERE donor_id = ? AND notification_id = ?';
        $this->db->query($str, array(MSG_SEEN, $id, $notification_id));
    }


    /***
     * ---------------------------------------------- Edit profile section
     */

    public function getEditInfo($id){
        $query_str = 'SELECT (SELECT COUNT(id) FROM donor_donation WHERE donor_id = ?) as dcount, (SELECT COUNT(id) FROM notification_donor WHERE donor_id = ? AND status = ?) as ncount, CONCAT(`firstname` , " ", `lastname`) as name, `firstname`, `lastname`, `profile`, `contact`, `city`, `district`, `province`, `email` FROM `donor` WHERE `id` = ?';

        $result = $this->db->query($query_str, array($id, $id, MSG_SENT, $id));
        return $result->row();
    }

    public function checkOldPassword($pass, $id){
        $p = md5($pass);

        $str = 'SELECT id FROM donor WHERE id=? AND password=?';
        return $this->db->query($str, array($id, $p))->num_rows();
    }

    public function updatePassword($oldpass, $newpass, $id){
        if($this->checkOldPassword($oldpass, $id) > 0){
            $p = md5($newpass);
            $str = 'UPDATE donor SET password = ? WHERE id = ?';
            $this->db->query($str, array($p, $id));
            return 1;   
        } else
            return -1;
    }

    public function updateDetails($strfrac, $id){
        $str = 'UPDATE donor SET ' . $strfrac . ' WHERE id='.$id;
        $this->db->query($str);
    }

    /***
     * ---------------------------------------------- Camp section
     */

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

    public function getJoinedCamps($id){
        $str = 'SELECT bloodcamp.*, hospital.name as "hname", hospital.city as "hcity",
                       (SELECT COUNT(bloodcamp_donor.id) 
                       FROM bloodcamp_donor 
                       WHERE bloodcamp_donor.bloodcamp_id = bloodcamp.id AND bloodcamp_donor.status="'.CAMP_JOINED.'") as "cur_seats" 
                FROM `bloodcamp_donor` 
                INNER JOIN bloodcamp on bloodcamp.id = bloodcamp_donor.bloodcamp_id
                INNER JOIN hospital on bloodcamp.hospital_id = hospital.id
                WHERE bloodcamp_donor.donor_id = '.$id.' AND bloodcamp_donor.status = "'.CAMP_JOINED.'"';
                
        $result = $this->db->query($str);

        return $result->result_array();
    }

    public function getJoinedCampCount($id){
        $str = 'SELECT COUNT(id) as count FROM bloodcamp_donor 
                WHERE donor_id = ' . $id . ' AND status = "' . CAMP_JOINED . '"';
        $result = $this->db->query($str);
        return $result->row();
    }

    public function joinCamp($id, $campid){
        $str = 'SELECT * FROM bloodcamp WHERE id = ? AND status = ?';
        $num = $this->db->query($str, array($campid, CAMP_VACANT))->num_rows();

        if($num > 0) {
            $str = 'SELECT id FROM bloodcamp_donor WHERE donor_id = ? AND bloodcamp_id = ?';
            $recs = $this->db->query($str, array($id, $campid));

            if($recs->num_rows() > 0){
                $recid = $recs->result_array()[0]['id'];
                $str = 'UPDATE bloodcamp_donor SET status = ? WHERE id = ?';
                $this->db->query($str, array(CAMP_JOINED, $recid));
            }else{
                $str = 'INSERT INTO `bloodcamp_donor`(`bloodcamp_id`, `donor_id`, `id`, `status`) VALUES (?, ?, ?, ?)';
                $this->db->query($str, array($campid, $id, NULL, CAMP_JOINED));
            }

            return 1;
        }else{
            return -1;
        }
    }

    public function quitCamp($id, $campid){
        $str = 'SELECT * FROM bloodcamp WHERE id = ? AND status != ?';
        $num = $this->db->query($str, array($campid, CAMP_CANCELLED))->num_rows();

        if($num > 0) {
            $str = 'SELECT id FROM bloodcamp_donor WHERE donor_id = ? AND bloodcamp_id = ? AND status = ?';
            $recs = $this->db->query($str, array($id, $campid, CAMP_JOINED));

            if($recs->num_rows() > 0){
                $recid = $recs->result_array()[0]['id'];
                $str = 'UPDATE bloodcamp_donor SET status = ? WHERE id = ?';
                $this->db->query($str, array(CAMP_QUIT, $recid));
            }else{
                return -1;
            }

            return 1;
        }else{
            return -1;
        }
    }

    /***
     * ---------------------------------------------- Appointment section
     */

    public function getAppointments(){
        $str = 'SELECT hospital.email, hospital.name, hospital.profile, hospital.zipcode, hospital.city, hospital.district, hospital.province, `appointmentslot`.`id`, appointmentslot.datetime, appointmentslot.status,     appointmentslot.duration, appointmentslot.message FROM (`appointmentslot` 
        INNER JOIN hospital ON appointmentslot.hospital_id = hospital.id)
        WHERE appointmentslot.status IN ? AND appointmentslot.datetime > ?
        ORDER BY hospital.email, appointmentslot.datetime';

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