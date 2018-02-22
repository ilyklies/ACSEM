<?php 
 include("ACSEM/conn/connection.php");
 session_start();
 date_default_timezone_set('Asia/Manila');

    $today = date("m/d/Y"); 
    //$today = "10/09/2017";
    $StartDate =  date("m/d/Y",strtotime('monday this week'));
    $Enddate = date("m/d/Y",strtotime('sunday this week'));
    //$StartDate = "10/09/2017";
    //$Enddate =  "10/15/2017";
    if(empty($_SESSION['id']) && empty($_SESSION['id2']) && empty($_SESSION['id3'])) {
        header("Location: index.php");
    }else{
        $id = $_SESSION['id'];//eventid
        $id2 =  $_SESSION['id2'];//departmentid
        $id3 =  $_SESSION['id3'];//sportsid
    }

 
 $count = 1;
 $counts = 1;
 $counter = 0;
 $venue = "";
 $day1 = 0;
 $day2 = 0;
 $day3 = 0;
 $day4 = 0;
 $day5 = 0;
 $day6 = 0;
 $day7 = 0;
 $x = 0;

  		  $query1 = "SELECT * FROM tbl_departments Where DepID = '$id2'";
        $result1 = mysqli_query($link, $query1);
          while($row = mysqli_fetch_assoc($result1))
          {
          	   $deplogo = $row['Deplogo'];
          	   $depcode1 = $row['Depcode'];
          }
        $query2 = "SELECT * FROM tbl_sports Where SportsID = '$id3'";
        $result2 = mysqli_query($link, $query2);
          while($row = mysqli_fetch_assoc($result2))
          {
          	   $sportsn = $row['SportsName'];
          	   $cat = $row['SportsCategory'];	
          }
        $query5 = "SELECT * FROM tbl_event Where EventID = '$id'";
        $result5 = mysqli_query($link, $query5);

        while($row = mysqli_fetch_assoc($result5)){
          $startd = $row['EventStart'];
          $endd = $row['EventEnd'];
        }


    $StartDate =  date("m/d/Y",strtotime('monday this week'));
    $Enddate = date("m/d/Y",strtotime('sunday this week'));

    $begin = new DateTime($startd);
    $end = new DateTime($endd);
    $end = $end->modify( '+1 day' );

    $diff = $end->diff($begin)->format("%a");

    $daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);

    foreach($daterange as $date){
        $day[$counts] = $date->format("m/d/Y");
        $counts++; 
    }
    
    
    
         
    $query0 = "SELECT * FROM tbl_schedule Where EventID = '$id' And SportsID = '$id3'";
    $result0 = mysqli_query($link, $query0);

    while($row = mysqli_fetch_assoc($result0)){
      $matchno = $row['MatchNo'];
      $venue = $row['Venue'];
      $count = $matchno + 1  ;
    }
  
 ?> 

<!DOCTYPE html>
<html lang="en">
<head>

  <title> ACSEM - Asian College Sports and Event Manager </title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" style="text/css" href="style.css" >
  <link rel="shortcut icon" href="ACSEM/images/ar.png" type="image/x-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="ACSEM/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="ACSEM/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="ACSEM/plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="ACSEM/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="ACSEM/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="ACSEM/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="ACSEM/plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="ACSEM/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="ACSEM/dist/css/skins/_all-skins.min.css">

  <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="script.js"></script>


</head>


<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<div id="fb-root"></div>


<nav class="navbar navbar-default navbar-fixed-top" style="margin: 0; background-color: rgba(60,141,181,0.9);z-index:9999;border:0;font-size: 12px !important; letter-spacing: 4px; border-radius: 0; font-family: Montserrat, sans-serif;">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      
      <a class="navbar-brand" href="depland.php" style="padding:4px 0 0 0;"> <img src="images/Fiacsem.png" alt="logo" style="height:45px;width:145px;"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        
      </ul>
    </div>
  </div>
