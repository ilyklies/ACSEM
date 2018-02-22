<?php
	include("../../../conn/connection.php");
	session_start();
	$sportsid = $_POST['SportsID']; 
	$id = $_SESSION['evID'];



  	$sql="DELETE FROM tbl_esports WHERE EventID = '$id' And SportsID = '$sportsid'";
  	$result = $link->query($sql);
  	echo "success";

?>