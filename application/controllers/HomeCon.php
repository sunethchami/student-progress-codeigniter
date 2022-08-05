<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HomeCon extends CI_Controller {

 function __construct() {
        parent::__construct();

        $this->load->helper(array('url'));
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['message'] = $this->session->flashdata('message');
            redirect('StudentDetailsCon');
        } else {
            //If no session, redirect to login page
            redirect('LoginCon', 'refresh');
        }
    }
    
    public function logOut() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('HomeCon', 'refresh');
    }

}