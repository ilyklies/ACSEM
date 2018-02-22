<?php
	include("../../../conn/connection.php");
	session_start();
	$depid = $_POST['DepID']; 
	$id = $_SESSION['evID'];



  	$sql="DELETE FROM tbl_edepartments WHERE EventID = '$id' And DepID = '$depid'";
  	$result = $link->query($sql);
  	echo "success";

?>