<?php
include("../../../conn/connection.php");

$matchid = $_POST['MatchID'];
$gameset = $_POST['GameSet'];
$score1 = $_POST['TScore1'];
$score2 = $_POST['TScore2'];
$status = $_POST['Status'];

$left = 0;
$right = 0;
$show1 = 0;
$show2 = 0;
	  
	 
	  
	  $query0 = "SELECT * FROM tbl_schedule Where MatchID = '$matchid' ";
	  $result0 = mysqli_query($link, $query0);

	  while($row = mysqli_fetch_assoc($result0)){
	    	$dep1 = $row['TeamA'];
	    	$dep2= $row['TeamB'];
	    	
	    	
	  }
		
	  $query = "SELECT * FROM tbl_gameplay Where MatchID = '$matchid' And GameSet = '$gameset'";
	  $result = mysqli_query($link, $query);

	  while($row = mysqli_fetch_assoc($result)){
	    	$gameid = $row['GameID'];
	    	
	    	
	  }
	  


	  $query0 = "SELECT * FROM tbl_gameplay Where GameID = '$gameid' ";
	  $result0 = mysqli_query($link, $query0);

	  while($row = mysqli_fetch_assoc($result0)){
	  		$team1 = $row['TeamAscore'];
	    	$team2 = $row['TeamBscore'];
	    	$stat1 = $row['TeamAstat'];
	    	$stat2 = $row['TeamBstat'];

	    	if($team1 > $team2){
	    		 $left = $stat1 + 1;
	    		
	    	}elseif($team1 < $team2){
	    		 $right = $stat2 + 1;
	    	}elseif($team1 == 0 AND $team2 == 0){
	    		 $left = 0;
	    		 $right = 0;
	    	}

	    	
	  }

	  

	  $sql = "UPDATE `tbl_gameplay` SET `TeamAscore` = '$score1', `TeamBscore` = '$score2', `Status` = '$status' , `TeamAstat` = '$left' , `TeamBstat` = '$right'  WHERE `tbl_gameplay`.`GameID` = '$gameid' ";
	

 	  $res = $link->query($sql);

 	  $query0 = "SELECT * FROM tbl_gameplay Where MatchID = '$matchid' ";
	  $result0 = mysqli_query($link, $query0);

	  while($row = mysqli_fetch_assoc($result0)){
	  		
	    	$stat1 = $row['TeamAstat'];
	    	$stat2 = $row['TeamBstat'];

	    	$show1 = $show1 + $stat1;
	    	$show2 = $show2 + $stat2;
	    	
	  }

	  echo $dep1 . " " . $show1;
	  echo " - ";
	  echo $dep2 . " " . $show2;
 	 


	  	


include("../../../conn/close_connection.php");
?>