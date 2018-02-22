<?php
session_start();

$dcode = $_POST['depcode'];

$_SESSION['Depcode'] = $dcode;


header("location:../Breakdown.php");

?>