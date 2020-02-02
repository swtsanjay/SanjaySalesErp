<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoices extends MY_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model("User_model", "user");
		if( ! $_SESSION['dtl'] ){
			redirect(URL.'auth/');
		}
	}

	function load_invoices(){
        $rs = $this->user->list_invoices();
        $data['dt'] = $rs;
        $this->layout('pages/list_invoices', $data);
    }
    
    function invoice_dtl($id){
        $dtl = $this->user->invoice_dtl($id);
        $html = $this->load->view("pages/popups/invoice_form", $dtl, true);
        json_data(['html' => $html, 'products'=>$dtl['products'] ]);
    }

    function save_invoice(){
        $post = $this->input->post();
        $res = ['success' => false, 'errors' => [], 'msg' => 'error!'];
        if (!$post['party_id']) {
            $res['errors']['party_id'] = "Please select a party";
        }
        if (!$post['date']) {
            $res['errors']['date'] = "Please select a date";
        }
        $total_amt = 0; $cost = 0;
        foreach($post['qnty'] as $key => $i){
            if( $i < 1){
                $res['errors']['qnty'] = "Item quantity is zero or less";
            }else{
                $total_amt += $i*$post['rate'][$key];
                $cost += $post['cost'][$key];
            }
        }

        
        if ( !$res['errors'] ) {
            $d = filter_value($post, ['id', 'party_id','invoice_number', 'total_amt', 'total_disc', 'total_gst', 'grand_total', 'total_cost', 'notes']);
            $d['client_id'] = CLIENT_ID;
            $d['created_by'] = $_SESSION['dtl'][0]['id'];
            $inv_id = $d['id'];
            if (!$d['id']) {
                $d['created'] = date('Y-m-d H:i:s');
            }
            if ($invoice_id = $this->user->save_invoice($d) ) {
                $d=[];
                foreach($post['item_id'] as $key => $i){
                    $d[$key]['item_id'] = $i;
                    $d[$key]['cost'] = $post['cost'][$key];
                    $d[$key]['rate'] = $post['rate'][$key];
                    $d[$key]['qnty'] = $post['qnty'][$key];
                    $d[$key]['disc'] = $post['disc'][$key];
                    $d[$key][ 'gst'] = $post[ 'gst'][$key];
                    $d[$key]['final_amt'] = $post['final_amt'][$key];
                    $d[$key]['invoice_id'] = $invoice_id;
                }
                $this->user->save_invoice_item($d, $invoice_id);
                $res['success'] = true;
                $res['msg'] = "Invoice saved successfully";
                $res['d'] = $d;
            }
        } else {
            $res['msg'] = implode("\n", array_values($res['errors']));
        }
        $res['inv_id'] = $inv_id;
        json_data($res);
    }

    function delete_invoice($id) {
        $this->user->delete_invoice($id);
        json_data(['msg' => 'Item deleted successfully']);
    }

    function get_payment_info($id){
        $id = explode("id", $id);
        $dtl['data'] = $this->user->get_payment_info($id);
        $html = $this->load->view("pages/popups/record_payment_form", $dtl, true);
        json_data(['html' => $html, 'products'=>$dtl['products'] ]);
    }

    function save_payment(){
        $post = $this->input->post();
        $p_info['client_id'] = $post['client_id'];
        $p_info['party_id'] = $post['party_id'];
        $p_info['amt'] = $post['totalPayingAMT'];
        $p_info['created'] = date('Y-m-d H:i:s');
        $d = [];
        foreach($post['id'] as $key=> $i){
            $d[$key]['id'] = $i;
            $d[$key]['amt'] = $post['payingAMT'][$key];
        }

        // pr($p_info);
        // pr($post);
        $res = ['success' => false, 'errors' => [], 'msg' => 'error!'];
        if($this->user->save_payment($p_info, $d)){
            $res['success'] = true;
            $res['msg'] = "Payment recorded successfully";
        }
        json_data($res);
    }

	function layout($page, $data){
		$data['page']= $page;
		$this->load->view('layout', $data);
	}
}

