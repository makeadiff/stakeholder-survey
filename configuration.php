<?php
$server_host = 'localhost';
if(isset($_SERVER['HTTP_HOST'])) $server_host = $_SERVER['HTTP_HOST'];
//Configuration file for iFrame
$config = array(
	'site_title'	=> 'Stakeholder Survey',
	'site_url'		=> 'http://'.$server_host.'/Sites/community/makeadiff/makeadiff.in/',
	'site_home'		=> 'http://'.$server_host.'/Sites/community/makeadiff/makeadiff.in/apps/stakeholder-survey/',
);
