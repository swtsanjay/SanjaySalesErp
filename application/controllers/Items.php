<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Items extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("User_model", "user");
        //pr($_SESSION);
        if (!$_SESSION['dtl']) {
            redirect(URL . 'auth/');
        }
        define('CLIENT_ID', $_SESSION['dtl'][0]['client_id']);
    }


    function load_items(){
        $data['page_title'] = "Items";
        $post = $this->input->post();
        $key = $post['key'];
        $type = $post['type'];
        if (!$key && !$type) {
            $rs = $this->user->list_items();
            // pr($rs);
            $data['dt'] = $rs;
            $this->layout('pages/list_items', $data);
        }
        else{
            $this->search_items();
        }
    }
    function item_dtl($id)
    {
        $dtl = $this->user->item_dtl($id);
        // pr('hello');
        $html = $this->load->view("pages/popups/item_form", ['e_i' => $dtl], true);
        json_data(['html' => $html]);
    }

    function item_delete($id)
    {
        $dtl = $this->user->item_delete($id);
        json_data(['msg' => 'Item deleted successfully']);
    }

    function save_item(){
        $post = $this->input->post();
        $res = ['success' => false, 'errors' => '', 'msg' => 'error!'];

        if (!$post['type']) {
            $res['errors'] .= "Item type, ";
        }
        if (!$post['name']) {
            $res['errors'] .= "Item name, ";
        }
        if (!$post['item_code']) {
            $res['errors'] .= "Item code, ";
        }
        if (!$post['unit_cost']) {
            $res['errors'] .= "Item unit cost, ";
        }
        if (!$post['sale_cost']) {
            $res['errors'] .= "Item sale cost, ";
        }
        if (!$post['status']) {
            $res['errors'] .= "Item status, ";
        }

        if (!$res['errors']) {
            $d = filter_value($post, ['id', 'type', 'name', 'item_code', 'unit_cost', 'sale_cost', 'status', 'uom', 'dscrp']);
            $d['client_id'] = CLIENT_ID;
            if (!$d['id']) {
                $d['created'] = date('Y-m-d H:i:s');
            }
            $d['updated'] = date('Y-m-d H:i:s');
            if ($this->user->save_item($d)) {
                $res['success'] = true;
                $res['msg'] = "Item saved successfully";
            }
        } else {
            $res['msg'] = rtrim($res['errors'], ', ').' required!!!';
        }

        json_data($res);
    }

    function search_items()
    {
        $post = $this->input->post();
        $key = $post['key'];
        $type = $post['type'];
        $rs = $this->user->search_items($key, $type);
        $data['dt'] = $rs;
        $data['key'] = $key;
        $data['type'] = $type;
        $this->layout('pages/list_items', $data);
    }

    function layout($page, $data)
    {
        $data['page'] = $page;
        $this->load->view('layout', $data);
    }
}
