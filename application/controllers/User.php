<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model("User_model", "user");
		//pr($_SESSION);
		if( ! $_SESSION['dtl'] ){
			redirect(URL.'auth/');
		}
	}

	public function index()	{
		
	}

	// function dashboard(){
	// 	$data['dt'] = '';
	// 	$this->layout('pages/dashboard', $data);
	// }	

	function invoices(){
		$rs = $this->user->list_invoices();
		$data['dt'] = $rs;
		$this->layout('pages/invoices', $data);
	}
	
	

	function receipts(){
		$data['dt'] = '';
		$this->layout('pages/receipts', $data);
	}
	function stock(){
		$data['dt'] = '';
		$this->layout('pages/stock', $data);
	}
	function layout($page, $data){
		$data['page']= $page;
		$this->load->view('layout', $data);
	}
}

