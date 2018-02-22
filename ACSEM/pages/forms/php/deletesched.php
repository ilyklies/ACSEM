<?php
	include("../../../conn/connection.php");
	echo $eventid = $_POST['Eventid'];
	echo "</br>";
	echo $matchid = $_POST['Matchid'];
	echo "</br>";
	echo $sportsid = $_POST['Sportsid'];
	echo "</br>";
	echo $matchno = $_POST['Matchno'];
	echo "</br>";
	$counter = 0; 
	$mno = 0;

	$query6 = "SELECT * FROM tbl_schedule Where EventID = '$eventid' AND SportsID = '$sportsid'";
    $result6 = mysqli_query($link, $query6);

    while($row = mysqli_fetch_assoc($result6)){
    		$counter = $counter + 1;
    		$mno = $row['MatchNo'];
    }
    echo $counter;
    echo "</br>";
    echo $mno;
    if($matchno == $counter){
    	$query1 = "DELETE  FROM tbl_schedule where MatchID = '$matchid'" ;
		$result1 = mysqli_query($link, $query1);
		header ("Location: ../scheduling.php");
    }else{
    	header ("Location: ../scheduling.php");
    }
	
?>