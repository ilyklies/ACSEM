<?php

include("../../../conn/connection.php");

echo $eventid = $_POST['FM1'];
echo $sportsid = $_POST['FS1'];
echo $ffname = $_POST['Ffname'];
echo $fstatus = $_POST['Fstatus'];



$sql = "Insert Into tbl_sportreport(EventID,SportsID,FCname,Fstatus) Values ('$eventid','$sportsid','$ffname','fstatus')";
$result1 = $link->query($sql);

?>