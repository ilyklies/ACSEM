<?php
	include("../../../conn/connection.php");
	session_start();
	$facid = $_POST['FacID']; 
	$id = $_SESSION['evID'];



  	$sql="DELETE FROM tbl_efacilitators WHERE EventID = '$id' And FacilitatorID = '$facid'";
  	$result = $link->query($sql);
  	echo "success";

?>