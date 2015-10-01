<?php
require('./common.php');
$pass = i($QUERY, 'pass');
if($pass != 'blahblah') die("Password Required");
$survey_event_id = $sql->getOne("SELECT MAX(id) FROM SS_Survey_Event"); //get_cycle();

$page = new Crud('SS_UserAnswer');
$page->title = "Speak to Jithin";

$page->addField('name', 'Name', 'virtual');
$page->setListingFields('name', 'comment', 'added_on');
$page->setListingQuery("SELECT U.id, U.name, UA.comment, UA.added_on
		FROM SS_UserAnswer UA INNER JOIN User U ON U.id=UA.user_id 
		WHERE UA.question_id=0 AND answer=0 AND U.status='1' AND U.user_type='volunteer' AND UA.survey_event_id=$survey_event_id");

//$aggrigate = $sql->getOne("SELECT ");

$page->allow['searching'] = false;
$page->allow['edit'] = false;
$page->allow['add'] = false;

render();