</nav>

<div id="landing" class="container-fluid">
	
<div class="row">
	<div class="col-md-4 col-md-push-1">
	<h3><?php echo $sportsn ;?> <small><?php echo $cat;?></small></h3>
</div>
<div class="row">
	<div class="col-md-12 col-sm-12">

	<div class="col-md-8 col-md-push-2 col-sm-8 col-sm-push-2" style="max-height:570px;min-height:470px;">
	<h3>Live Sports</h3>
            <div class="box box-info" style="max-height:350px;min-height:320px;">
              <div class="box-header">
                <i class="fa  fa-soccer-ball-o"></i>

                <h3 class="box-title"></h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                  
                </div>
                <!-- /. tools -->
              </div>
                <div class="box-body" id="scores">
            
            

                
                   
                  
                </div>
                <!-- /.box-body -->
                
                <!-- /.box-footer -->
              </div>
              <!--/.box -->

            
            </div><!-- /. box-body -->
          </div> <!-- /. box-info --> 
	</div>
	</div><!--Col-12-->
</div><!--row-->



<div class="row">
	<div class="col-md-12 col-sm-12">
	
	<div class="col-md-10 col-md-push-1 col-sm-10 col-sm-push-1" style="max-height:470px;min-height:470px;">
	<h3>Recent Games</h3>
         <div class="box box-info" >
            <div class="box-header">
              <i class="fa  fa-hourglass-2"></i>

              <h3 class="box-title"></h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body" style="max-height:350px;min-height:350px;  overflow-y: scroll; overflow-x: hidden;">
          
              </br>
              <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12" style="max-height:300px;min-height-300px;">
                <?php
                    $query2 = "SELECT * FROM tbl_schedule Where EventID = '$id' and Status = 'Done' And SportsID = '$id3'";
                    $result2 = mysqli_query($link, $query2);
                              while($row = mysqli_fetch_assoc($result2)){
                              $sportsid = $row['SportsID'];
                              $winner = $row['Winner'];
                              $losser = $row['Losser'];
                              $matchno = $row['MatchNo'];
                              $mID = $row['MatchID'];
                              $team1A = $row['TeamA'];
                              $team2B = $row['TeamB'];
                              $query3 = "SELECT * FROM tbl_sports Where SportsID = '$sportsid'";
                              $result3 = mysqli_query($link, $query3);
                              while($row = mysqli_fetch_assoc($result3)){
                                    $sportsname = $row['SportsName'];
                                   

                              ?>
                               <div class="box box-default collapsed-box">
                                  <div class="box-header with-border">
                                  
                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                      <div class="col-md-2 col-sm-2 col-xs-4"><b><?php echo $sportsname?></b></div>
                                      <div class="col-md-2 col-sm-2 col-xs-2">Match no:<?php echo $matchno?></div>
                                      <div class="col-md-2 col-sm-2 col-xs-3">Winner: <?php echo $winner?></div>
                                      <div class="col-md-2 col-sm-2 col-xs-3">Loser: <?php echo $losser?></div>
                                  </div>

                                    <div class="box-tools pull-right">
                                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                      </button>
                                    </div>
                                    <!-- /.box-tools -->
                                  </div>
                                  <!-- /.box-header -->
                                  <div class="box-body">
                                    <div class="row">
                                    <div class="col-md-12">
                                    <div class="col-md-3"><h4><small><b>Details</b></small></h4></div>
                                    </div>
                                     </div>
                                    

                                    <?php
                                     $query4 = "SELECT * FROM tbl_gameplay Where MatchID = '$mID' and Status = 'Done'";
                                     $result4 = mysqli_query($link, $query4);

                                     while($row = mysqli_fetch_assoc($result4)){
                                          
                                          $gameid = $row['GameID'];
                                          $teamascore = $row['TeamAscore'];
                                          $teambscore = $row['TeamBscore'];
                                          $gameset = $row['GameSet'];
                                          $teamastat = $row['TeamAstat'];
                                          $teambstat = $row['TeamBstat'];
                                          ?>
                                          <div class="col-md-12 col-sm-12 col-xs-12">
                                              <div class="col-md-2 col-sm-2 col-xs-2"><b><?php echo $gameset?></b></div>
                                              <div class="col-md-3 col-sm-3 col-xs-3"><b>Team :</b> <?php echo $team1A?>&nbsp<b>Score:</b> <?php echo $teamascore?></div>
                                              <div class="col-md-2 col-sm-2 col-xs-2"></div>
                                              <div class="col-md-3 col-sm-3 col-xs-3"><b>Team :</b> <?php echo $team2B?>&nbsp<b>Score:</b> <?php echo $teambscore?></div>
                                              
                                          </div>

                                          <?php
                                          

                                    }
                                    ?>
                                  </div>
                                  <!-- /.box-body -->
                                </div>
                                <!-- /.box -->


                              <?php      
                              }
                     }?>




               
               



              </div>
              </div>
            
            </div><!-- /. box-body -->
          </div> <!-- /. box-info -->	
  </div>
	</div>
