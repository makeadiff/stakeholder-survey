<?php
require('common.php');

if(empty($QUERY['vol'])) {
	if(empty($_SESSION['user_id'])) {
		$url_parts = parse_url($config['site_url']);
		$domain = $url_parts['scheme'] . '://' . $url_parts['host'];
		$madapp_url = "http://makeadiff.in/madapp/";
		if(strpos($config['site_home'], 'localhost') !== false) $madapp_url = "http://localhost/Projects/Madapp/";

		header("Location: " . $madapp_url . "index.php/auth/login/" . base64_encode($domain . $config['PHP_SELF']));
		exit;
	}
	$user_id = $_SESSION['user_id'];
} else {
	$user_id = base64_decode($QUERY['vol']); // 'MQ==' is Binny.
}

$user = $sql->from("User")->find($user_id);
$questions = $sql->from("SS_Question")->where(array('status'=>'1'))->get();
$answers = $sql->from("SS_Answer")->where(array('status'=>'1'))->sort('level')->get();

render();