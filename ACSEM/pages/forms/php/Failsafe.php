<?php
include("../../../conn/connection.php");

echo $matchid = $_POST['MatchID1'];
echo $matchno = $_POST['MatchNo'];
echo $winner = $_POST['Winner'];
echo $loser = $_POST['Loser'];
echo $remarks = $_POST['Remarks'];
echo $status = "Done";

	  

	  $sql = "UPDATE `tbl_schedule` SET `Winner` = '$winner', `Losser` = '$loser', `Status` = '$status'  WHERE `tbl_schedule`.`MatchID` = '$matchid' AND `MatchNo` = '$matchno'";
	

 	  $res = $link->query($sql);

 	  $sql1 = "Insert Into tbl_remarks(MatchID,Remarks) Values ('$matchid','$remarks')";

  	  $result1 = $link->query($sql1);
  	  header("Location: ../host.php");

 	  include("../../../conn/close_connection.php");
?>