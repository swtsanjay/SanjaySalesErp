<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_profile extends MY_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model("User_model", "user");
        if (!$_SESSION['dtl']) {
            redirect(URL . 'auth/');
        }
        // if($_SESSION['dtl'][0]['id'] != $_SESSION['dtl'][0]['client_id']){
        //     redirect(URL . 'auth/');
        // }
	}

	
    function index(){
        $data['page_title'] = "My Profile";
        $data['dtl'] = $this->user->get_user_dtl(USER_ID);
		$this->layout('pages/my_profile', $data);
    }
    
    function save_profile(){
        $CLIENT_USER_ID = $_SESSION['dtl'][0]['user_name'];
        $post = $this->input->post();
        $err = [];
        
        if(!$post['name'])      $err['name_msg'] = "Name is required";
        if(!$post['mobile'])    $err['mobile_msg'] = "Mobile number is required";
        if(!$post['user_name']) $err['user_name_msg'] = "User id is required";
        if(!$post['password'])  $err['password_msg'] = "Password is required";
        if(!$post['email'])     $err['email_msg'] = "Email is required";
        
        if(!$err){
            if($CLIENT_USER_ID == $post['user_name'] || !$this->user->check_user($post['user_name'])){
                $this->user->update_profile($post, USER_ID);
                $CLIENT_USER_ID = $post['user_name'];
                $data['msg'] = 'Saved successfully';
            } else{
                $err['user_name_msg'] = "User id already exists";
            }
        }
        
        $data['err'] = $err;
        $data['dtl'] = $this->user->get_user_dtl(USER_ID);
        $this->layout('pages/my_profile', $data);
    }

    function layout($page, $data){
		$data['page']= $page;
		$this->load->view('layout', $data);
	}
    
}

