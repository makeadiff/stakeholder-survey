<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $config['site_title'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo $config['library_url'] ?>css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $config['library_url'] ?>css/custom.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $config['site_home'] ?>css/style.css" />
</head>

<body class="blue-red">
<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand" href="<?php echo $config['library_url'] ?>index.php/dashboard/dashboard_view">MADApp</a>

    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo $config['library_url'] ?>index.php/auth/logout">Logout</a></li>

        </ul>

    </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="board transparent-container">

<?php
$message['success'] = i($QUERY,'success');
$message['error'] = i($QUERY,'error');
if(!empty($message['success']) or !empty($message['error'])) { ?>
    <div class="message" id="error-message" <?php echo (!empty($message['error'])) ? '':'style="display:none;"';?>><?php echo (empty($message['error'])) ? '':$message['error'] ?></div>
    <div class="message" id="success-message" <?php echo (!empty($message['success'])) ? '':'style="display:none;"';?>><?php echo (empty($message['success'])) ? '': $message['success'] ?></div>
<?php } ?>


<?php include($GLOBALS['template']->template); ?>

</div>
</div>
<div id="footer"></div>

<script type="text/javascript" src="<?php echo $config['library_url'] ?>js/jquery-1.9.0.js"></script>
<script type="text/javascript" src="<?php echo $config['library_url'] ?>js/jquery.tablesorter.min.js"></script>
<script type="text/javascript" src="<?php echo $config['library_url'] ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $config['library_url'] ?>js/uservoice.js"></script>
<script src="<?php echo $config['site_home'] ?>js/application.js" type="text/javascript"></script>
<?php echo $js_includes ?>
</body>
</html>