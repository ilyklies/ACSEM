<?php 

	include("../../../conn/connection.php");

	//echo $id = $_GET['id'];
	//echo $id2 = $_GET['id2'];
	//echo $id3 = $_GET['id3'];
	//echo $id4 = $_GET['id4'];
    
    echo $id = $_POST['EID'];
    echo $id2 = $_POST['DID'];
    echo $id3 = $_POST['SID'];
    echo $id4 = $_POST['STID'];
	
	  $query2 = "SELECT * FROM tbl_esplayers where EventID = '$id' AND SportsID = '$id3' AND StudID = '$id4'" ;
    $result2 = mysqli_query($link, $query2);
    while($row = mysqli_fetch_assoc($result2)){
          $holder = "active";           
    }
    if($holder == "active"){
             //header("Location: ../addplayer.php?id=$id&id2=$id2&id3=$id3"); 
    }else{
             $sql1 = "Insert Into tbl_esplayers(EventID,SportsID,DepID,StudID) Values ('$id','$id3','$id2','$id4')";
  			     $result1 = $link->query($sql1);
  			 //header("Location: ../addplayer.php?id=$id&id2=$id2&id3=$id3");
    }


	

?>