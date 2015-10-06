<?php
require_once('common.php');
$cities = $sql->getById("SELECT id,name FROM City ORDER BY name");
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Happiness Index</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link type="text/css" rel="stylesheet" href="../profile/css/hr.css" />
    <link type="text/css" rel="stylesheet" href="../profile/css/profile.css" />
    <link type="text/css" rel="stylesheet" href="../profile/css/jquery.percentageloader-0.1.css" />
    <script type='text/javascript' >
        var progress,loaders;
    </script>
    <script type="text/javascript" src="../profile/js/jquery.min.js"></script>
    <script type="text/javascript" src="../profile/js/calendar/calendar.js"></script>
    <script type="text/javascript" src="js/city-status.js"></script>
    <script type="text/javascript" src="../profile/js/jquery.percentageloader/src/jquery.percentageloader-0.1.js"></script>
</head>

<body>
<h1>City Dashboard</h1>

<div id="wrapper">
    <div id="progressbar">
        <script type="text/javascript">
            var loader = $("#progressbar").percentageLoader({
                width : 160, height : 160, progress : 0.0, value : ''});
        </script>
    </div>

    <h2 class="label">City</h2>

    <div class="styled-select">
        <select id="city_id" name="city_id">
            <option value="0">Select...</option>
            <?php foreach($cities as $id=>$name) {?>
                <option value="<?php echo $id ?>"><?php echo $name ?></option>
            <?php } ?>
        </select>
    </div>

    <br /><br />


    <div id="people_list" class="people_list">
    </div>
</div>
</body>
</html>
