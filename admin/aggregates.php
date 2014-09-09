<?php
require('./common.php');

$page = new Crud('SS_Question');
$page->title = "Aggrigates";

$city_id = 26;
$vertical_id = 1;
$all_answer = array('No Answer', 'Very Bad','Bad', 'OK', 'Good', 'Very Good');
//$all_questions = $sql->getById("SELECT id,question FROM SS_Question WHERE status='1'");


foreach ($all_answer as $answer_number => $answer_text) {
	$page->addField('answer_'.$answer_number, $answer_text, 'virtual', array(), array(
		'sql'=>"SELECT COUNT(UA.id) FROM SS_UserAnswer UA
					INNER JOIN User U ON U.id=UA.user_id
					WHERE U.city_id=$city_id AND U.status='1' AND U.user_type='volunteer'
					AND UA.answer='$answer_number' AND UA.question_id='%id%'"));
}

$page->setListingFields(array('question','answer_1','answer_2','answer_3','answer_4','answer_5'));
$page->setListingQuery("SELECT id, question FROM SS_Question WHERE status='1'");


$page->allow['searching'] = false;
$page->allow['edit'] = false;
$page->allow['add'] = false;

render();
