<?php 

class user_model extends CI_Model{
    //check if a user (admin, donor, hospital) has already registered
    public function userExists($email){
        $query_str = 'SELECT email FROM admin WHERE email = ?
                      UNION
                      SELECT email FROM donor WHERE email = ?
                      UNION 
                      SELECT email FROM hospital WHERE email = ?';

        $result = $this->db->query($query_str, array($email, $email, $email));

        if($result->num_rows() != 0) return true;
        return false;
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

    public function registerHospital($data){
        $time = date('Y-m-d');
        $query_str = 'INSERT INTO `hospital`(`id`, `regnumber`, `name`, `email`, `zipcode`,
                                          `street_address`, `city`, `district`, `province`, 
                                          `contact`, `password`, `create_time`, `status`) 
                      VALUES (?, ?, ?, ?, ?, 
                              ?, ?, ?, ?, 
                              ?, ?, ?, ?)';

        $this->db->query($query_str, array(NULL, $data['regnum'], $data['name'], $data['email'], $data['zipcode'],
                                           $data['street'], $data['city'], $data['district'], $data['province'], 
                                           $data['contact'], $data['password'], $time, 'pending'));
    }

    //authenticate the user to login
    public function authenticate($data){
        $query_str = "SELECT id, name, 'admin' as role FROM admin WHERE email = ? AND password = ?
                      UNION SELECT id, firstname as name, 'donor' as role FROM donor WHERE email = ? AND password = ?
                      UNION SELECT id, name, 'hospital' as role FROM hospital WHERE email = ? AND password = ?";
        
        $result = $this->db->query($query_str, array($data['email'], $data['password'], $data['email'], $data['password'], $data['email'], $data['password']));
        return $result->row();
    }
}