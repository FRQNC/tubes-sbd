<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_StudySociety extends CI_Model {
    
    public function addUser($data){
        $username = $data['username'];
        $user_login_email = $data['email'];
        $user_login_password = $data['password'];
        $this->db->query("INSERT INTO user_login VALUES ('','$username','$user_login_email','$user_login_password','user')");
        return $this->db->affected_rows();
    }

    public function getUserPassword($username){
        $query = $this->db->query("SELECT user_login_password FROM user_login WHERE username = '$username'");
        return $query->result();
    }


    public function getAllMitra()
    {
        $query = $this->db->query("SELECT * from tag");
        return $query->result();
    }
}