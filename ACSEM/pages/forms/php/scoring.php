<?php
include("../../../conn/connection.php");

$matchid = $_POST['MatchID'];
$gameset = $_POST['GameSet'];
$score1 = $_POST['TScore1'];
$score2 = $_POST['TScore2'];
$status = $_POST['Status'];

$left = 0;
$right = 0;
	  
	 
		
	  $query = "SELECT * FROM tbl_gameplay Where MatchID = '$matchid' And GameSet = '$gameset'";
	  $result = mysqli_query($link, $query);

	  while($row = mysqli_fetch_assoc($result)){
	    	$gameid = $row['GameID'];
	    		
	  }
		

	  $sql = "UPDATE `tbl_gameplay` SET `TeamAscore` = '$score1', `TeamBscore` = '$score2', `Status` = '$status'  WHERE `tbl_gameplay`.`GameID` = '$gameid' ";
	

 	  $res = $link->query($sql);
 	 


	  	


include("../../../conn/close_connection.php");
?>