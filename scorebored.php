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
    $show1 = 0;
    $show2 = 0;

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
                    $query2 = "SELECT * FROM tbl_schedule Where EventID = '$id' And SportsID = '$id3'";
                    $result2 = mysqli_query($link, $query2);
                              while($row = mysqli_fetch_assoc($result2)){
                              
                              $sportsid = $row['SportsID'];
                              $matchid = $row['MatchID'];
                              $teama = $row['TeamA'];
                              $teamb = $row['TeamB'];
                              $matchno = $row['MatchNo'];


                              if($teama == $depcode1 || $teamb == $depcode1){
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

                                    <div class="box box-danger">
                                    <div class="box-header with-border" style="max-height:250px;min-height:150px;">
                                      
                                      </br>
                                      </br>
                                      
                                      <div class="col-md-12 col-sm-12 col-xs-12">

                                      <div class="col-md-4 col-sm-4 col-xs-4">

                                      <div class="col-md-6 col-sm-6 col-xs-12">

                                      <ul class="users-list clearfix">
                                        <li>
                                          
                                          <h4><?php echo $teama ?></h4>
                                        </li>
                                      </ul>

                                      </div>

                                      <div class="col-md-6 col-sm-6 col-xs-12">

                                      <input type="text" style="width: 100%; height: 100%; font-size: 30px; line-height: 18px;padding:1px; text-align:center;" id="Score1" value="<?php echo $teamascore ?>"  readonly>

                                      </div>
                                      
                                       
                                      </div>

                                      <div class="col-md-2 col-md-push-1 col-sm-2 col-sm-push-1 col-xs-3 col-xs-push-1 ">
                                      <h3 Align="center">VS</h3>
                                      <h4 align="center"> <small><?php echo "Match no: " . $matchno ?></small></h4>
                                      <h4 align="center"><small><?php echo $gameset ?></small></h4>
                                      </div>

                                      <div class="col-md-4 col-md-push-1 col-sm-4 col-sm-push-1 col-xs-4 col-xs-push-1" >
                                      
                                       <div class="col-md-6 col-sm-6 col-xs-12">

                                      <ul class="users-list clearfix">
                                        <li>
                                          
                                          <h4><?php echo $teamb ?></h4>
                                        </li>
                                      </ul>

                                      </div>

                                      <div class="col-md-6 col-sm-6 col-xs-12">

                                      
                                      <input type="text" style="width:100%; height: 100%; font-size: 30px; line-height: 18px;padding:1px; text-align:center;" id="Score1" value="<?php echo $teambscore ?>"  readonly>
                                     
                                      
                                      </div>

                                      </div>

                                      </div><!-- /.col12 -->


                                       <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                      </div>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body no-padding">

                                    <div class="row">
                                    <div class="col-md-11 col-md-push-1 col-sm-11 col-sm-push-1 col-xs-11 col-xs-push-1">
                                    <h4><small><b>Standings</b></small></h4> 
                                    <?php 
                                    $query0 = "SELECT * FROM tbl_gameplay Where MatchID = '$matchid' ";
                                    $result0 = mysqli_query($link, $query0);

                                    while($row = mysqli_fetch_assoc($result0)){
                                          
                                          $stat1 = $row['TeamAstat'];
                                          $stat2 = $row['TeamBstat'];

                                          $show1 = $show1 + $stat1;
                                          $show2 = $show2 + $stat2;
                                          
                                    }

                                    ?>
                                    <div class="col-md-5 col-sm-5 col-xs-5">
                                    <?php  echo "<b>" . $teama . "</b>" . ": --- " . $show1;?>
                                    </div>
                                    <div class="col-md-5 col-sm-5 col-xs-5">
                                    <?php  echo "<b>" . $teamb . "</b>" . ": --- " . $show2;?>
                                    </div>
                                    </div>

                                    <div class="col-md-11 col-md-push-1 col-sm-11 col-sm-push-1 col-xs-11 col-xs-push-1">
                                    <h4><small><b>Previous Set/Game</b></small></h4>
                                    <?php
                                     $query5 = "SELECT * FROM tbl_gameplay Where MatchID = '$matchid' and Status = 'Done'";
                                     $result5 = mysqli_query($link, $query5);

                                     while($row = mysqli_fetch_assoc($result5)){
                                      
                                     ?>
                                     
                                          <div class="row">
                                          <div class="col-md-2 col-sm-2 col-xs-2">
                                          <?php echo "<b>" . $row['GameSet'] . "</b>";?>
                                          </div>
                                          

                                          <div class="col-md-3 col-md-push-1  col-sm-3 col-sm-push-1  col-xs-3 col-xs-push-1 ">
                                          <?php echo "<b>" . $teama . "</b>" . " " . $row['TeamAscore'];?>
                                          </div>

                                          <div class="col-md-3 col-md-push-1  col-sm-3 col-sm-push-1  col-xs-3 col-xs-push-1 ">
                                          <?php echo "<b>" . $teamb . "</b>" . " " . $row['TeamBscore'];?></div>
                                          </div>
                                     
                                     <?php 

                                     }

                                    ?>
                                    

                                    </div>
                                    </div>

                                    <?php

                                     }    


                              }else{
                                  


                              }


                              
                                    
                }?>

</body>
</html>
