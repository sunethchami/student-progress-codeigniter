<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentDetailsCon extends CI_Controller {

    
    public function __construct() {
        parent::__construct();
        $this->load->model('StudentDetailsModel');
        $this->load->helper(array('url'));
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();

    }
    
    /**
     * author : Suneth Senanayake. 
     * index()
     * Show login page. 
     */
    
    public function index(){
        $this->data['result'] = $this->getStat(); 
	$this->load->view('dashboard_page', $this->data);
    }
    
    /**
     * author : Suneth Senanayake. 
     * getStat()
     * Return statistics. 
     */
    
    private function getStat() {
        $allRecords = $this->StudentDetailsModel->getAllRecords();
        
        $totalNumberOfStudents = count($allRecords);
        
        $maxCombindMaths = 0;
        $maxPhysics = 0;
        $maxChemistry = 0;
        
        $sumOfCombindMaths = 0;
        $sumOfPhysics = 0;
        $sumOfChemistry = 0;
        
        $highestMarkforAllSubjects = 0;
        
        foreach ($allRecords as $record) {
            if($maxCombindMaths < $record['combined_maths']){
                $maxCombindMaths = $record['combined_maths'];
            }
            
            if($maxPhysics < $record['physics']){
                $maxPhysics = $record['physics'];
            }
            
            if($maxChemistry < $record['chemistry']){
                $maxChemistry = $record['chemistry'];
            }
            
            $totalMark = $record['combined_maths'] + $record['physics']
                +  $record['chemistry'];  
             
            
            if($highestMarkforAllSubjects < $totalMark ){
                $highestMarkforAllSubjects = $totalMark;  
            }
            
            $sumOfCombindMaths = $sumOfCombindMaths + $record['combined_maths'];
            $sumOfPhysics = $sumOfPhysics + $record['physics'];
            $sumOfChemistry = $sumOfChemistry + $record['chemistry'];
        }
        
        if($totalNumberOfStudents != 0){
            $avgMarkForCombindMaths = 
                $sumOfCombindMaths / $totalNumberOfStudents;
            $avgMarkForPysics = $sumOfPhysics / $totalNumberOfStudents;
            $avgMarkForChemistry = $sumOfChemistry / $totalNumberOfStudents;
        }else{
            $avgMarkForCombindMaths = 0;
            $avgMarkForPysics = 0;
            $avgMarkForChemistry = 0;
        }
        
        $avgMarkOfFirstPlace = $highestMarkforAllSubjects / 3;
        
        $this->data = array(
            'total_student' => $totalNumberOfStudents,
            'highest_mark_maths' => $maxCombindMaths,
            'highest_mark_physics' => $maxPhysics,
            'highest_mark_chemistry' => $maxChemistry,
            'avg_maths' => round($avgMarkForCombindMaths,2),
            'avg_physics' => round($avgMarkForPysics,2),
            'avg_chemistry' => round($avgMarkForChemistry,2),
            'avg_mark_first_place' => round($avgMarkOfFirstPlace,2)
        );
        
        return $this->data;
    }
    
    /**
     * author : Suneth Senanayake. 
     * showAddNewRecordsPage()
     * Display add_new_records_page view. 
     */
    
    public function showAddNewRecordsPage(){  
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('add_new_records_page',$this->data);
    }
    
    /**
     * author : Suneth Senanayake. 
     * setNewRecords()
     * Save new record to database. 
     */
    
    public function setNewRecords(){  
        
        $regNo = $this->input->post('reg_no');
        $name = $this->input->post('name');
        $combinedMaths = $this->input->post('combined_maths');
        $physics = $this->input->post('physics');
        $chemistry = $this->input->post('chemistry');
        
        $this->form_validation->set_rules('reg_no', 'Reg No',
            'trim|integer|is_unique[student_details_tb.reg_no]',
                array('is_unique' => 'This %s already exist.'));
        $this->form_validation->set_rules('name', 'Name', 
            'trim|required|max_length[50]');
        $this->form_validation->set_rules('combined_maths', 'Combined Maths', 
            'trim|required|integer|greater_than_equal_to[0]|'
                . 'less_than_equal_to[100]');
        $this->form_validation->set_rules('physics', 'Pysics', 
            'trim|required|integer|greater_than_equal_to[0]|'
                . 'less_than_equal_to[100]');
        $this->form_validation->set_rules('chemistry', 'Chemistry', 
            'trim|required|integer|greater_than_equal_to[0]|'
                . 'less_than_equal_to[100]');
        
        if ($this->form_validation->run() == FALSE){
            $this->load->view('add_new_records_page');
        }else{
            if($regNo == ''){
               $regNo = null; 
            }
            $data = array(
               'reg_no' => $regNo,
               'name' => $name,
               'combined_maths' => $combinedMaths,
               'physics' => $physics,
               'chemistry' => $chemistry
            );
        
            $result = $this->StudentDetailsModel->setNewRecords($data);
            
            $this->session->set_flashdata('message', '1');
            redirect('StudentDetailsCon/showAddNewRecordsPage');
        }            
    }
    
    /**
     * author : Suneth Senanayake. 
     * showAllRecordsPage()
     * Display all records in view. 
     */
    
    public function showAllRecordsPage(){
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['result'] = $this->StudentDetailsModel->getAllRecords();
        $this->data['page'] = "all";
        $this->load->view('view_records_page', $this->data);
    }
    
    /**
     * author : Suneth Senanayake. 
     * setNewRecords()
     * Display search_record_page in view. 
     */
    
    public function showSearchPage(){
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('search_record_page', $this->data);
    }
    
    /**
     * author : Suneth Senanayake. 
     * searchRecord()
     * Query search inputs and display results. 
     */
    
    public function searchRecord(){
        $reg_no = trim($this->input->post('reg_no'));
        $name = trim($this->input->post('name'));

        if ($name == null) {
            $name = 1;
        }

        $this->data['result'] = $this->StudentDetailsModel
                ->getSearchRecord($reg_no, $name);
        
        if(empty($this->data['result'])){
            $this->data['inputs'] = array(
                'reg_no' => $this->input->post('reg_no'),
                'name' => $this->input->post('name')
            ); 
            $this->session->set_flashdata('message', '3');
            $this->data['message'] = $this->session->flashdata('message');
            $this->load->view('search_record_page', $this->data);
        }else{
            $this->data['page'] = "search";
            $this->load->view('view_records_page', $this->data);
        }
    }
    
     /**
     * author : Suneth Senanayake. 
     * editReacord()
     * show edit page for selected id.
     */
    
    public function editRecord() {
        $id = $this->uri->segment(3);
        $page = $this->uri->segment(4);
        $this->data['page'] = $page;
        $this->data['result'] = $this->StudentDetailsModel->getRecord($id);
        $this->load->view('edit_record_page', $this->data);
    }
    
    /**
     * author : Suneth Senanayake. 
     * updateReacord()
     * Update record of selected id.
     */
    
    public function updateRecord() {
        
        $id = $this->input->post('id');
        $regNo = $this->input->post('reg_no');
        $name = $this->input->post('name');
        $combinedMaths = $this->input->post('combined_maths');
        $physics = $this->input->post('physics');
        $chemistry = $this->input->post('chemistry');
        $page = $this->input->post('page');
        $this->data['indexId'] = $id;
        
        $record = $this->StudentDetailsModel->getRecord($id);
        
        if($regNo == $record->reg_no ){
          $this->form_validation->set_rules('reg_no', 'Reg No','trim|integer');  
        }else{
           $this->form_validation->set_rules('reg_no', 'Reg No',
            'trim|integer|is_unique[student_details_tb.reg_no]',
                array('is_unique' => 'This %s already exist.')); 
        }
        
        $this->form_validation->set_rules('name', 'Name', 
            'trim|required|max_length[50]');
        $this->form_validation->set_rules('combined_maths', 'Combined Maths', 
            'trim|required|integer|greater_than_equal_to[0]|'
                . 'less_than_equal_to[100]');
        $this->form_validation->set_rules('physics', 'Pysics', 
            'trim|required|integer|greater_than_equal_to[0]|'
                . 'less_than_equal_to[100]');
        $this->form_validation->set_rules('chemistry', 'Chemistry', 
            'trim|required|integer|greater_than_equal_to[0]|'
                . 'less_than_equal_to[100]');
        
        if ($this->form_validation->run() == FALSE){
            $this->data['page'] = $page;
            $this->load->view('edit_record_page', $this->data );
        }else{
            if($regNo == ''){
               $regNo = null; 
            }
            $data = array(
               'reg_no' => $regNo,
               'name' => $name,
               'combined_maths' => $combinedMaths,
               'physics' => $physics,
               'chemistry' => $chemistry
            );
            
            $result = $this->StudentDetailsModel->updateRecordData($id,$data);
            
            if($page == "all"){
                $this->session->set_flashdata('message', '1');
                redirect('StudentDetailsCon/showAllRecordsPage');  
            }else{
                $this->session->set_flashdata('message', '1');
                redirect('StudentDetailsCon/showSearchPage');  
            }
            
        } 
    }
    
    /**
     * author : Suneth Senanayake. 
     * deleteRacord()
     * Delete record from db for selected id.
     */
    
    public function deleteRecord() {
        $id = $this->uri->segment(3);
        $page = $this->uri->segment(4);
        $result = $this->StudentDetailsModel->deleteRecordData($id);
        if ($result == 1) {
            if($page == "all"){
                $this->session->set_flashdata('message', '2'); 
                redirect('StudentDetailsCon/showAllRecordsPage'); 
            }else{
                $this->session->set_flashdata('message', '2'); 
                redirect('StudentDetailsCon/showSearchPage');
            }            
        } else {
            echo "Database error!";
        }
    }  
    
    /**
     * author : Suneth Senanayake. 
     * moreDetails()
     * View more details for selected id.
     */
    
    public function moreDetails() {
        $id = $this->uri->segment(3);
        $page = $this->uri->segment(4);
        $record = $this->StudentDetailsModel->getRecord($id);
        $combinedMaths = $record->combined_maths;
        $physics = $record->physics;
        $chemistry = $record->chemistry; 
        
        $avgMarkOfStudent = ($combinedMaths + $physics + $chemistry) / 3;
        
        $statArray = $this->getStat();
        $avgMarkOfFirstPlace = $statArray['avg_mark_first_place'];
        
        $totalStudents = $statArray['total_student'];
        
        $this->data["result"] = array(
            "reg_no" => $record->reg_no,
            "name" => $record->name,
            "combined_maths" => $combinedMaths,
            "physics" => $physics,
            "chemistry" => $chemistry,
            "avg_mark_student" => round($avgMarkOfStudent,2),
            "avg_mark_first_place" => $avgMarkOfFirstPlace,
            "total_students" => $totalStudents            
        );
        
        $this->data["page"] = $page;
        
        $this->load->view('more_details_page', $this->data);
        
    }
    
}
