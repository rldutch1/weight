<?php

include_once('connect.php');

$weightdata = new Connection(); //Instantiate a new connection.

//Retrieve multiple rows of data from the database using the All method.
$weightdata->myQuery("SELECT weightdate, pounds, workout from weight where active_ind = 1 order by weightdate desc limit 0, 10");
$row = $weightdata->All();
echo json_encode($row);
?>
