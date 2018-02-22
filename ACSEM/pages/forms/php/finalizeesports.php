<?php
include("../../../conn/connection.php");

echo $eventid = $_POST['event1'];
echo $sportsid = $_POST['sports1'];
echo $elim = $_POST['elim1'];


$sql = "UPDATE `tbl_esports` SET `Elimination` = '$elim' WHERE `tbl_esports`.`EventID` = '$eventid' AND `SportsID` = '$sportsid' ";

$res = $link->query($sql);
header("Location: ../eventdetails.php?id=$eventid");

include("../../../conn/close_connection.php");
?>