<?php
session_start();

$sportsid = $_POST['sportsid'];
$_SESSION['id3'] = $sportsid;


echo $id3 =  $_SESSION['id3'];



header("location:../sportland.php");
?>