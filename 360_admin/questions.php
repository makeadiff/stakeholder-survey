<?php
require('./common.php');

$page = new Crud('prism_questions');

$page->setListingFields('subject');
$page->setFormFields('subject');
$page->allow['delete'] = false;
$page->allow['add'] = false;
render();
