<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLoginCon extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('User', '', TRUE);
        $this->load->database();
        $this->load->helper(array('url'));
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('security'); 
        $this->load->library('bcrypt');
        
    }

    function index() {
        //This method will have the credentials validation
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 
            'trim|required|xss_clean');
        
        $password =trim($this->input->post('password'));
        if ($password == "") {
            $this->form_validation->set_rules('password', 'Password',
                    'trim|required');
        } else {
            $this->form_validation->set_rules('password', 'Password',
                    'trim|required|xss_clean|callback_check_database');
        }
        
        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $this->load->view('login_page');
        } else {
            //Go to private area
            redirect('HomeCon', 'refresh');
        }
    }

    function check_database($password) {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');

        //query the database
        $result = $this->User->getUser($username);
        //var_dump($result);exit();
        //$password = "test@123";
        //echo $hash = $this->bcrypt->hash_password($password);exit();
        
        if ($result) {

            if ($this->bcrypt->check_password($password, $result->password)) {
                $sess_array = array();
                $sess_array = array(
                    'id' => $result->id,
                    'username' => $result->username
                );
                $this->session->set_userdata('logged_in', $sess_array);
                return TRUE;
            } else {
                $this->form_validation->set_message('check_database', 'Invalid username or password');
                return false;
            }
        } else {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }

}