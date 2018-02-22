<?php
	include("../../../conn/connection.php");
	session_start();
	$sportsid = $_POST['SportsID']; 
	$id = $_SESSION['evID'];
	$selim = "TBD";
	

  	$sql1 = "Insert Into tbl_esports(EventID,SportsID,Elimination) Values ('$id','$sportsid','$selim')";
  	$result1 = $link->query($sql1);

?>