<?php
	include("../../../conn/connection.php");
	$decode = $_GET['id'];
	echo $decode; 
	echo "<br>";

	$query1 = "DELETE  FROM tbl_esplayers where StudentID = '$decode'" ;
	$result1 = mysqli_query($link, $query1);

	header ("Location: ../aplist.php");
	
	
?>