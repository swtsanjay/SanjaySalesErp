<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	function __construct(){
		parent::__construct();
        $this->load->model("User_model", "user");
        if (!$_SESSION['dtl']) {
            redirect(URL . 'auth/');
        }
        if($_SESSION['dtl'][0]['id'] != $_SESSION['dtl'][0]['client_id']){
            redirect(URL . 'auth/');
        }
	}

	
    function index(){
        $data['year'] = $this->user->dashboard_year();
        $data['user'] = $this->user->dashboard_user();
        $data['party'] = $this->user->dashboard_party();
        $data['this_month'] = $this->user->this_month();
		$this->layout('pages/dashboard', $data);
    }
    
    function sales_report($type){
        if($type ==  'profit'){
            
            $rs_purchase = $this->user->sales_report('purchase');
            $rs_sale = $this->user->sales_report('sale');
            // pr($rs_purchase);
            // pr($rs_sale);
            foreach($rs_purchase as $key => $i){
                $rs_sale[$key]['sales_data'] -= $rs_purchase[$key]['sales_data'];
                // echo($rs_sale[$key]['sales_data']);
            }
            $data['sales_report'] = $rs_sale;
        }
        else{
            $data['sales_report'] = $this->user->sales_report($type);
        }
        json_data(['products'=>$data['sales_report'] ]);

    }

	function layout($page, $data){
		$data['page']= $page;
		$this->load->view('layout', $data);
	}
}

