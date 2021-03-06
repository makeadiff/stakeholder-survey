<?php
require './common.php';
$cities = $sql->getById("SELECT id,name FROM City ORDER BY name");
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Stakeholder Survey Status</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="../profile/css/national.css" />
<link type="text/css" rel="stylesheet" href="../profile/css/profile.css" />
<link type="text/css" rel="stylesheet" href="../profile/js/calendar/calendar.css" />
<link type="text/css" rel="stylesheet" href="../profile/css/jquery.percentageloader-0.1.css" />
<script type='text/javascript' > 
  var progress,loaders; 
</script>
<script type="text/javascript" src="../profile/js/jquery.min.js"></script>
<script type="text/javascript" src="../profile/js/calendar/calendar.js"></script>
<script type="text/javascript" src="../profile/js/hr.js"></script>
<script type="text/javascript" src="../profile/js/jquery.percentageloader/src/jquery.percentageloader-0.1.js"></script>
<style type="text/css">
	#wrapper {
		height: 2800px;
	}
</style>
</head>

<body>

<h1>Survey Status</h1>
<div id="wrapper">

<?php
$national_surveyed_count = 0;
$national_total_count = 0;
$cycle = get_cycle();
?>
<div id="multiple-loader-container">

<?php
foreach($cities as $city_id=>$name) {
	if($name == "Test") continue;

	$survey_count = $sql->getOne("SELECT COUNT(DISTINCT U.id) FROM SS_UserAnswer UA 
		INNER JOIN User U ON U.id=UA.user_id WHERE UA.survey_event_id=$cycle 
			AND U.status='1' AND U.user_type='volunteer' AND U.city_id=$city_id");
	$total_count = $sql->getOne("SELECT COUNT(U.id) FROM User U WHERE U.status='1' AND U.user_type='volunteer' AND U.city_id=$city_id");
	$national_surveyed_count += $survey_count;
	$national_total_count += $total_count;

	$percentage = $survey_count / $total_count;
	?>

	<div id = 'loader<?php echo $city_id ?>' class = 'city_loader'>
		<h2 class = 'label'><?php echo $name ;  ?></h2>
		<script type = 'text/javascript'> 
			var loader<?php echo $city_id ?> = $('#loader<?php echo $city_id ?>').percentageLoader({width : 160, height : 160, progress : <?php echo $percentage ?>, value : '<?php echo $survey_count ."/".$total_count ?>'});
		</script>
	</div>
	<script type='text/javascript' > loader<?php echo $city_id ?>.setProgress(<?php echo $percentage ?>); </script>
	<?php
}
?>
<div class = 'city_loader'></div>

<div id = 'loader_nat' class = 'city_loader'>
<h2 class = 'label'>National</h2>
<script type = 'text/javascript'> 
	var loader_nat = $('#loader_nat').percentageLoader({width : 160, height : 160, progress : <?php echo ($national_surveyed_count / $national_total_count) ?>, value : '<?php echo $national_surveyed_count . "/" . $national_total_count ?>'});
</script>
</div>
<script type='text/javascript' > loader_nat.setProgress(<?php echo ($national_surveyed_count / $national_total_count) ?>); </script>

</div>

</div>

<script type="text/javascript" src="http://makeadiff.in/madapp/js/uservoice.js"></script>
</body>
</html>
