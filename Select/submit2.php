<?php
session_start();

$depid = $_POST['depid'];
$_SESSION['id2'] = $depid;


echo $id2 =  $_SESSION['id2'];


header("location:../depland.php");

?>