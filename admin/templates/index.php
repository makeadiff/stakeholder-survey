<h1>Dashboard</h1>

<a href="../">View Site</a>

<form action="" method="post">
<?php 
$html->buildInput('enable_stakeholder_survey', "Enable Stakeholder Survey", 'checkbox', i($current_survey, 'status', 0));
$html->buildInput("action","",'submit','Enable');
?>
</form>
