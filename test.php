<?php

	include("ACSEM/conn/connection.php");

	$array = array();

	$query3 = "SELECT * FROM tbl_rank Where EventID = '1000-Event' And SportsID = '1005-Sports'";
	$result3 = mysqli_query($link, $query3);

	while($row = mysqli_fetch_assoc($result3)){
	    	
	  			$HoldRank = $row['Rank'];
	  			$array[] = $row['Rank'];  		
	}

	sort($array);

	//var_dump($array);
	echo "</br>";
	//print_r($array);
	//echo end($array);

	echo $rank = end($array) + 1;

?>