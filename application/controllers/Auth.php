<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("User_model", "user");
	}

	public function index()	{
        $post=$this->input->post();
        if( $_SESSION['dtl'] ){
            redirect(URL.'user/dashboard');
        }
		if($post){
			
			if($post['username'] == null && $post['password'] ==null ){
				$data['error'] = true;
				$data['name_error'] = "User name required";
				$data['pass_error'] = "Password required";
			}
			else{
				$data['name'] = $post['username'];
				$res = $this->user->validate_user( $post['username'], $post['password'], $post['gender'] );
				if(!$res){
					$data['error'] = true;
					$data['name_error'] = "User name didn't match";
					$data['pass_error'] = "Password didn't match";
				}else{
					$this->session->set_userdata(['dtl'=>$res ]);
					redirect(URL.'user/dashboard');
				}
			}
			
			
		}
		$this->load->view('login_page', $data);
	}

	
}