</div><!--row-->


<div class="row">
	<div class="col-md-12 col-sm-12">

	<div class="col-md-10 col-md-push-1 col-sm-10 col-sm-push-1" style="max-height:470px;min-height:470px;">
		
		<div class="nav-tabs-custom nav-info">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#today" data-toggle="tab"><b>Today</b></a></li>
              <li><a href="#all" data-toggle="tab"><b>All</b></a></li>
              <li class="pull-left header"><i class="fa fa-inbox"></i> Schedules</li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="today" style="position: relative; height: 450px;">
              
              	 <div class="box">
		            <div class="box-header" style="background-color:#71aed1;">
		              <h3 class="box-title">Today's Schedule Peak</h3>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body no-padding" style="max-height:470px;min-height:470px;overflow-x: hidden;overflow-y:scroll hidden;">
		            
		            <table class="table table-striped " >
			          <thread>
			             <tr>
			             <th >Sport</th>
			             <th >Start Time</th>
			             <th >End Time</th>
			             <th >Team A</th>
			             <th >Team B</th> 
			             <th >Venue</th>
			             </tr>
			             </thread>

		            <?php
	                    $query2 = "SELECT * FROM tbl_schedule Where EventID = '$id' and Dates = '$today' And SportsID = '$id3'";
	                    $result2 = mysqli_query($link, $query2);
	                              while($row = mysqli_fetch_assoc($result2)){
	                              
	                              $sportsid = $row['SportsID'];
	                              $matchid = $row['MatchID'];
	                              $venue = $row['Venue'];
	                              $starttime = $row['StartTime'];
	                              $endtime = $row['EndTime'];
	                              $teama = $row['TeamA'];
	                              $teamb = $row['TeamB'];


	                              $query3 = "SELECT * FROM tbl_sports Where SportsID = '$sportsid'";
	                              $result3 = mysqli_query($link, $query3);
	                              while($row = mysqli_fetch_assoc($result3)){
	             						
	                              $sportsname = $row['SportsName'];
                                    echo "<tr>";
                                    echo "<td>". $sportsname ."</td>";
                                    echo "<td>". $starttime ."</td>";
                                    echo "<td>". $endtime ."</td>";
                                    echo "<td>". $teama ."</td>";
                                    echo "<td>". $teamb ."</td>";
                                    echo "<td>". $venue ."</td>";
	                              
	                              
	                              }
	  
	              	                    
	                }?>  
	                </table>  


		            </div>
		            <!-- /.box-body -->
		          </div>
		          <!-- /.box -->

            
              </div>
              <div class="chart tab-pane" id="all" style="position: relative; height: 450px;">

              <div class="box" >
                  <div class="box-header with-border">
                      <h3 class="box-title">Schedules</h3>
                      <div class="box-tools pull-right"></div>
                  </div>
                  <!-- /.box-header -->
              <div class="box-body" style="max-height: 430px; min-height: 430px; overflow-y: scroll; zoom: 70%;overflow-x: hidden;">
                  <div class="row">
                  <div class="col-md-4 col-sm-4">
                      <input id="eventN" type="text" class="form-control" value="<?php echo "Venue: " . $venue . "  Date: " . $startd . " to " . $endd; ?>" readonly>
                     
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                      </br>
                      <?php
                      foreach($daterange as $date){
                          $now =  $date->format("m/d/Y");
                          //echo $day[$counts] = $date->format("m/d/Y");
                          $timestamp = strtotime($now);
                          $day = date('l', $timestamp);
                          ?>
                          <div class="col-md-3">
                          <div class="box-body table-responsive no-padding" >
                              <table id="myTable" class="table table-fixed">
                              <tr>
                                  <th bgcolor="#b0bad4"><h4><b><?php echo $day . " (" . $now .")";?></b></h4></th>  
                              </tr>
                              <?php
                                $query6 = "SELECT * FROM tbl_schedule Where EventID = '$id' And SportsID = '$id3' And Dates = '$now'";
                                $result6 = mysqli_query($link, $query6);
                                while($row = mysqli_fetch_assoc($result6)){
                                $match = $row['MatchID'];
                                echo "<tr>";
                                echo "<td>" . "<b>Match No:</b> " . $row['MatchNo'] . "</br>" . "TimeStart: " . $row['StartTime'] ."</br>". "TimeEnd: " . $row['EndTime'] ."</br>". "Teams: " . $row['TeamA'] . "<b>  vs  </b>" . $row['TeamB'] . "</br><b>Venue</b>: " . $row['Venue'] . "</td>";   
                              }
                              ?>   
                              </table>
                          </div>
                          </div>
                          <?php
                          $counts++; 
                      }
                      ?>

                    </div>
                  </div>
            
            
      
  
                </div>
                <!-- ./box-body -->
                <div class="box-footer">
                </div>
                <!-- /.box-footer -->

                </div>
                <!-- /.box -->

              </div>
            </div>
          </div>
          <!-- /.nav-tabs-custom -->


	</div>
	</div><!--Col-12-->
