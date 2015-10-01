<?php
require('./common.php');

$page = new Crud('SS_Question');
$page->title = "Aggregates";

$city_id = 0;
$vertical_id = 1;
$survey_event_id = $sql->getOne("SELECT MAX(id) FROM SS_Survey_Event"); //get_cycle();

if(isset($QUERY['survey_event_id'])) $survey_event_id = $QUERY['survey_event_id'];


$all_survey_events = $sql->getById("SELECT id, CONCAT(id, ') ', DATE_FORMAT(added_on, '%Y %M')) AS name FROM SS_Survey_Event");

$page->code['top'] = '<form action="" method="post"><label for="survey_event_id">Survey Event</label><select name="survey_event_id">';
foreach ($all_survey_events as $id => $name) {
	$sel = '';
	if($id == $survey_event_id) $sel = 'selected="selected"';
	$page->code['top'] .= "<option value='$id' $sel>$name</option>";
}
$page->code['top'] .= '</select><input name="action" type="submit" value="Change" /></form>';

$all_answer = array(1=>'Level 1', 3=>'Level 3', 5=>'Level 5');
//$all_questions = $sql->getById("SELECT id,question FROM SS_Question WHERE status='1'");

$where = '';
if($city_id) {
	$where .= "U.city_id=$city_id AND ";
}

foreach ($all_answer as $answer_number => $answer_text) {
	$page->addField('answer_'.$answer_number, $answer_text, 'virtual', array(), array(
		'sql'=>"SELECT COUNT(DISTINCT U.id) FROM SS_UserAnswer UA
					INNER JOIN User U ON U.id=UA.user_id
					WHERE $where U.status='1' AND U.user_type='volunteer' AND UA.survey_event_id=$survey_event_id
					AND UA.answer='$answer_number' AND UA.question_id='%id%'"));
}

$page->setListingFields(array('question','answer_1','answer_3','answer_5'));
$page->setListingQuery("SELECT id, question FROM SS_Question WHERE status='1'");


$page->allow['searching'] = false;
$page->allow['edit'] = false;
$page->allow['add'] = false;
$page->allow['delete'] = false;
$page->allow['bulk_operations'] = false;

render();
