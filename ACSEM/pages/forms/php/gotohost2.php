<?php
	include("../../../conn/connection.php");

	if (isset($_POST["run"])) {

		echo $matchid = $_POST['txtmatchid'];
		session_start();
		$_SESSION["matchid"] = $matchid;
		header("Location: ../hostgame2.php");
	}else if(isset($_POST["update"])) {
		echo $matchid = $_POST['txtmatchid'];
		echo $matchno = $_POST['txtmatchno'];
		echo $team1 = $_POST['txtteam1'];
		echo $team2 = $_POST['txtteam2'];

		$query = "SELECT * FROM tbl_schedule Where MatchID = '$matchid'";
	    $result = mysqli_query($link, $query);

	    while($row = mysqli_fetch_assoc($result)){
	      	$eventid = $row['EventID'];
	    }


		$sql = "UPDATE `tbl_schedule` SET `TeamA` = '$team1', TeamB = '$team2' WHERE `tbl_schedule`.`MatchID` = '$matchid' ";
	

 		$res = $link->query($sql);
 		header("Location: ../host2.php");
	}



	include("../../../conn/close_connection.php");
?>