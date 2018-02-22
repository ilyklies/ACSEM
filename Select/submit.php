<?php
session_start();

$eventid = $_POST['eventid'];
$_SESSION['id']= $eventid;


header("location:../indexalt.php");

?>