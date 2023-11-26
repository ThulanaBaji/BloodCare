<?php 

class user_model extends CI_Model{
    //check if a user (admin, donor) has already registered
    public function nonHospitalExists($email){
        $query_str = 'SELECT email FROM admin WHERE email = ?
                      UNION
                      SELECT email FROM donor WHERE email = ?';

        $result = $this->db->query($query_str, array($email, $email));

        if($result->num_rows() != 0) return true;
        return false;
    }

    /* check if a hospital already exists
     *
     * -3: not verified, verification link expired
     * -2: not verified, verification link persists
     * -1: not accepted
     *  0: hospital not exist
     *  1: hospital exist
     */
    public function getHospitalState($email){
        $query_str = 'SELECT `id`, `status`, `expire` FROM `hospital` WHERE `email` = ?';

        $result = $this->db->query($query_str, $email);
        $query_row = $result->row();

        if($result->num_rows() != 0){
            $status = $query_row->status;
            $expire = $query_row->expire;

            if($status == 'pending')
                if($expire <= time())
                    return -3;
                else
                    return -2;
            elseif($status == 'verified')
                return -1;
            elseif($status == 'accepted')
                return 1;
        }
        return 0;
    }
    
    public function registerDonor($data){
        $time = date('Y-m-d');
        $query_str = 'INSERT INTO `donor`(`id`, `firstname`, `lastname`, `dob`, `email`, 
                                          `street_address`, `city`, `district`, `province`, 
                                          `contact`, `password`, `create_time`, `status`) 
                      VALUES (?, ?, ?, ?, ?, 
                              ?, ?, ?, ?, 
                              ?, ?, ?, ?)';

        $this->db->query($query_str, array(NULL, $data['fname'], $data['lname'], $data['bod'], $data['email'],
                                           $data['street'], $data['city'], $data['district'], $data['province'], 
                                           $data['contact'], $data['password'], $time, 'registered'));
    }

    public function registerHospital($data, $key){
        $date = date('Y-m-d');
        $expire_time = time() + 2*24*60*60;

        $query_str = 'INSERT INTO `hospital`(`id`, `regnumber`, `name`, `email`, `zipcode`,
                                          `street_address`, `city`, `district`, `province`, 
                                          `contact`, `password`, `create_time`, `verification`, `expire`, `status`) 
                      VALUES (?, ?, ?, ?, ?, 
                              ?, ?, ?, ?, 
                              ?, ?, ?, ?, ?, ?)';

        $this->db->query($query_str, array(NULL, $data['regnum'], $data['name'], $data['email'], $data['zipcode'],
                                           $data['street'], $data['city'], $data['district'], $data['province'], 
                                           $data['contact'], $data['password'], $date, $key, $expire_time, 'pending'));
    }

    /*
    * 0: invalid email or verification code
    * 1: verified succesfully
    *
    * ATTENTION: this should be executed after cross-checking with getHospitalState();
    */
    public function verifyHospital($email, $key){
        $time = time();

        $query_str = 'SELECT `id` FROM `hospital` WHERE `email` = ? AND `verification` = ?';
        $record_exist = $this->db->query($query_str, array($email, $key));

        if($record_exist->num_rows() == 0)
            return 0;
        
        $id = $record_exist->row()->id;
        
        $query_str = 'UPDATE `hospital` SET `expire` = ?, `status` = ?  WHERE `id` = ?';
        $this->db->query($query_str, array(0, 'verified', $id));

        return 1;
    }

    /**
     * issuing a new verification key
     */
    public function updateVerificationKey($email, $key){
        $expire_time = time() + 172800;

        $query_str = 'UPDATE `hospital` SET `expire` = ?, `verification` = ?  WHERE `email` = ?';
        $this->db->query($query_str, array($expire_time, $key, $email));
    }

    /* authenticate the user to login
     *  switch($result->code)
     * -3: [role=hospital] not verified, verification link expired
     * -2: [role=hospital] not verified, verification link persists
     * -1: [role=hospital] not accepted
     *  0: user not exist
     *  1: user exist, returns array(...)
    */
    public function authenticate($data){
        $query_str = "SELECT id, name, 'admin' as role FROM admin WHERE email = ? AND password = ?
                      UNION SELECT id, CONCAT(firstname , ' ', lastname) as name, 'donor' as role FROM donor WHERE email = ? AND password = ?
                      UNION SELECT id, name, 'hospital' as role FROM hospital WHERE email = ? AND password = ?";
        
        $result = $this->db->query($query_str, array($data['email'], $data['password'], $data['email'], $data['password'], $data['email'], $data['password']));
        $query_row = $result->row();

        if($result->num_rows() != 0){
            if($query_row->role == 'hospital'){
                $resultHos = $this->getHospitalState($data['email']); //not return 0
                $query_row->code = $resultHos;

                if($resultHos == 1){
                    $query_row->accepted = true;
                    return $query_row;
                }
                elseif($resultHos == -1){
                    $query_row->accepted = false;
                    return $query_row;
                }

                return $query_row;
            }

            $query_row->code = 1;
            return $query_row;
        }

        $query_row->code = 0;
        return $query_row;
    }
}