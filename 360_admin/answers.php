<?php
require('./common.php');

$page = new Crud('prism_answers');
$page->addListDataField('question_id', 'prism_questions', 'Question', '',array('fields'=>'id,subject'));
$page->setListingFields('subject', 'question_id');
$page->setFormFields('subject');
$page->allow['delete'] = false;
$page->allow['add'] = false;
render();
