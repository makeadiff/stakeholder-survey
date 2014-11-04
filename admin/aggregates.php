<?php
require('./common.php');

$page = new Crud('SS_Question');
$page->title = "Aggregates";

$city_id = 0;
$vertical_id = 1;
$all_answer = array(1=>'Level 1', 3=>'Level 3', 5=>'Level 5');
//$all_questions = $sql->getById("SELECT id,question FROM SS_Question WHERE status='1'");

$where = '';
if($city_id) {
	$where .= "U.city_id=$city_id AND ";
}

foreach ($all_answer as $answer_number => $answer_text) {
	$page->addField('answer_'.$answer_number, $answer_text, 'virtual', array(), array(
		'sql'=>"SELECT COUNT(UA.id) FROM SS_UserAnswer UA
					INNER JOIN User U ON U.id=UA.user_id
					WHERE $where U.status='1' AND U.user_type='volunteer'
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
