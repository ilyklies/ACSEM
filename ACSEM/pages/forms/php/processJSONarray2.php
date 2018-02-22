<?php
	include("../../../conn/connection.php");

	
	  echo $userid = $_POST['UserID'];
   	echo $sportsass = "TBD";
	  $query = "SELECT * FROM tbl_event";
    $result = mysqli_query($link, $query);
	

    while($row = mysqli_fetch_assoc($result)){
    	$eventid = $row['EventID'];
    }
    

    if($eventid == ""){

    $eventid = "1000-Event";

  	}else{

    $eventid = $eventid + 1 . "-Event";
   
  	}

  	$sql3 = "Insert Into tbl_efacilitators(EventID,SportsID,FacilitatorID) Values ('$eventid','$sportsass','$userid')";

  	$result3 = $link->query($sql3);
  	

  	


?>




  	