</div><!--row-->

</div>
</br>
</br>

<script>

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));



$(function worker1(){
    // don't cache ajax or content won't be fresh
    $.ajaxSetup ({
        cache: false,
        complete: function() {
          setTimeout(worker1, 10000);
        }
    });
    

    // load() functions
    
    var loadsection1 = "scorebored.php";
    
        
        $("#scores").load(loadsection1);

// end  
});

$(function worker2(){
    // don't cache ajax or content won't be fresh
    $.ajaxSetup ({
        cache: false,
        complete: function() {
          setTimeout(worker2, 10000);
        }
    });
    

    // load() functions
    
    var loadsection2 = "section2.php";
    
        
        $("#matches1").load(loadsection2);

// end  
});


$(function worker4(){
    // don't cache ajax or content won't be fresh
    $.ajaxSetup ({
        cache: false,
        complete: function() {
          setTimeout(worker4, 10000);
        }
    });
    

    // load() functions
    
    var loadrecent1 = "recentgame.php";
    
        
        $("#recent1").load(loadrecent1);

// end  
});



$(document).ready(function(){

  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    if (this.hash !== "") {
  
      event.preventDefault();


      var hash = this.hash;


      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   

        window.location.hash = hash;
      });
    } 
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>


<!-- Bootstrap 3.3.6 -->
<script src="ACSEM/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->


<!-- jQuery 2.2.3 -->
<script src="ACSEM/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="ACSEM/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="ACSEM/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="ACSEM/dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="ACSEM/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="ACSEM/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="ACSEM/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="ACSEM/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="ACSEM/plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="ACSEM/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="ACSEM/dist/js/demo.js"></script>
</body>
</html>
