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
        // pr($dtl);
        
        // // foreach($dtl['parties'] as $p)
        // //         echo $p['name'];
           
        // // die;
        $html = $this->load->view("pages/popups/invoice_form", $dtl, true);
        json_data(['html' => $html, 'products'=>$dtl['products']]);
    }

    function save_invoice(){
        $post = $this->input->post();
        $res = ['success' => false, 'errors' => [], 'msg' => 'error!'];
        if (!$post['party']) {
            $res['errors']['party'] = "Please select a party";
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
        // $post['total'] = $total_amt;
        // pr($post);



        // if ( !$res['errors'] ) {
        //     $d = filter_value($post, ['party','invoice_no', 'total_amt', 'cost']);
        //     $d['client_id'] = CLIENT_ID;
        //     $d['created_by'] = $_SESSION['dtl'][0]['id'];
        //     if (!$d['id']) {
        //         $d['created'] = date('Y-m-d H:i:s');
        //     }
        //     // if ($this->user->save_invoice($d)) {
        //     //     $res['success'] = true;
        //     //     $res['msg'] = "Party saved successfully";
        //     // }
        // } else {
        //     $res['msg'] = implode("\n", array_values($res['errors']));
        // }
        // die;

        // $res['msg'] = implode("\n", array_values($res['errors']));
        // json_data($res);
    }

	function layout($page, $data){
		$data['page']= $page;
		$this->load->view('layout', $data);
	}
}

