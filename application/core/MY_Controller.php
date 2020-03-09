<?php
class MY_Controller extends CI_Controller {
    function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Kolkata');
        define('CLIENT_ID', $_SESSION['dtl'][0]['client_id']);
        define('USER_ID', $_SESSION['dtl'][0]['id']);
	}
}

//EOF