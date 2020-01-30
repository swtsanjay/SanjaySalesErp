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
        $sql = "SELECT * FROM invoices WHERE created_by = '" .$_SESSION['dtl'][0]['id']. "'" ;
        $rs=$this->db->query( $sql )->result_array();
        // $rs['sql'] = $sql;
        // pr($rs);
        // pr($_SESSION);
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
        return $data;
    }

    function save_invoice(){
        
    }
}

// EOF