<?php
include("../../../conn/connection.php");

 echo $sportsid = $_POST['sportsid'];
 echo $sname= $_POST['sportsname'];
 echo $srules = $_POST['sportsrules'];
 echo $scat = $_POST['sportscat'];
 echo $stype = $_POST['sportstype'];


	$sql = "UPDATE `tbl_sports` SET `SportsName` = '$sname', SportsRules = '$srules' , SportsCategory = '$scat' , SportsType = '$stype' WHERE `tbl_sports`.`SportsID` = '$sportsid' ";
	

 	$res = $link->query($sql);
 	header("Location: ../usport.php")

?>