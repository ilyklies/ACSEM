<?php 

	include("../../../conn/connection.php");

  $eventn = $_POST['Eventname'];
  $eventd = $_POST['Eventdes'];
  $events = $_POST['Eventsdate'];
  $evente = $_POST['Eventedate'];  
  $eventf = $_POST['Eventfile'];
  $file = substr($eventf,12);

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
  	echo $eventid;
  	echo $eventn;
  	echo $eventd;
  	echo $events;
  	echo $evente;
  	echo $file;

  	$sql1 = "Insert Into tbl_event(EventID,EventName,EventDescription,EventStart,EventEnd,Eventphoto) Values ('$eventid','$eventn','$eventd','$events','$evente','$file')";

  	$result1 = $link->query($sql1);

    include("../../../conn/close_connection.php");
?>