<?php 
 include('ACSEM/conn/connection.php');
 session_start();
 $id = $_SESSION['id'];

     date_default_timezone_set('Asia/Manila');


    // Prints something like: Monday
    
    $today = date("m/d/Y");
    //$today = "10/09/2017"; 
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
<body style="margin:auto;">
	
<div class="row">
  <div class="col-md-12 col-sm-12">
  
  <div class="col-md-12  col-sm-12 " style="max-height:400px;min-height:400px;">
  <h2 style="text-align:center;"><img src="images/ar.png" style="padding:0;margin: 0 10px 0 40px;width:43px;height:45px;">Game Schedules for Today</h2><br>
         <div class="box " >
            <div class="box-header">
              <i class="fa  fa-hourglass-2"></i>

              <h3 class="box-title">Schedules</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body" style="max-height:350px;min-height:350px; overflow-x: hidden;overflow-y:scroll hidden;">
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
		                    $query2 = "SELECT * FROM tbl_schedule Where EventID = '$id' and Dates = '$today'";
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
		                              ?>
				                              		<tbody>
				                              			<tr>
				                              				<td><?php echo $sportsname ?></td>
				                              				<td><?php echo $starttime ?></td>
				                              				<td><?php echo $endtime ?></td>
				                              				<td><?php echo $teama ?></td>
				                              				<td><?php echo $teamb ?></td>
				                              				<td><?php echo $venue ?></td>
				                              			</tr>
				                              		</tbody>
		                              <?php
		                              }     
		                }?>
            </table>
            </div><!-- /. box-body -->
          </div> <!-- /. box-info --> 
  </div>
  </div>
</div><!--row--> 


</body>
</html>