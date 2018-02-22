<?php
include("../../../conn/connection.php");

$matchid = $_POST['MatchID'];

$status = "Done";
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

$Loss = 2;
$counter = 0;
$counter2 = 0;
$rank;
$mat = 0;
$HoldRank = 0;
$array = array();

      $query0 = "SELECT * FROM tbl_schedule Where MatchID = '$matchid' ";
	  $result0 = mysqli_query($link, $query0);

	  while($row = mysqli_fetch_assoc($result0)){
	    	$dep1 = $row['TeamA'];
	    	$dep2= $row['TeamB'];
	    	$eventid = $row['EventID'];
	    	$sportsid = $row['SportsID'];
	    	$matchno1 = $row['MatchNo'];

	    	$winner = $row['Winner'];
	    	$losser = $row['Losser'];	
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

	 
	 

	  $sql = "UPDATE `tbl_schedule` SET `Winner` = '$save1', `Losser` = '$save2', `Status` = '$status'  WHERE `tbl_schedule`.`MatchID` = '$matchid' ";
 	  $res = $link->query($sql);


//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>Identify Loser And Winner>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

 	  $query4 = "SELECT * FROM tbl_schedule Where MatchID = '$matchid' ";
	  $result4 = mysqli_query($link, $query4);

	  while($row = mysqli_fetch_assoc($result4)){
	  		$winner = $row['Winner'];
	    	$losser = $row['Losser'];		
	  }



//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>LOSE COUNTER>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	  $query2 = "SELECT * FROM tbl_schedule Where EventID = '$eventid' And SportsID = '$sportsid' And Losser = '$losser'";
	  $result2 = mysqli_query($link, $query2);

	  while($row = mysqli_fetch_assoc($result2)){
	    	
	  		$counter = $counter + 1; //Loss count loop
	  }
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>MATCH COUNTER>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

	  $query1 = "SELECT * FROM tbl_schedule Where EventID = '$eventid' And SportsID = '$sportsid'";
	  $result1 = mysqli_query($link, $query1);

	  while($row = mysqli_fetch_assoc($result1)){
	    	
	  		$counter2 = $row['MatchNo'];  
	  		$mat = $row['MatchNo'];   //All Matches
	  }
	  $counter2 = $counter2 - 1;  //2nd to the Last Match

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>RANK COUNTER>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

	  $query3 = "SELECT * FROM tbl_rank Where EventID = '$eventid' And SportsID = '$sportsid'";
	  $result3 = mysqli_query($link, $query3);

	  if(empty($result3)){

	  		$rank = 1;
	  
	  }else{
	  		while($row = mysqli_fetch_assoc($result3)){
	    	
	  			$HoldRank = $row['Rank'];
	  			$array[] = $row['Rank'];
	  		
	  		}
	  		sort($array);
	  		$rank = end($array) + 1;
	  			
	  }

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>RANK SAVER>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

	  if( $matchno1 ==  $counter2){ //2nd to the Last Match Rank SAVE
	  		if ($counter == 2){
			  	  $sql = "Insert Into tbl_rank(EventID,SportsID,Depcode,Rank) Values ('$eventid','$sportsid','$losser','$rank')";
			  	  $result1 = $link->query($sql);
			  	  $rank = $rank + 1;
			  	  $sql = "Insert Into tbl_rank(EventID,SportsID,Depcode,Rank) Values ('$eventid','$sportsid','$winner','$rank')";
			  	  $result1 = $link->query($sql);  
			 }else{
			  	
			 }

	  }elseif($matchno1 ==  $mat){ //Last Match Rank Save
	  		if ($counter == 2){
			  	  $sql = "Insert Into tbl_rank(EventID,SportsID,Depcode,Rank) Values ('$eventid','$sportsid','$losser','$rank')";
			  	  $result1 = $link->query($sql);
			  	  $rank = $rank + 1;
			  	  $sql = "Insert Into tbl_rank(EventID,SportsID,Depcode,Rank) Values ('$eventid','$sportsid','$winner','$rank')";
			  	  $result1 = $link->query($sql);  
			 }else{
			  	
			 }	

	  }elseif($matchno1  <  $counter2){//Below 2nd to the last match Rank Save
	  		 if ($counter == 2){
			  	  $sql = "Insert Into tbl_rank(EventID,SportsID,Depcode,Rank) Values ('$eventid','$sportsid','$losser','$rank')";
			  	  $result1 = $link->query($sql);  
			  }else{
			  	
			  }

	  }
	 
	 
	  

include("../../../conn/close_connection.php");
?>