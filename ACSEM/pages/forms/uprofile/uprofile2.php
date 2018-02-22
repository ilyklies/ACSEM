<?php 

  include("../../../conn/connection.php");

  session_start();
  echo $id = $_POST['Aid'];
  echo "</br>";
  echo $ffname = $_POST['Ffname'];
  echo "</br>";
  echo $fmname = $_POST['Fmname'];
  echo "</br>";
  echo $flname = $_POST['Flname'];
  echo "</br>";
  echo $abdate = $_POST['Abdate'];
  echo "</br>";
  echo $agender = $_POST['Agender'];
  echo "</br>";
  echo$auname = $_POST['Auname'];
  echo "</br>";
  echo $apword = $_POST['Apword']; 
  echo "</br>"; 
  $eventf = $_POST['Eventfile'];
  echo $file = substr($eventf,12);

  $query = "SELECT * FROM tbl_facilitator where FacilitatorID = '$id'  " ;
  $result = mysqli_query($link, $query);

  while($row = mysqli_fetch_assoc($result))
       {
        $Aphoto = $row['Fphoto'];
       }

  if(empty($file)){
  	
  	$file = $Aphoto;
  }

	
 

  $sql = "UPDATE `tbl_facilitator` SET `Ffname` = '$ffname',`Fmname` = '$fmname',`Flname` = '$flname',`Fbdate` = '$abdate', Fgender = '$agender' , Fusername = '$auname' , Fpassword = '$apword' , Fphoto = '$file' WHERE `tbl_facilitator`.`FacilitatorID` = '$id' ";
	

 	$res = $link->query($sql);

    include("../../../conn/close_connection.php");
?>