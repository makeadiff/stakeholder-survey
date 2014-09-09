<?php
require('./common.php');

$page = new Crud('SS_UserAnswer');
$page->title = "Individual Answers";

$city_id = 26;
$vertical_id = 1;
$all_answer = array('No Answer', 'Bad','Very Bad', 'OK', 'Good', 'Very Good');


$page->addField('name', 'Name', 'text');
$page->addField('answer', 'Answer', 'int', array(), $all_answer, 'select');
$page->addListDataField('question_id', 'SS_Question', 'Question', '', array('fields'=> 'id,question'));

$page->setListingFields('name','question_id', 'answer');
$page->setListingQuery("SELECT UA.id, U.name, UA.question_id, UA.answer 
		FROM SS_UserAnswer UA INNER JOIN User U ON U.id=UA.user_id 
		WHERE U.city_id=$city_id AND U.status='1' AND U.user_type='volunteer'");

//$aggrigate = $sql->getOne("SELECT ");

$page->allow['searching'] = false;
$page->allow['edit'] = false;
$page->allow['add'] = false;

render();
