<?php
require('./common.php');

$page = new Crud('SS_Question');
$page->title = "Question";
render();
