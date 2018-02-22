
<?php
include("../../../conn/connection.php");

echo $eventid = $_POST['EventID'];
echo $faci = $_POST['Faci'];
echo $sportsid = $_POST['Sports'];



$sql = "UPDATE `tbl_efacilitators` SET `SportsID` = '$sportsid' WHERE `tbl_efacilitators`.`EventID` = '$eventid' AND `FacilitatorID` = '$faci' ";

$res = $link->query($sql);
header("Location: ../eventdetails.php?id=$eventid");

include("../../../conn/close_connection.php");
?>
