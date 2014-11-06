<?php
require('./common.php');

$page = new Crud('SS_Question');
$page->title = "Aggregates";

$city_id = 0;
$vertical_id = 1;

if(isset($QUERY['cycle'])) $cycle = $QUERY['cycle'];
else $cycle = get_cycle();
$page->code['top'] = '<form action="" method="post"><label for="cycle">Cycle</label><select name="cycle">
<option value="1"' . (($cycle == 1) ? 'selected':'') . '>Cycle 1</option>
<option value="2"' . (($cycle == 2) ? 'selected':'') . '>Cycle 2</option>
<option value="3"' . (($cycle == 3) ? 'selected':'') . '>Cycle 3</option>
<option value="4"' . (($cycle == 4) ? 'selected':'') . '>Cycle 4</option>
<option value="5"' . (($cycle == 5) ? 'selected':'') . '>Cycle 5</option>
</select><input name="action" type="submit" value="Change" /></form>';

$all_answer = array(1=>'Level 1', 3=>'Level 3', 5=>'Level 5');
//$all_questions = $sql->getById("SELECT id,question FROM SS_Question WHERE status='1'");

$where = '';
if($city_id) {
	$where .= "U.city_id=$city_id AND ";
}

foreach ($all_answer as $answer_number => $answer_text) {
	$page->addField('answer_'.$answer_number, $answer_text, 'virtual', array(), array(
		'sql'=>"SELECT COUNT(DISTINCT U.id) FROM SS_UserAnswer UA
					INNER JOIN User U ON U.id=UA.user_id
					WHERE $where U.status='1' AND U.user_type='volunteer' AND UA.survey_event_id=$cycle
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
