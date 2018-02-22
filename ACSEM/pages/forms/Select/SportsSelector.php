<?php
include("../../../conn/connection.php");
$id = $_POST['Eventid'];
$sportsname = $_POST['Slist'];

session_start();
$_SESSION["id"] = $id ;
$_SESSION["sportn"] = $sportsname;

	

	$query1 = "SELECT * FROM tbl_sports Where SportsName = '$sportsname'" ;
    $result1 = mysqli_query($link, $query1);
    while($row = mysqli_fetch_assoc($result1)){
              
          $sportsid = $row['SportsID'];
         
                 
    }
	$query2 = "SELECT * FROM tbl_esports Where EventID = '$id' And SportsID = '$sportsid'";
    $result2 = mysqli_query($link, $query2);

    while($row = mysqli_fetch_assoc($result2)){
      $elimi = $row['Elimination'];
    }

    if($elimi == "Round Robin"){
    	header("Location: ../host.php");
    }elseif($elimi == "Double Elimination"){
    	header("Location: ../host2.php");
    }


?>