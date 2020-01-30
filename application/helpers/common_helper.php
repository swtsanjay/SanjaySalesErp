<?php
define('ROOT_URL', str_replace('[::1]', 'localhost', base_url()));
define('URL', str_replace('[::1]', 'localhost', base_url()).'index.php/');

function pr($a){
    echo '<pre>'; print_r($a); echo '</pre>';
}

function filter_value($post, $keys){
	$data=array();
	foreach($post as $k=>$v){
		if(in_array($k, $keys)){
			$data[$k]=$v;
		}
	}
	return $data;
}

function json_data($res){
	header('Content-Type: application/json');
	$res=$res?$res:array();
	die(json_encode($res));
}

//EOF