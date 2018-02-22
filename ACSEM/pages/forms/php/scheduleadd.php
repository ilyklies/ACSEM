<?php

	include("../../../conn/connection.php");

	echo $eventid = $_POST['txtEventID'];
	echo $sportsid = $_POST['txtSportsID'];
	echo $venue = $_POST['txtvenue'];
	echo $date = $_POST['txtDateS'];
	echo $stime = $_POST['txtStime'];
	echo $etime = $_POST['txtEtime'];
	echo $teamA = $_POST['txtTeamA'];
	echo $teamB = $_POST['txtTeamB'];
	echo $match = $_POST['txtMatch'];
	$check = "";

	$query = "SELECT * FROM tbl_schedule";
    $result = mysqli_query($link, $query);

	  while($row = mysqli_fetch_assoc($result)){
    	$matchid = $row['MatchID'];

    }
    

    if($matchid == ""){

    $matchid = "1000-Match";

  	}else{

    $matchid = $matchid + 1 . "-Match";
   
  	}

  	$query1 = "SELECT * FROM tbl_schedule Where Dates = '$date' And StartTime = '$stime' And EndTime = '$etime' And SportsID = '$sportsid' And Venue = '$venue'";
    $result1 = mysqli_query($link, $query1);

	  while($row = mysqli_fetch_assoc($result1)){
    	
    	echo $checks = "True";
    	
    }

    if ($checks == "True" || $stime == $etime || $teamA == $teamB){
    	
    	header("Location: ../MatchSched.php?id=$eventid&id2=$sportsid");

    }else{
    $sql1 = "Insert Into tbl_schedule(MatchID,EventID,SportsID,Venue,Dates,StartTime,EndTime,TeamA,TeamB,MatchNo) Values ('$matchid','$eventid','$sportsid','$venue','$date','$stime','$etime','$teamA','$teamB','$match')";

  	$result1 = $link->query($sql1);
  	header("Location: ../MatchSched.php?id=$eventid&id2=$sportsid");

    }





	
  	
    include("../../../conn/close_connection.php");

?>