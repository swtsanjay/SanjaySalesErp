<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->load->model("User_model", "user");
        if (!$_SESSION['dtl']) {
            redirect(URL . 'auth/');
        }
	}

	
    function index(){
        $data['year'] = $this->user->dashboard_year();
        $data['dt'] = '';
		$this->layout('pages/dashboard', $data);
    }
    
    
	function layout($page, $data){
		$data['page']= $page;
		$this->load->view('layout', $data);
	}
}

