<?php
	include("../../../conn/connection.php");

	echo $sportsid = $_POST['SportsID']; 
	echo $selim = "TBD";
	

	  $query = "SELECT * FROM tbl_event";
    $result = mysqli_query($link, $query);
	

    while($row = mysqli_fetch_assoc($result)){
    	$eventid = $row['EventID'];
    }
    if($eventid == ""){

    $eventid = "1000-Event";

    }else{

    $eventid = $eventid;
   
    }


  	$sql1 = "Insert Into tbl_esports(EventID,SportsID,Elimination) Values ('$eventid','$sportsid','$selim')";

  	$result1 = $link->query($sql1);

  	

  	


?>