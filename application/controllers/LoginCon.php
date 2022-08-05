<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LoginCon extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User');
        $this->load->helper(array('url'));
        $this->load->library('session');
        $this->load->helper('array');
        $this->load->helper(array('form'));
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->library('bcrypt');
    }

    /**
     * author : Suneth Senanayake. 
     * index()
     * Show login page. 
     */
    
    public function index() {
        $this->load->view('login_page');
    }
    
    /**
     * author : Suneth Senanayake. 
     * showSignUpPage()
     * Show sign up page. 
     */
    
    public function showSignUpPage() {
        $data['message'] = $this->session->flashdata('message');
        $this->load->view('sign_up_page', $data);
    }
    
    /**
     * author : Suneth Senanayake. 
     * saveSignUpData()
     * Save sign up data. 
     */
    
    public function saveSignUpData() {

        $this->form_validation->set_rules('username', 'Username',
            'trim|required|is_unique[users_tb.username]',
            array('is_unique' => 'Username already exist. Enter different '
                . 'username.'));

        if ($this->form_validation->run() == FALSE){
            $this->load->view('sign_up_page');
        }else{
            
            $password = $this->input->post('password');
            $hash = $this->bcrypt->hash_password($password);
            
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $hash
            );
            
            $result = $this->User->setSignUpData($data);
            
            if ($result == true) {
                $this->session->set_flashdata('message', '1');
                redirect('LoginCon');
            } else {
                $this->session->set_flashdata('message', '2');
                redirect('LoginCon/showSignUpPage');
            }
        }
    }

    /**
     * author : Suneth Senanayake. 
     * checkUsername()
     * Check whether entered username exist of not. 
     */ 
    public function checkUsername() {
        $target = isset($_POST['target']) ? $_POST['target'] : 
            'default_target_value';
        
        $result = $this->User->checkUsername($target);
        
        if ($result == false) {
            $output = true;
            echo json_encode($output);
        } else {
            $output = false;
            echo json_encode($output);
        }
    }
    
}