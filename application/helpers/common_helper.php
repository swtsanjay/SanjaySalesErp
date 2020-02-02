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


function zero_format_no($no, $n=5){
	return str_pad($no, $n, '0', STR_PAD_LEFT);
}
//EOF