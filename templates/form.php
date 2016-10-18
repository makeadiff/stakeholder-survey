<div id="survey" class="row">
<div class="col-md-offset-3 col-md-6">
<h1 class="title"><?php echo $config['site_title']; ?> for <strong><?php echo $user['name'] ?></strong></h1>
<br /><br />
<form action="save.php" method="post" id="main-form">
<?php foreach($questions as $q) { ?>
<div class="question-area">
<div class="question">Q. <?php echo $q['question'] ?></div>

<?php foreach ($answers as $ans) { 
	if($ans['question_id'] == $q['id']) {
		print '<div class="answer"><input type="radio"  name="answer['.$q['id'].']" id="answer-'.$ans['id'].'" value="'.$ans['level'].'" /> '
				. '<label for="answer-'.$ans['id'].'">' . $ans['answer'] . '</label></div>';
	}
} ?>


</div><br />
<?php } ?>

<div class="talk-back">
<div class="question">Speak to CEO</div>
<div class="answer">This message will be directly sent to the CEO...</div>
<textarea name="speak-to-jithin" class="form-control" rows="5" cols="70"></textarea><br /><br />
</div>


<input type="hidden" name="survey_event_id" value="<?php echo $survey_event_id; ?>" />
<input type="submit" name="action" class="btn btn-default" value="Submit Answers" />
</form>
<br />
</div></div>

<!-- 
<div class="btn-group answers-options" data-toggle-id="answer-<?php echo $q['id'] ?>" data-toggle="buttons-radio">
  <button type="button" value="1" class="btn btn-sm btn-danger" data-toggle="button">Very Bad</button>
  <button type="button" value="2" class="btn btn-sm btn-warning" data-toggle="button">Bad</button>
  <button type="button" value="3" class="btn btn-sm btn-info active" data-toggle="button">Average</button>
  <button type="button" value="4" class="btn btn-sm btn-primary" data-toggle="button">Good</button>
  <button type="button" value="5" class="btn btn-sm btn-success" data-toggle="button">Very Good</button>
</div> 
<input type="hidden" name="answer[<?php echo $q['id'] ?>]" id="answer-<?php echo $q['id'] ?>" value="3" />
-->
