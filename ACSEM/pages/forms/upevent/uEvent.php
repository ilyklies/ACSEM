<?php 

	include("../../../conn/connection.php");

  session_start();
  $id = $_SESSION['evID'];
  $eventn = $_POST['Eventname'];
  $eventd = $_POST['Eventdes'];
  $events = $_POST['Eventsdate'];
  $evente = $_POST['Eventedate'];  
  $eventf = $_POST['Eventfile'];
  $file = substr($eventf,12);

  $query = "SELECT * FROM tbl_event where EventID = '$id'  " ;
  $result = mysqli_query($link, $query);

  while($row = mysqli_fetch_assoc($result))
       {
        $Aphoto = $row['Eventphoto'];
       }

  if(empty($file)){
    
    $file = $Aphoto;
  }

	
 

  $sql = "UPDATE `tbl_event` SET `EventName` = '$eventn', EventDescription = '$eventd' , EventStart = '$events' , EventEnd = '$evente' , Eventphoto = '$file' WHERE `tbl_event`.`EventID` = '$id' ";
	

 	$res = $link->query($sql);

    include("../../../conn/close_connection.php");
?>