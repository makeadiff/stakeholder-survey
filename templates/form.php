
<h1 class="title">Volunteer Survey for: <?php echo $user['name'] ?></h1>

<form action="save.php" method="post">
<?php foreach($questions as $q) { ?>
<div class="question-area">
<div class="question"><?php echo $q['question'] ?></div>

<?php foreach ($answers as $ans) { 
	if($ans['question_id'] == $q['id']) {
		print '<div class="answer"><input type="radio" name="question-'.$q['id'].'" id="answer-'.$ans['id'].' value="'.$ans['level'].'" /> '
				. '<label for="answer-'.$ans['id'].'">' . $ans['answer'] . '</label></div>';
	}
} ?>

<!-- <div class="btn-group answers-options" data-toggle-id="answer-<?php echo $q['id'] ?>" data-toggle="buttons-radio">
  <button type="button" value="1" class="btn btn-sm btn-danger" data-toggle="button">Very Bad</button>
  <button type="button" value="2" class="btn btn-sm btn-warning" data-toggle="button">Bad</button>
  <button type="button" value="3" class="btn btn-sm btn-info active" data-toggle="button">Average</button>
  <button type="button" value="4" class="btn btn-sm btn-primary" data-toggle="button">Good</button>
  <button type="button" value="5" class="btn btn-sm btn-success" data-toggle="button">Very Good</button>
</div> -->

<input type="hidden" name="answer[<?php echo $q['id'] ?>]" id="answer-<?php echo $q['id'] ?>" value="3" />
</div><br />
<?php } ?>

<input type="submit" name="action" class="btn btn-default" value="Submit Answers" />
</form>
<br />