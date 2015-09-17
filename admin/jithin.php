<?php
require('./common.php');
$pass = i($QUERY, 'pass');
if($pass != 'blahblah') die("Password Required");

$page = new Crud('SS_UserAnswer');
$page->title = "Speak to Jithin";

$page->addField('name', 'Name', 'virtual');
$page->setListingFields('name', 'comment');
$page->setListingQuery("SELECT U.id, U.name, UA.comment
		FROM SS_UserAnswer UA INNER JOIN User U ON U.id=UA.user_id 
		WHERE UA.question_id=0 AND answer=0 AND U.status='1' AND U.user_type='volunteer'");

//$aggrigate = $sql->getOne("SELECT ");

$page->allow['searching'] = false;
$page->allow['edit'] = false;
$page->allow['add'] = false;

render();
 
