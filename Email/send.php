<?php
ini_set('display_errors', '0');error_reporting(0);
require('../../common.php');
require('./common.php');
require("Mail.php");
require('Mail/mime.php');

// Configs
$start = file_get_contents('status.txt');
$send_per_run = 450;
$template = file_get_contents('template.html');
$run_count = 1;
$login_details = array(
        'host'      => "smtp.gmail.com",

        // 'username'  => "",
        // 'password'  => "",
}

require('logins.php');

// No edits beyond this point.
$to = $send_per_run;
$sent_count = 0;

$vols = $sql->getAll("SELECT * FROM User WHERE status='1' AND user_type='volunteer' AND verification_status LIKE '%email%' ORDER BY id LIMIT $start,$to");

$embedded_images = array('joey' => 'joey.gif');

foreach($vols as $v) {
	$replaces = array(
		'%NAME%' => ucfirst($v['name']),
		'%EMAIL%'=> $v['email'],
		'%PASSWORD%'=> $v['password'],
	);

	$html_body = str_replace(array_keys($replaces), array_values($replaces), $template);

	sendEmailWithAttachment($replaces['%EMAIL%'], "How You Doin'?", $html_body, $login_details['username'], $login_details, array($output_file), $html_body, $embedded_images);
	print "$sent_count) Email to ${replaces['%EMAIL%']}\n";

	$sent_count++;
}


$end = $start + $sent_count;
file_put_contents('status.txt', $end);
