<?php
include("../../../conn/connection.php");

echo $matchid = $_POST['MatchID'];
echo $status = "Done";
$save1 = "";
$save2 = "";
$show1 = 0;
$show2 = 0;
$points1 = 0;
$points2 = 1;
$pointsFinal1 = 0;
$pointsFinal2 = 0;
$check1 = 0;
$check2 = 0;
$checkpoint1 = 0;
$checkpoint2 = 0;


	  $query0 = "SELECT * FROM tbl_schedule Where MatchID = '$matchid' ";
	  $result0 = mysqli_query($link, $query0);

	  while($row = mysqli_fetch_assoc($result0)){
	    	$dep1 = $row['TeamA'];
	    	$dep2= $row['TeamB'];
	    	$eventid = $row['EventID'];
	    	$sportsid = $row['SportsID'];
	    	$matchno1 = $row['MatchNo'];	
	  }


	  $query0 = "SELECT * FROM tbl_schedule Where EventID = '$eventid' And SportsID = '$sportsid'";
	  $result0 = mysqli_query($link, $query0);

	  while($row = mysqli_fetch_assoc($result0)){
	    	
	  		$matchno2 = $row['MatchNo'];
	  }

	  $query0 = "SELECT * FROM tbl_gameplay Where MatchID = '$matchid' ";
	  $result0 = mysqli_query($link, $query0);

	  while($row = mysqli_fetch_assoc($result0)){
	  		
	    	$stat1 = $row['TeamAstat'];
	    	$stat2 = $row['TeamBstat'];

	    	$show1 = $show1 + $stat1;
	    	$show2 = $show2 + $stat2;
	    	
	  }
	  $query0 = "SELECT * FROM tbl_esports EventID = '$eventid' And SportsID = '$sportsid' ";
	  $result0 = mysqli_query($link, $query0);

	  while($row = mysqli_fetch_assoc($result0)){
	    	
	  		$elim = $row['Elimination'];
	  }
	  if($elim == "Double Elimination"){
	  		  if($matchno1 < $matchno2){
	  		  	
	  	 	  		$points1 = 1;
			  }else{
			  		$points1 = 2;
			  }
			  $points2 = 0;
			  if ($show1 > $show2){
			  	 $save1 = $dep1;
			  	 $save2 = $dep2;
			  	 $pointsFinal1 = $points1;
			  	 $pointsFinal2 = $points2;
			  }elseif ($show1 < $show2){
			  	 $save1 = $dep2;
			  	 $save2 = $dep1;
			  	 $pointsFinal1 = $points2;
			  	 $pointsFinal2 = $points1;
			  }elseif ($show1 == 0 AND $show2 == 0){
			  	 $save1 = "Default";
			  	 $save2 = "Default";
			  	 $pointsFinal1 = 0;
			  	 $pointsFinal2 = 0;
			  }
	  	
	  }else{
	  		  if($matchno1 < $matchno2){
	  	 	  $points1 = 2;
			  }else{
			  		$points1 = 2;
			  }

			  if ($show1 > $show2){
			  	 $save1 = $dep1;
			  	 $save2 = $dep2;
			  	 $pointsFinal1 = $points1;
			  	 $pointsFinal2 = $points2;
			  }elseif ($show1 < $show2){
			  	 $save1 = $dep2;
			  	 $save2 = $dep1;
			  	 $pointsFinal1 = $points2;
			  	 $pointsFinal2 = $points1;
			  }
			  elseif ($show1 == 0 AND $show2 == 0){
			  	 $save1 = "Default";
			  	 $save2 = "Default";
			  	 $pointsFinal1 = 0;
			  	 $pointsFinal2 = 0;
			  }
	  	
	  }

	  

	  echo $save1;
	  echo $save1;
	  

	 
	  $sql = "Insert Into tbl_points(ID,EventID,MatchID,SportsID,Depcode,Points) Values ('','$eventid','$matchid','$sportsid','$dep1','$pointsFinal1')";
	  $result1 = $link->query($sql);
	
	  
	  $sql = "Insert Into tbl_points(ID,EventID,MatchID,SportsID,Depcode,Points) Values ('','$eventid','$matchid','$sportsid','$dep2','$pointsFinal2')";
	  $result1 = $link->query($sql);

	  $sql = "UPDATE `tbl_schedule` SET `Winner` = '$save1', `Losser` = '$save2', `Status` = '$status'  WHERE `tbl_schedule`.`MatchID` = '$matchid' ";
 	  $res = $link->query($sql);

	  

 	  include("../../../conn/close_connection.php");
?>