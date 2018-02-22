<?php
include("../../../conn/connection.php");

 echo $did = $_POST['DID'];
 echo $dcode= $_POST['Depcode'];
 echo $ddes = $_POST['Depdes'];
 echo $dcover = $_POST['Depcover'];
 $eventf = $_POST['Eventfile'];
 echo $file = substr($eventf,12);

  $query = "SELECT * FROM tbl_departments where DepID = '$did'  " ;
  $result = mysqli_query($link, $query);

  while($row = mysqli_fetch_assoc($result))
       {
        $Aphoto = $row['Deplogo'];
       }

  if(empty($file)){
  	
  	$file = $Aphoto;
  }


	$sql = "UPDATE `tbl_departments` SET `Depcode` = '$dcode', Depdes = '$ddes' , Deplogo = '$file' , Depcover = '$dcover' WHERE `tbl_departments`.`DepID` = '$did' ";
	

 	$res = $link->query($sql);
 	//header("Location: ../updatedepartment.php")

?>