<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function validate_user($name, $password){
        $sql = "SELECT * FROM users WHERE user_name = '" . $name . "' AND password = '" .$password. "' " ;
        $rs=$this->db->query( $sql )->result_array();
        return $rs;
    }

    function list_invoices(){
        $get = $this->input->get();
        $cns = '';
        if($get){
            $cns = " AND  parties.name LIKE  '%{$get['key']}%'";
            $rs['key'] = $get['key'];
        }
        $sql = "select 
                parties.name,   invoices.*  
                from invoices join parties 
                on invoices.party_id = parties.id   
                WHERE created_by = '" .$_SESSION['dtl'][0]['id']. "'". $cns ;
        $rs=$this->db->query( $sql )->result_array();
        return $rs;
    }

    function list_parties(){
        $qs=$this->input->get();
        $cond="client_id = '" .CLIENT_ID. "'";
        if($qs['type']){
            $cond.=" AND type='{$qs['type']}'";
        }
        if($qs['key']){
            $cond.=" AND name LIKE '%{$qs['key']}%'";
        }

        $sql = "SELECT * FROM parties WHERE $cond";
        $rs=$this->db->query( $sql )->result_array();
        return $rs;
    }

    function list_items(){
        $sql = "SELECT * FROM items WHERE client_id = '" .CLIENT_ID. "'/*  AND 	status = 'avl' */" ;
        $rs=$this->db->query( $sql )->result_array();
        return $rs;
    }

    function item_dtl($id){
        $rs=$this->db->get_where("items", ['id'=>$id])->row_array();
        return $rs?$rs:[];
    }

    function item_delete($id){
        $sql = "DELETE FROM items WHERE client_id = '" .CLIENT_ID. "' AND 	id = '".$id."'";
        $this->db->query( $sql );
        $success=$this->db->affected_rows();
        return $success;
    }

    function save_item($data){
        if($data['id']){
            $this->db->where("id", $data['id'])->update("items", $data);
            $success=$this->db->affected_rows();
        }else{
            $this->db->insert("items", $data);
            $success=$this->db->insert_id();
        }

        return $success;
    }

    function search_items($key, $type){
        $sql = "SELECT * FROM items WHERE name LIKE '%".$key."%' AND type LIKE '".$type."%' AND client_id = '".CLIENT_ID."'";
        $rs = $this->db->query( $sql )->result_array();
        return $rs;
    }

    function party_dtl($id){
        $rs = $this->db->get_where('parties', ['id'=>$id])->row_array();
        return $rs ? $rs:[];
    }

    function save_party($data){
        if($data['id']){
            $this->db->where('id', $data['id'])->update('parties', $data);
            $success = $this->db->affected_rows();
        }else{
            $this->db->insert('parties', $data);
            $success = $this->db->insert_id();
        }
        return $success;
    }

    function delete_party($id){
        $sql = "DELETE FROM parties WHERE client_id = '" .CLIENT_ID. "' AND 	id = '".$id."'";
        $this->db->query( $sql );
        $success=$this->db->affected_rows();
        return $success;
    }

    function get_invoivce_items($id){
        $sql = "select 
                item.name, item.item_code code, item.uom, item.id item_id,
                invoice.*
                from invoice_items invoice join items item on invoice.item_id = item.id
                where invoice.invoice_id = $id";
        $rs = $this->db->get_where('invoices', ['id' => $id] )->row_array();
        $rs['invoice_items'] = $this->db->query( $sql )->result_array();
        $rs['sql'] = $sql;

        $rs['created']=date("Y-m-d", strtotime($rs['created']));

        return $rs;
    }

    function invoice_dtl($id){
        $rs = $this->db->get_where('invoices', ['id'=>$id])->row_array();
        $parties = $this->db->get_where('parties', ['client_id'=>CLIENT_ID] )->result_array();
        $products = $this->db->get_where('items', ['client_id'=>CLIENT_ID] )->result_array();
        $inv_no = $this->db->select_max('invoice_number')->from('invoices')->get()->row_array();
        $inv_no = str_replace('INVOICE', '', $inv_no);
        $data['inv_no'] = 'INVOICE'.strval( (int) $inv_no['invoice_number'] + 1 );
        $data['e_i'] = $rs;
        $data['parties'] = $parties;
        $data['products'] = $products;
        $data['invoice_dtl'] = $this->get_invoivce_items($id);
        return $data;
    }

    

    function save_invoice($data){
        if($data['id']){
            $this->db->where('id', $data['id'])->update('invoices', $data);
            $success = $data['id'];
        }else{
            $this->db->insert('invoices', $data);
            $success = $this->db->insert_id();
        }
        return $success;
    }

    

    function save_invoice_item($data, $inv_id){
        if($inv_id){
            $sql = "DELETE FROM invoice_items WHERE invoice_id = '" .$inv_id. "'";
            $this->db->query( $sql );
        }
        foreach($data as $i){
            $this->db->insert('invoice_items', $i);
        }
    }

    function delete_invoice($id){
        $sql = "DELETE FROM invoice_items WHERE invoice_id = '" .$id. "'";
        $this->db->query( $sql );
        $sql = "DELETE FROM invoices WHERE id = '" .$id. "'";
        $this->db->query( $sql );
        $success=$this->db->affected_rows();
        return $success;
    }

    function get_payment_info($id){
        // $rs = [];
        foreach($id as $key => $i){
            $rs[$key] = $this->db->get_where('invoices', ['id' => $i] )->result_array();
        }
        return $rs;
    }

    function save_payment($basic, $data){
        $this->db->insert('receipts', $basic);
        $success = $this->db->insert_id();
        $d = zero_format_no($success, 4);
        $basic['receipt_number'] = "R".$d;
        $basic['id'] = $success;
        $this->db->where('id', $success)->update('receipts', $basic);
        $d = [];
        foreach($data as $i){
            $d['receipt_id'] = $success;
            $d['invoice_id'] = $i['id'];
            $d['amt'] = $i['amt'];
            $this->db->insert('receipt_items', $d);

            $rs = $this->db->get_where('invoices', ['id' => $i['id']] )->result_array();
            $paid_amt = $rs[0]['paid_amt']+$d['amt'];
            if( $paid_amt >= $rs[0]['grand_total']){
                $status = 3;
            }else if($paid_amt <=0 ){
                $status = 1;
            }else {
                $status = 2;
            }
            $sql ="UPDATE invoices SET paid_amt = '".$paid_amt."', status = '$status' WHERE id = '".$d['invoice_id']."'";
            // pr($sql);
            $this->db->query( $sql );
        }
        $success=$this->db->affected_rows();
        // $success = $this->db->insert_id();
        return true;
    }

    function list_receipts() {
        $sql = "select 
                parties.name,   receipts.*, DATE_FORMAT(receipts.created, '%a, %e %b %y %h:%i %p') created
                from receipts join parties 
                on receipts.party_id = parties.id
                where receipts.client_id = '" .CLIENT_ID. "'" ;
        $rs=$this->db->query( $sql )->result_array();
        return $rs;
    }
}

// EOF