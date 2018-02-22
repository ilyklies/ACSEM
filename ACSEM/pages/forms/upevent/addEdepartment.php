<?php
	include("../../../conn/connection.php");
	session_start();
	$depid = $_POST['DepID']; 
	$id = $_SESSION['evID'];
	

  	$sql1 = "Insert Into tbl_edepartments(EventID,DepID) Values ('$id','$depid')";
  	$result1 = $link->query($sql1);

?>