 <?php
session_start();

$id = $_SESSION['id'];
?>

<?php
include("ACSEM/conn/connection.php");
    
    $elimi = "";
    $counter = 0;
    $teama = "";
    $teamb = "";
    $points = 0;
    $holder = 0;
    $type = "";
    $option1 = 5;
    $option2 = 10;
    $points1 = 1;
    $points = 0;
    $holder = 0;
    $finalpoints = array();

    
    date_default_timezone_set('Asia/Manila');


    // Prints something like: Monday
    
    $today = date("m/d/Y"); 

    $points = 1;

  $query = "SELECT * FROM tbl_event WHERE EventID = '$id' ";
  $result = mysqli_query($link, $query);
    if(!$result){
        header("Location: error/404.html");
    }
    while($row = mysqli_fetch_assoc($result)){
          
          $eventname = $row['EventName'];    
    }
  $query = "SELECT * FROM tbl_sportpoints WHERE EventID = '$id' ORDER BY Points DESC";
  $result = mysqli_query($link, $query);
?>

<html>
<h2 style="text-align:center;"><img src="images/acsemlogo.png" style="padding:0;margin: 0 10px 0 40px;width:43px;height:45px;">OVERALL LEADERBOARD</h2><br>
    

    <div class="row">

      <div class="col-md-10 col-md-push-1">
      </br>

      <h3><b style="color:#031b59;">Overall Leader Board Points</b></h3>
      <table id="tableLeader" class="table"  >
                <tr> 
                  <th bgcolor="#b0bad4">Team</th>
                  <th bgcolor="#b0bad4">Points</th>
                  <th bgcolor="#b0bad4">Position</th>
                </tr>
                <?php
                    $query3 = "SELECT * FROM tbl_edepartments Where EventID = '$id'";
                    $result3 = mysqli_query($link, $query3);
                              while($row = mysqli_fetch_assoc($result3)){
                              
                              $depid = $row['DepID'];

                                    $query4 = "SELECT * FROM tbl_departments Where DepID = '$depid'";
                                    $result4 = mysqli_query($link, $query4);
                                    while($row = mysqli_fetch_assoc($result4)){
                                           echo "<tr>";
                                           $depcode = $row['Depcode'];
                                           
                                           echo "<td style="."color:#031b59;".">" ."<b>".$row['Depcode']."</b>". "</td>";

                                           
                                    
                                    }
                                    $query4 = "SELECT * FROM tbl_sportpoints Where Depcode = '$depcode' And EventID = '$id' ";
                                    $result4 = mysqli_query($link, $query4);
                                    while($row = mysqli_fetch_assoc($result4)){
                                          $points = $points + $row['Points'];
                                          
                                          $holder = $points;
                                    }
                                     $points = 0;
                                     $finalpoints[$depcode] = $holder;
                                     if ($holder == 0) {
                                      $points1 = 0;
                                     }
                                     //$finalpoints = array($depcode=>$holder);
                                     //$arraycount = $arraycount + 1;
                                     echo "<td style="."color:#031b59;".">" ."<b>". $holder ."</b>". "</td>";
                                     
                                     $holder = 0;
                                     echo "<td style="."color:#031b59;".">" ."<b>". $points1 ."</b>". "</td>";
                  
                                     $points1 = $points1 + 1;


                              }


                
            ?>
                
      </table>

      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->




</html>