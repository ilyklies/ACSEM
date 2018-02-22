<?php
include("../../../conn/connection.php");


$matchid = $_POST['MatchID'];
$gameset = $_POST['GameSet'];
$studid = $_POST['PlayerID'];
$depcode = $_POST['DepCode'];


			$query = "SELECT * FROM tbl_esplaying Where MatchID = '$matchid' AND StudID = '$studid'";
		    $result = mysqli_query($link, $query);

			while($row = mysqli_fetch_assoc($result)){
		    	$holder = "Active";
		    }
		    if($holder == "Active"){
		    	
		    	echo "done already";
		    }else{
		    	$sql1 = "Insert Into tbl_esplaying(MatchID,StudID,GameSet,Depcode) Values ('$matchid','$studid','$gameset','$depcode')";

  			    $result1 = $link->query($sql1);	

		    }
    

			



include("../../../conn/close_connection.php");
?>