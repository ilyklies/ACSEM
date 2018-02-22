<?php
include("../../../conn/connection.php");

$matchid = $_POST['MatchID'];
$gameset = $_POST['GameSet'];
$score1 = 0;
$score2 = 0;
$stat1 = 0;
$stat2 = 0;

		

		$query = "SELECT * FROM tbl_gameplay";
	    $result = mysqli_query($link, $query);

		while($row = mysqli_fetch_assoc($result)){
	    	$gameid = $row['GameID'];
	    	
	    }
	    

	    if($gameid == ""){

	    $gameid = "1000-Game";

	  	}else{

	    $gameid = $gameid + 1 . "-Game";
	   
	  	}

	  	$query0 = "SELECT * FROM tbl_gameplay Where MatchID = '$matchid' AND GameSet = '$gameset'";
	    $result0 = mysqli_query($link, $query0);

	    while($row = mysqli_fetch_assoc($result0)){
	    	$holder = "Active";

	    }

	    if($holder == "Active"){
	    	
	    	echo "Set Already Exist";
	    }else{
	    	$sql1 = "Insert Into tbl_gameplay(GameID,MatchID,TeamAscore,TeamBscore,GameSet,TeamAstat,TeamBstat) Values ('$gameid','$matchid','$score1','$score2','$gameset','$stat1','$stat2')";

  		$result1 = $link->query($sql1);	

	    }


	  	


include("../../../conn/close_connection.php");

?>