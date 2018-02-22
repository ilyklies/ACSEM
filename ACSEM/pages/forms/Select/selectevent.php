<?php
session_start();

$eventid = $_POST['eventid'];
$_SESSION['evID']= $eventid;


header("location:../ueventselect.php");

?>