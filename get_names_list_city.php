<?php
require_once 'common.php';

$city_id = intval($_REQUEST['city_id']);
$cycle = get_cycle();
$city_progress = 0;
$counter = 0;
$verified = 0;
$people = $sql->getById("SELECT DISTINCT(U.id) as id, UA.answer as answer,U.name as name FROM SS_UserAnswer UA RIGHT OUTER JOIN User U ON U.id=UA.user_id WHERE UA.survey_event_id=$cycle AND U.status='1' AND U.user_type='volunteer' AND U.city_id=$city_id");

if($people) {

    foreach($people as $person) {
        $counter++;
        if( !empty($person['answer']) )
            $verified++;
    }

    $percentage = round((($verified/$counter)*100),0,PHP_ROUND_HALF_DOWN);

    //print "<h2 class='no_completed'>Email & Phone Verified : $verified/$counter ($percentage%)</h2>";

    print "<table>";
    print"<th>Name</th><th>Status</th>";
    foreach($people as $person) {
        if(!empty($person['answer']))
            $status = "Done";
        else
            $status = "Pending";

        print "<tr><td>" . $person['name'] . "</td><td>" . $status . "</td></tr>";


    }



    print "</table>";

    print "<script type='text/javascript' > loader.setProgress($percentage/100); </script>";
//print "<script type='text/javascript'> document.getElementsById('no_completed')[0].innerHTML = 'Completed : $verified/$counter'; </script>";
}

?> 
