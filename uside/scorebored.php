<?php
 include("ACSEM/conn/connection.php");
 session_start();
 date_default_timezone_set('Asia/Manila');

    //$today = date("m/d/Y"); 
    $today = "10/09/2017";
    $StartDate =  date("m/d/Y",strtotime('monday this week'));
    $Enddate = date("m/d/Y",strtotime('sunday this week'));

    $id = $_SESSION['id'];
    $id2 =  $_SESSION['id2'];
    $id3 =  $_SESSION['id3'];

    $query1 = "SELECT * FROM tbl_departments Where DepID = '$id2'";
    $result1 = mysqli_query($link, $query1);
    while($row = mysqli_fetch_assoc($result1))
          {
               $deplogo = $row['Deplogo'];
               $depcode1 = $row['Depcode'];
          }
?>

<html>
<body>


   <!--   -->
              <?php
                    $query2 = "SELECT * FROM tbl_schedule Where EventID = '$id'";
                    $result2 = mysqli_query($link, $query2);
                              while($row = mysqli_fetch_assoc($result2)){
                              
                              $sportsid = $row['SportsID'];
                              $matchid = $row['MatchID'];
                              $teama = $row['TeamA'];
                              $teamb = $row['TeamB'];


                              $query3 = "SELECT * FROM tbl_sports Where SportsID = '$sportsid'";
                              $result3 = mysqli_query($link, $query3);
                              while($row = mysqli_fetch_assoc($result3)){
                        
                                $sportsname = $row['SportsName'];
                              
                              }
                              $query4 = "SELECT * FROM tbl_gameplay Where MatchID = '$matchid' and Status = 'NotDone'";
                                     $result4 = mysqli_query($link, $query4);

                                     while($row = mysqli_fetch_assoc($result4)){
                                          
                                          $gameid = $row['GameID'];
                                          $teamascore = $row['TeamAscore'];
                                          $teambscore = $row['TeamBscore'];
                                          $gameset = $row['GameSet'];
                                          $teamastat = $row['TeamAstat'];
                                          $teambstat = $row['TeamBstat'];


                                    ?>

                                    <div class="row" style="height:300px;">
                                        <div class="col-sm-5">
                                          <h1 style="font-size: 75px;color: blue;"> <?php echo $teamascore ?> </h1>
                                          <h3><?php echo $teama ?></h3>
                                        </div>

                                        <div class="col-sm-2">
                                          <br>
                                          <h1> <?php echo $sportsname ?></h1>
                                          <h3> <?php echo $gameset ?> </h3>
                                          <h2> VS </h2>
                                        </div>

                                        <div class="col-sm-5">
                                          <h1 style="font-size: 75px;color: blue;"> <?php echo $teambscore ?> </h1>
                                          <h3><?php echo $teamb ?></h3>
                                        </div>

                                    </div>

                                    <?php

                                     }
                                    
                }?>

</body>
</html>
