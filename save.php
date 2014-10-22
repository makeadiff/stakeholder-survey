<?php
require('./common.php');

if($QUERY['action']) {
	$count = 0;
	foreach ($QUERY['answer'] as $key => $value) {
		$sql->insert("SS_UserAnswer", array('question_id'=>$key, 'answer'=>$value,'user_id'=>$_SESSION['user_id'], 'survey_event_id'=>$QUERY['survey_event_id'], 'added_on'=>'NOW()'));
		$count++;
	}

	if($QUERY['speak-to-jithin']) {
		$sql->insert("SS_UserAnswer", array('question_id'=>0, 'answer'=>0,'comment'=>$QUERY['speak-to-jithin'],'user_id'=>$_SESSION['user_id'], 'survey_event_id'=>$QUERY['survey_event_id'], 'added_on'=>'NOW()'));
	}

	render();
	exit;
}
header("Location: form.php");