<?php
require('./common.php');

$page = new Crud('prism_questions');

$page->setListingFields('subject');
//$page->setFormFields('subject');
$page->allow['save_and_edit_form_button'] = false;
$page->allow['save_and_new_form_button'] = false;
$page->allow['delete'] = false;
$page->allow['add'] = false;
render();
