<?php
require('./common.php');

$page = new Crud('SS_Answer');
$page->title = "Answers";
$page->addListDataField('question_id', 'SS_Question', 'Question', 'status="1"',array('fields'=>'id,question'));
render();
