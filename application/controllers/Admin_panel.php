<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_panel extends MY_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('User_model', 'user');
        $actual_link = "$_SERVER[REQUEST_URI]";
        if($actual_link != '/csz/sales_erp/index.php/admin_panel' && !$this->session->userdata['admin'][0]){
            redirect(URL.'admin_panel');
        }
    }

    function index(){
        if($this->session->userdata['admin'][0]){
            redirect(URL.'admin_panel/list_clients');
        }
        $post = $this->input->post();
        // pr($post);
        if($post){
            if(!$post['username'])      $data['name_error'] = '* Name is required';
            if(!$post['password'])      $data['pass_error'] = '* Password is required';
            if(!$data){
                if($this->user->validate_admin($post)){
                    redirect(URL.'admin_panel/list_clients');
                } else{
                    $data['name_error'] = '* User id and password didn\'t match';
                }
            }
        }
        $data['dtl'] = $this->user->get_client_dtl();
        $this->load->view('pages/admin_login', $data);
    }

    function list_clients(){
        $data['dtl'] = $this->user->get_client_dtl();
        $this->load->view('pages/admin_home', $data);
    }
}

// EOF