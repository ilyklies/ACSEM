<?php
	include("../../../conn/connection.php");

	
	  echo $depid = $_POST['DepID'];

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

  	$sql2 = "Insert Into tbl_edepartments(EventID,DepID) Values ('$eventid','$depid')";

  	$result2 = $link->query($sql2);
  	

  	


?>