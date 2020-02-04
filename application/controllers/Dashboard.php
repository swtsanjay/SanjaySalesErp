<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	function __construct(){
		parent::__construct();
        $this->load->model("User_model", "user");
        if (!$_SESSION['dtl']) {
            redirect(URL . 'auth/');
        }
	}

	
    function index(){
        $data['year'] = $this->user->dashboard_year();
        $data['user'] = $this->user->dashboard_user();
        $data['party'] = $this->user->dashboard_party();
        
		$this->layout('pages/dashboard', $data);
    }
    
    function sales_report(){
        $data['sales_report'] = $this->user->sales_report()
    }

	function layout($page, $data){
		$data['page']= $page;
		$this->load->view('layout', $data);
	}
}

