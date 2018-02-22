<?php   
include("../../../conn/connection.php");

$sname = $_POST['txtsname'];
$srule = $_POST['txtsrules'];
$scat = $_POST['txtscat'];
$stype = $_POST['txtstype'];

    $query = "SELECT * FROM tbl_sports";
        $result = mysqli_query($link, $query);
                    
        while($row = mysqli_fetch_assoc($result)){
                    $sportsid = $row['SportsID']; 
        }

        if($sportsid == ""){

      $sportsid = 1000 . "-Sports";

      }else{

      $sportsid = $sportsid + 1 . "-Sports";
      echo $sportsid;
      }

      $sql1 = "Insert Into tbl_sports(SportsID,SportsName,SportsRules,SportsCategory,SportsType) Values ('$sportsid','$sname','$srule','$scat','$stype')";

      $result1 = $link->query($sql1);

      header("location:../csport.php");




?>