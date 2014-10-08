<?php
require('./common.php');
$html = new HTML;
$cycle = 1;

$current_survey = $sql->from("SS_Survey_Event")->where(array('cycle'=>$cycle))->get('assoc');

if(i($QUERY,'action') == 'Enable') {
	if($current_survey) {
		$status = i($QUERY, 'enable_stakeholder_survey', 0);
		$sql->update("SS_Survey_Event", array('status'=>$status), array('id'=>$current_survey['id']));
		$current_survey['status'] = $status;
		if($status) {
			$QUERY['success'] = 'Survey Enabled. Stage '.$current_survey['stage'].' Engaged.';
		} else {
			$QUERY['success'] = 'Survey Disabled.';
		}
	} else {
		$sql->insert("SS_Survey_Event", array(
			'cycle' => $cycle,
			'stage' => 1,
			'started_by_user_id' => $_SESSION['user_id'],
			'added_on' => 'NOW()',
			'status'=>$QUERY['enable_stakeholder_survey']));
		$QUERY['success'] = 'Survey Enabled. Stage 1 Engaged.';
	}
}

$template->template = '';
render();
