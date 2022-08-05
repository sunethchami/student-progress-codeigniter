<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentDetailsModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function setNewRecords($data) {
        return $this->db->insert('student_details_tb', $data);
    }
    
    public function getAllRecords() {
        $this->db->select('*');
        $query = $this->db->get('student_details_tb');
        return $query->result_array(); 
    }
    
    public function getSearchRecord($reg_no,$name) {
        $where = "(name LIKE '%".$name."%')";
        $this->db->select('*');
        $this->db->where('reg_no',$reg_no);
        $this->db->or_where($where);
        $query = $this->db->get('student_details_tb');
        return $query->result_array(); 
    }
    
    public function getRecord($id){
        $this->db->select('*');
        $this->db->where('id',$id);
        $query = $this->db->get('student_details_tb');
        return $query->row();
    }
    
    public function updateRecordData($id,$data){
        $this->db->where('id',$id);
        return $this->db->update('student_details_tb',$data);
    }
    
    public function deleteRecordData($id){
        $this->db->where('id', $id);
        return $query = $this->db->delete('student_details_tb');
        
    }
}

