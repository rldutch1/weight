<?php

include_once('connect.php');
$insertweight = new Connection(); //Instantiate a new connection.

  $thedate = htmlentities($_POST["thedate"]);
  $pounds = htmlentities($_POST["pounds"]);
  $workout = htmlentities($_POST["workout"]);

//Collect data from form:
if (isset($thedate) && $pounds !== "" && is_numeric($pounds)){

echo $thedate . "<br />" . $pounds . "<br />" . $workout;	

//Bind data.
$insertweight->myQuery('INSERT INTO weight (weightdate, pounds, workout) VALUES(:weightdate,:pounds,:workout)');
$insertweight->bind(':weightdate', $thedate); //bind each value
$insertweight->bind(':pounds', $pounds); // bind
$insertweight->bind(':workout', $workout);
//Execute the query and insert the data.
if($insertweight->run()){

echo "<div id='datainserted'>
Weight data inserted. (Delete date entry?)
<br /><a href='../'><h3>Go Back</h3></a>
</div>";
}}
else {
	echo "Invalid Data Entry.<br /><a href='../'><h3>Go Back</h3></a>";
}
?>
