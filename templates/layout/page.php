<!DOCTYPE HTML>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $title?></title>
<link href="<?php echo $config['site_home'] ?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $config['site_url'] ?>images/silk_theme.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $config['site_url'] ?>bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $config['site_url'] ?>bower_components/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">

<?php echo $css_includes ?>
</head>
<body>
<div id="wrapper" class="container">
<div id="header" class="navbar navbar-fixed-top navbar-default" role="navigation">
<div id="nav" class="container">
	<div class="navbar-brand"><a href="<?php echo $config['site_home'] ?>"><img src="../okr/images/logo.png" height="100" /></a></div>
</div>
</div>
<div id="content" class="container">

<?php include($GLOBALS['template']->template); ?>

</div>
<div id="footer"></div>
</div>

<script src="<?php echo $config['site_url'] ?>bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo $config['site_url'] ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo $config['site_home'] ?>js/application.js" type="text/javascript"></script>

<?php echo $js_includes ?>
</body>
</html>