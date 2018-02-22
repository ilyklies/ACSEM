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

      <h4><b>Overall Leader Board Points</b></h4>
      <table id="tableLeader" class="table"  >
                <tr> 
                  <th >Team</th>
                  <th >Points</th>
                  <th >Position</th>
                </tr>
                <?php
              while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    
                    echo "<td>" . $row['Depcode'] . "</td>";
                    echo "<td>" . $row['Points'] . "</td>";


                    echo "<td>" . $points . "</td>";
                  
                  $points = $points + 1;

                  
              }
            ?>
                
      </table>

      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->




</html>