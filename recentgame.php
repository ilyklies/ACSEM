<?php
 include("ACSEM/conn/connection.php");
 session_start();
 $id = $_SESSION['id'];

    date_default_timezone_set('Asia/Manila');


    // Prints something like: Monday
    
    $today = date("m/d/Y");
    //$today = "10/09/2017"; 

?>

<html>
<body style="margin:auto;">
<h2 style="text-align:center;"><img src="images/ar.png" style="padding:0;margin: 0 10px 0 40px;width:43px;height:45px;">Recent Games Today</h2><br>


   <!--   -->

                                    <table class="table">
                                      <thread>
                                        <tr>
                                          <th>Sport</th>
                                          <th>Winning Team</th>
                                          <th>Lossing Team</th>
    
                                        </tr>
                                      </thread>
               <?php
                    $query2 = "SELECT * FROM tbl_schedule Where EventID = '$id' and Status = 'Done' and Dates = '$today'";
                    $result2 = mysqli_query($link, $query2);
                              while($row = mysqli_fetch_assoc($result2)){
                              
                              $sportsid = $row['SportsID'];
                              $matchid = $row['MatchID'];
                              $teama = $row['TeamA'];
                              $teamb = $row['TeamB'];
                              $winner = $row['Winner'];
                              $losser = $row['Losser'];


                              $query3 = "SELECT * FROM tbl_sports Where SportsID = '$sportsid'";
                              $result3 = mysqli_query($link, $query3);
                              while($row = mysqli_fetch_assoc($result3)){
             						
                              	$sportsname = $row['SportsName'];
                              
                              }
                              $query4 = "SELECT * FROM tbl_gameplay Where MatchID = '$matchid'";
                                     $result4 = mysqli_query($link, $query4);

                                     while($row = mysqli_fetch_assoc($result4)){
                                          
                                          $gameid = $row['GameID'];
                                          $teamascore = $row['TeamAscore'];
                                          $teambscore = $row['TeamBscore'];
                                          $gameset = $row['GameSet'];
                                          $teamastat = $row['TeamAstat'];
                                          $teambstat = $row['TeamBstat'];


                                    ?>

                                    
                                      <tbody>
                                        <tr>
                                          <th><?php echo $sportsname ?></th>
                                          <th><?php echo $winner ?></th>
                                          <th><?php echo $losser ?></th>
                                        </tr>
                                      </tbody>
                                    


                                    <?php

                                     }
                                    
                }?>
</table>
</body>
</html>