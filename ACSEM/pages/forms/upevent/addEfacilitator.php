<?php
	include("../../../conn/connection.php");
	session_start();
	$facid = $_POST['FacID']; 
	$id = $_SESSION['evID'];
	$sportsass = "TBD";
	

  	$sql3 = "Insert Into tbl_efacilitators(EventID,SportsID,FacilitatorID) Values ('$id','$sportsass','$facid')";
  	$result3 = $link->query($sql3);

?>