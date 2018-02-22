<?php 

  include("../../../conn/connection.php");

  session_start();
  echo $id = $_POST['Aid'];
  echo "</br>";
  echo $afname = $_POST['Afname'];
  echo "</br>";
  echo $amname = $_POST['Amname'];
  echo "</br>";
  echo $alname = $_POST['Alname'];
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

  $query = "SELECT * FROM tbl_admin where AdminID = '$id'  " ;
  $result = mysqli_query($link, $query);

  while($row = mysqli_fetch_assoc($result))
       {
        $Aphoto = $row['Aphoto'];
       }

  if(empty($file)){
  	
  	$file = $Aphoto;
  }

	
 

  $sql = "UPDATE `tbl_admin` SET `Afname` = '$afname',`Amname` = '$amname',`Alname` = '$alname',`Bdate` = '$abdate', Gender = '$agender' , Ausername = '$auname' , Apassword = '$apword' , Aphoto = '$file' WHERE `tbl_admin`.`AdminID` = '$id' ";
	

 	$res = $link->query($sql);

    include("../../../conn/close_connection.php");
?>