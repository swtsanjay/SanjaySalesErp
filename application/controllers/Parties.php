<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Parties extends MY_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model("User_model", "user");
        if (!$_SESSION['dtl']) {
            redirect(URL . 'auth/');
        }
    }
    function load_parties(){
        $data['page_title'] = "Parties";
        $rs = $this->user->list_parties();
            $data['dt'] = $rs;
            $this->layout('pages/list_parties', $data);
    }
    function layout($page, $data){
        $data['page'] = $page;
        $this->load->view('layout', $data);
    }
    function party_dtl($id){
        $dtl = $this->user->party_dtl($id);
        // pr($dtl);
        $html = $this->load->view('pages/popups/party_form', ['e_p' => $dtl], true);
        // echo $html;
        json_data(['html' => $html]);
    }
    function save_party(){
        $post = $this->input->post();
        $res = ['success' => false, 'errors' => '', 'msg' => 'error!'];
        if (!$post['type']) {
            $res['errors'] .= "Party type, ";
        }
        if (!$post['name']) {
            $res['errors'] .= "Party name, ";
        }
        if (!$post['mobile']) {
            $res['errors'] .= "Mobile no., ";
        }

        if ( !$res['errors'] ) {
            $d = filter_value($post, ['id','type', 'name', 'mobile', 'email']);
            $d['client_id'] = CLIENT_ID;
            if (!$d['id']) {
                $d['created'] = date('Y-m-d H:i:s');
            }
            if ($this->user->save_party($d)) {
                $res['success'] = true;
                $res['msg'] = "Party saved successfully";
            }
        } else {
            $res['msg'] = rtrim($res['errors'], ', ').' required';
        }
        json_data($res);
    }
    function delete_party($id)
    {
        $dtl = $this->user->delete_party($id);
        json_data(['msg' => 'Party deleted successfully']);
    }

//     function search_parties(){
//         $post = $this->input->post();
//         $key = $post['key'];
//         $type = $post['type'];
//         $rs = $this->user->($key, $type);
//         $data['dt'] = $rs;
//         $data['key'] = $key;
//         $data['type'] = $type;
//         $this->layout('pages/list_parties', $data);
//     }
}
