<?php
require('./common.php');

if($QUERY['action']) {
	$count = 0;
	foreach ($QUERY['answer'] as $key => $value) {
		$sql->insert("SS_UserAnswer", array('question_id'=>$key, 'answer'=>$value,'user_id'=>$_SESSION['user_id'], 'added_on'=>'NOW()'));
		$count++;
	}

	render();
	exit;
}
header("Location: form.php");