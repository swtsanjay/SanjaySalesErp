<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model("User_model", "user");
		//pr($_SESSION);
		if( ! $_SESSION['dtl'] && !$this->session->userdata['admin'][0] ){
			redirect(URL.'auth/');
        }
        if($_SESSION['dtl'][0]['id'] != $_SESSION['dtl'][0]['client_id'] && !$this->session->userdata['admin'][0]){
            redirect(URL . 'auth/');
        }
	}

	public function index()	{
        $data['page_title'] = "Users";
        $data['dtl'] = $this->user->get_user_dtl();
		$this->layout('pages/users', $data);
	}

	function user_dtl($id){
		$rs = $this->user->get_user_dtl($id);
        $data['dt'] = $rs;
        $html = $this->load->view('pages/popups/user_form', $data, true);
        json_data(['html'=>$html]);
    }
    
    function save_user(){
        $post = $this->input->post();
        $msg = '';
        $success = false;
        if(!$post['name'])              $msg .= 'Name, ';
        if(!$post['user_name'])         $msg .= 'User id, ';
        if(!$post['password'])          $msg .= 'Password, ';
        if(!$post['mobile'])            $msg .= 'Mobile, ';
        if(!$post['status']  && $post['status'] != 0)            $msg .= 'Status, ';
        if($msg)    $msg = rtrim($msg, ', ').' required';

        if($this->user->check_user($post['user_name']) && $this->user->check_user('', $post['id'])[0]['user_name'] != $post['user_name'] ){
            $msg .= 'User name already exist';
        }


        if(!$msg){
            if(!$this->session->userdata['admin'][0]){
                if($this->user->check_user($post['user_name'])[0]['type']=='CLIENT'){
                    $post['type'] = '1';
                    $post['status'] = '1';
                } else{
                    $post['type'] = '2';
                }
            } else{
                $post['type'] = '1';
            }
            
            $post['client_id'] = CLIENT_ID;
            if($insert_id = $this->user->save_user($post)){
                $msg = "Saved successfully";
                $success = true;
                if($this->session->userdata['admin'][0]){
                    $this->user->save_user(['id'=>$insert_id, 'client_id'=>$insert_id]);
                }
            }
            // pr($post);
        } 
        json_data(['msg'=>$msg, 'success'=> $success]);
    }
	
	function layout($page, $data){
		$data['page']= $page;
		$this->load->view('layout', $data);
	}
}

