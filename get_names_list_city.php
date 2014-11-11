<?php
require_once 'common.php';

$city_id = intval($_REQUEST['city_id']);
$cycle = get_cycle();
$city_progress = 0;
$counter = 0;
$verified = 0;
$people = $sql->getById("SELECT * FROM User WHERE status='1' AND user_type='volunteer' AND city_id=$city_id");

if($people) {

    print "<table>";
    print"<th>Name</th><th>Status</th>";
    foreach($people as $person) {
        $counter++;
        $id = $person['id'];

        $status = $sql->getById("SELECT id FROM SS_UserAnswer WHERE survey_event_id = $cycle AND user_id=$id");
        if( !empty($status) ){
            $verified++;

        }else {
            print "<tr><td>" . $person['name'] . "</td><td>" . "Pending" . "</td></tr>";
        }

    }

    foreach($people as $person) {
        $id = $person['id'];
        $status = $sql->getById("SELECT id FROM SS_UserAnswer WHERE survey_event_id = $cycle AND user_id=$id");
        if( !empty($status) )
            print "<tr><td>" . $person['name'] . "</td><td>" . "Done" . "</td></tr>";
    }


    $percentage = round((($verified/$counter)*100),0,PHP_ROUND_HALF_DOWN);







    print "</table>";

    print "<script type='text/javascript' > loader.setProgress($percentage/100); </script>";
//print "<script type='text/javascript'> document.getElementsById('no_completed')[0].innerHTML = 'Completed : $verified/$counter'; </script>";
}

?> 
