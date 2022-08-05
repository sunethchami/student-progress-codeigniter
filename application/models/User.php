<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class User extends CI_Model {

    public function getuser($username) {
        $this->db->select('id, username, password');
        $this->db->where('username', $username);
        $query = $this->db->get('users_tb');
        return $query->row();         
    }

    public function checkUsername($username){
        $this->db->select('username');
        $this->db->from('users_tb');
        $this->db->where('username',$username);
        $query = $this->db->get();
        return $query->result(); 
    }
    
    public function setSignUpData($data) {       
        return $result=$this->db->insert('users_tb',$data);
    }
}
