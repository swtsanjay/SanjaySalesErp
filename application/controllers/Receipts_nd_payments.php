<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Receipts_nd_payments extends MY_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model("User_model", "user");
        if (!$_SESSION['dtl']) {
            redirect(URL . 'auth/');
        }
    }

    function index(){
        $rs = $this->user->list_receipts();
        $data['dt'] = $rs;
        $this->layout('pages/receipts_nd_payments', $data);
    }

    function delete_receipt_payment($id){
        $msg = "";
        if($this->user->delete_receipt_payment($id)){
            $msg ="Deleted Succesfully";
        }
        else{
            $msg= "Error in deleting";
        }
        json_data(['msg' => $msg]);
    }

    function layout($page, $data){
        $data['page'] = $page;
        $this->load->view('layout', $data);
    }
}
