<?php
include("../../../conn/connection.php");


$eventid = $_POST['FM1'];
$sportsid = $_POST['FS1'];
$dpoint = $_POST['DCODE'];
$dcode = $_POST['DPOINT'];



$sql = "Insert Into tbl_sportpoints(EventID,SportsID,Depcode,Points) Values ('$eventid','$sportsid','$dpoint','$dcode')";
$result1 = $link->query($sql);



?>