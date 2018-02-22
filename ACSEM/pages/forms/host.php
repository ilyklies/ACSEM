<?php
  	include("../../conn/connection.php");
    
    include("../../conn/checker2.php");
     
     $id = $_SESSION["id"];
     $sportsname = $_SESSION["sportn"];
     $elimi = "";
     $counter = 0;
     $teama = "";
     $teamb = "";
     $points = 0;
     $holder = 0;
     $type = "";
     $option1 = 5;
     $option2 = 10;
     $sportid = "";
     $finalpoints = array();
     $arraycount = 0;
     $locker = 0;
     
     
     $query1 = "SELECT * FROM tbl_sports Where SportsName = '$sportsname'" ;
     $result1 = mysqli_query($link, $query1);
     While($row = mysqli_fetch_assoc($result1)){
              
          $sportsid = $row['SportsID'];
          $categ = $row['SportsCategory'];
          $rules = $row['SportsRules'];
                 
     }
     
    date_default_timezone_set('Asia/Manila');


    // Prints something like: Monday
    
    $today = date("m/d/Y");
    //$today = "10/09/2017"; 





    $query = "SELECT * FROM tbl_facilitator where FacilitatorID = '$user1'  " ;
    $result = mysqli_query($link, $query);

    while($row = mysqli_fetch_assoc($result))
       {
        $fname = $row['Ffname'];
        $lname = $row ['Flname'];
        $Fphoto = $row['Fphoto'];
       

       }
    $query1 = "SELECT * FROM tbl_efacilitators Where EventID = '$id' And FacilitatorID = '$user1'" ;
    $result1 = mysqli_query($link, $query1);
    while($row = mysqli_fetch_assoc($result1)){
          
          $sportid = $row['SportsID'];
          
    }

    $query2 = "SELECT * FROM tbl_esports Where EventID = '$id' And SportsID = '$sportid'";
    $result2 = mysqli_query($link, $query2);

    while($row = mysqli_fetch_assoc($result2)){
      $elimi = $row['Elimination'];
    }

    $query3 = "SELECT * FROM tbl_edepartments Where EventID = '$id'";
    $result3 = mysqli_query($link, $query3);

    while($row = mysqli_fetch_assoc($result3)){
      $counter = $counter + 1;

    }
    $id2 = $sportid;
    $day1 = 0;
    $day2 = 0;
    $day3 = 0;
    $day4 = 0;
    $day5 = 0;
    $day6 = 0;
    $day7 = 0;
    $counts = 1;

    $query5 = "SELECT * FROM tbl_event Where EventID = '$id'";
    $result5 = mysqli_query($link, $query5);

    while($row = mysqli_fetch_assoc($result5)){
      $startd = $row['EventStart'];
      $endd = $row['EventEnd'];
    }

    $begin = new DateTime($startd);
    $end = new DateTime($endd);
    $end = $end->modify( '+1 day' );

    $diff = $end->diff($begin)->format("%a");
      
     
    $daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);


    foreach($daterange as $date){
    $day[$counts] = $date->format("m/d/Y");
    $counts++;  
    }
    $day1 = $day[1];
    $day2 = $day[2];
      
    if (empty($day[3])){
      $day3 = "";
    }else{
      $day3 = $day[3];
    }
    if (empty($day[4])){
      $day4 = "";
    }else{
      $day4 = $day[4];
    }
    if (empty($day[5])){
      $day5 = "";
    }else{
      $day5 = $day[5];
    }
    if (empty($day[5])){
      $day5 = "";
    }else{
      $day5 = $day[5];
    }
    if (empty($day[6])){
      $day6 = "";
    }else{
      $day6 = $day[6];
    }
    if (empty($day[7])){
      $day7 = "";
    }else{
      $day7 = $day[7];
    }
    
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ACSEM</title>
  <link rel="shortcut icon" href="../../images/ar.png" style="width:50%;height:10%;" type="image/x-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="script.js"></script>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->



</head>
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../facilitator.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="../../images/ar.png" style="width:70%; height:10%;"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><img src="../../images/Fiacsem.png" style="width:65%; height:5%;"></b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
         
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="upload/<?php echo $Fphoto; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $fname; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="upload/<?php echo $Fphoto; ?>" class="img-circle" alt="User Image">

                <p>
                   <?php echo $fname . " " . $lname ; ?>
                  <small>Facilitator</small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile2.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../../Logins/Logoutprocess.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="upload/<?php echo $Fphoto; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $fname . " " . $lname ; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online Facilitator</a>
        </div>
      </div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        
        <li class="active"><a href="../../facilitator.php"><i class="fa fa-ioxhost"></i> <span>Host Game</span></a></li>
        <li ><a href="apindex.php"><i class="fa fa-user-plus"></i> <span>Players</span></a></li>
        <li><a href="scheduling.php"><i class="fa fa-calendar-plus-o"></i> <span>Schedules</span></a></li>
        
        

        
      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        GAME Play <small>Module</small>

      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a>Departments</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

            <div class="box" >
            <div class="box-header with-border">
              <h3 class="box-title">Match for <?php echo $sportsname . " " . $categ . " (<b>" . $elimi."</b>)" ?></h3>

              <div class="box-tools pull-right">
                
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="max-height: 550px; min-height: 450px; overflow-y: scroll; background-color:#f0f0f0;" >
            
            <div class="row">
                  <div class="col-md-7">
                      
                            
                            <div class="box box-default" style="max-height: 750px; min-height: 350px;">
                                <div class="box-header with-border">
                                     <i class="fa  fa-gamepad"></i>
                                     <h3 class="box-title">Game</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">

                                <form action="php/gotohost.php" method="POST">

                                <div class="row">
                                      <div class="col-md-5">
                                      <div class="form-group has-feedback">
                                        <label>Match ID</label>
                                        <input type="text" name="txtmatchid" class="form-control" placeholder="Match ID" id="MatchID" readonly required="required">
                                      </div>
                                      </div>
                                      <div class="col-md-5">
                                      <label>Match No</label>
                                      <div class="form-group has-feedback">
                                        <input type="text" name="txtmatchno" class="form-control" placeholder="Match No" id="MatchNo" readonly >
                                      </div>
                                      </div>
                                </div>
                                <div class="row">
                                      <div class="col-md-5">
                                      <div class="form-group has-feedback">
                                        <label>Time</label>
                                        <input type="text" name="txttime" class="form-control" placeholder="Time" id="Time" readonly >
                                      </div>
                                      </div>
                                </div>
                                <div class="row">
                                      <div class="col-md-5">
                                      <div class="form-group has-feedback">
                                        <label>Team A</label>
                                        <input type="text" name="txtteam1" class="form-control"  id="Teamtxt" readonly >
                                      </div>
                                      <div class="form-group">
                                      <label>Update Team</label>
                                        <select class="form-control"  name="txtTeamA" id="TeamA" onchange="jsFunction1()">
                                          <option id="ateam"></option> 
                                          <?php
                                          $query3 = "SELECT * FROM tbl_edepartments Where EventID = '$id'";
                                          $result3 = mysqli_query($link, $query3);
                                            while($row = mysqli_fetch_assoc($result3)){
                              
                                                    $depid = $row['DepID'];
                                                    $query4 = "SELECT * FROM tbl_departments Where DepID = '$depid'";
                                                    $result4 = mysqli_query($link, $query4);
                                                    while($row = mysqli_fetch_assoc($result4)){
                                                      echo "<option>" . $row['Depcode'] . "</option>";
                                                    }

                                           }?>
                                        
                                        
                                          
                                          
                                          
                                        </select>
                                      
                                      </div>
                                      <!-- /.form-group -->
                                      </div>
                                      <div class="col-md-2" align="center" style="line-height:6em;"><b>VS</b></div>
                                      <div class="col-md-5">
                                      <div class="form-group has-feedback">
                                        <label>Team B</label>
                                        <input type="text" name="txtteam2" class="form-control"  id="Teamtxt1" readonly >
                                      </div>
                                      <div class="form-group">
                                      <label>Update Team</label>
                                        <select class="form-control"  name="txtTeamA" id="TeamB" onchange="jsFunction2()">
                                          <option></option>
                                          <?php
                                          $query3 = "SELECT * FROM tbl_edepartments Where EventID = '$id'";
                                          $result3 = mysqli_query($link, $query3);
                                                      while($row = mysqli_fetch_assoc($result3)){
                              
                                            $depid = $row['DepID'];
                                            $query4 = "SELECT * FROM tbl_departments Where DepID = '$depid'";
                                            $result4 = mysqli_query($link, $query4);
                                            while($row = mysqli_fetch_assoc($result4)){
                                              echo "<option>" . $row['Depcode'] . "</option>";
                                            }

                                          }?>
                                          
                                          
                                          
                                          
                                          
                                        </select>
                                      
                                      </div>
                                      <!-- /.form-group -->

                                      </div>
                                </div>
                                
                                <div class="row">
                                      <div class="col-md-6">

                                      <div class="form-group has-feedback">
                                      <button type="submit" name="run" class="btn btn-primary" id="GoRun" disabled >Run Game</button>
                                      </div>

                                      

                                      </div>
                                      <div class="col-md-6">
                                        
                                      <div class="form-group has-feedback">
                                      <button type="submit" name="update" class="btn btn-primary" id="GoUpdate" disabled>Update</button>
                                      </div>

                                      </div>
                                      
                                </form>    
                                </div>
                                </div>
                                <!-- /.box-body -->

                            </div>
                            <!-- /.box -->

                  </div>
                  <div class="col-md-5">

                  <div class="box-body table-responsive no-padding" >
                      <div class="nav-tabs-custom">
                            <!-- Tabs within a box -->
                            <ul class="nav nav-tabs pull-right">
                              
                              
                            <li class="pull-left header"><i class="fa  fa-list-alt"></i>Today's Games -<?php echo date("l"); ?></li>
                            <button class="pull-right header btn btn-warning" data-toggle="modal" data-target="#myModalPen">Pending</button>
                            <button class="pull-right header btn btn-info" data-toggle="modal" data-target="#myModalPen2">Rules</button> 
                            </ul>
                            <div class="tab-content no-padding" style="max-height: 410px; min-height: 410px; overflow-y: scroll; zoom: 90%;">
                              <!-- Morris chart - Sales -->
                            
                            <table id="table2" class="table">
                            <tr>
                                <th><h4>Match ID</h4></th>
                                <th><h4>Match No</h4></th>
                                <th><h4>Time</h4></th>
                                <th><h4>TeamA</h4></th>
                                <th><h4>TeamB</h4></th>
                                <th><h4>Action</h4></th>
                                  
                            </tr>
                            <?php
                              $query6 = "SELECT * FROM tbl_schedule Where EventID = '$id' And SportsID = '$id2' And Dates = '$today' And Status = '' ";
                              $result6 = mysqli_query($link, $query6);

                              while($row = mysqli_fetch_assoc($result6)){
                              echo "<tr>";
                              $matchid = $row['MatchID'];
                              echo "<td>" . $row['MatchID'] . "</td>";
                              echo "<td>" . $row['MatchNo'] . "</td>";
                              echo "<td>" . $row['StartTime'] . "-" . $row['EndTime'] . "</td>";
                              echo "<td>" . $row['TeamA'] . "</td>";
                              echo "<td>" . $row['TeamB'] . "</td>";
                              ?>
                              <td><button id="bot" class="btn btn-primary" >Load</button></td>
                            <?php
                            }
                            ?>  
                            
                            </table>
                            
                            </div>
                            <div class="form-group">
                            
                            </div>
                          </div>
                          <!-- /.nav-tabs-custom -->

                      
                  </div>

                  </div>
            </div>
      
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
                <div class="alert alert-info alert-dismissible">
                
                <h4><i class="icon fa fa-hand-o-down"></i> Alert!</h4>
                See Recent Matches Below to Update Game Teams
              </div>
                 
            </div>
            <!-- /.box-footer -->
            </div>
            <!-- /.box -->

            <div class="box" >
            <div class="box-header with-border">
              <h3 class="box-title">Recent Matches</h3>

              <div class="box-tools pull-right">
                <button type="button"  class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button"  class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="max-height: 350px; min-height: 350px; overflow-y: scroll; zoom: 90%;">
            
            
             <div class="col-md-12 col-sm-12 col-xs-12" style="max-height:300px;min-height-300px; overflow-y: scroll;">
                <?php

                    $query2 = "SELECT * FROM tbl_schedule Where EventID = '$id' And SportsID = '$sportid' And Status = 'Done'";
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
                                  <div class="box-header with-border alert-info">
                                  
                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                      <div class="col-md-2 col-sm-2 col-xs-4"><b><?php echo $sportsname?></b></div>
                                      <div class="col-md-2 col-sm-2 col-xs-2"><b>Match no:</b><?php echo $matchno?></div>
                                      <div class="col-md-2 col-sm-2 col-xs-3"><b>Winner:</b> <?php echo $winner?></div>
                                      <div class="col-md-2 col-sm-2 col-xs-3"><b>Loser: </b><?php echo $losser?></div>
                                  </div>

                                    <div class="box-tools pull-right">
                                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                      </button>
                                    </div>
                                    <!-- /.box-tools -->
                                  </div>
                                  <!-- /.box-header -->
                                  <div class="box-body" style="background-color:#f0f0f0;">
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

              </div> <!-- /.col -->
           
  
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
            <div class="form-group has-feedback">
                  <div class="form-group">
                  <button class="btn btn-success" id="Result" data-toggle="modal" data-target="#myModal1">Submit Tournament Result</button>

                  </div>

                  <div class="form-group">
                  <button class="btn btn-info" id="Docu" target="_blank">View Document Details</button>
                  </div>
            </div>
            </div>
            <!-- /.box-footer -->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
    </div>
      <strong>Capstone ACSEM-2017</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        
        <!-- /.control-sidebar-menu -->

        

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });

               
</script>

     
      




<!-- Modal -->
<div id="myModal1" class="modal fade modal-success" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Finalizing Sports Results</h4>
      </div>
      <div class="modal-body">
      <div class="row">
      <div class="col-md-6">
      <div class="form-group has-feedback">
      <label >Event ID</label>
             <input type="text"  id="Fm1" class="form-control"  id="Teamtxt1" value="<?php echo $id;?>" readonly >
      </div>
      </div> <!-- /.row -->
      <div class="col-md-6">
      <div class="form-group has-feedback">
      <label >Sports ID</label>
             <input type="text"  id="Fs1" class="form-control"  id="Teamtxt1" value="<?php echo $sportid;?>" readonly > 
      </div>
      </div> <!-- /.row -->
      </div> <!-- /.row -->
      
      <div class="row">
      <div class="col-md-6">
      <div class="form-group has-feedback">
     
      
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Match Points</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding" style="max-height: 150px; min-height: 150px;overflow-y: scroll;">
              <table id="tableMatch" class="table" style="background-color:#b0acac;" >
                <tr> 
                  <th bgcolor="#b0acac">Team</th>
                  <th bgcolor="#b0acac">Points</th>
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
                                     echo "<td>" . $row['Depcode'] . "</td>";

                                     
                              
                              }
                              $query4 = "SELECT * FROM tbl_points Where Depcode = '$depcode' And EventID = '$id' And SportsID = '$sportid' ";
                                     $result4 = mysqli_query($link, $query4);

                                     while($row = mysqli_fetch_assoc($result4)){
                                          $points = $points + $row['Points'];
                                          
                                          $holder = $points;
                                          $locker = $locker + 1;
                                     }
                                     $points = 0;
                                     $finalpoints[$depcode] = $holder;
                                     //$finalpoints = array($depcode=>$holder);
                                     //$arraycount = $arraycount + 1;
                                     echo "<td>" . $holder . "</td>";
                                     $holder = 0;

                }
                
                ?>

                </tr>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
                   
      </div>
      </div> <!-- col -->
      <div class="col-md-6">
      <div class="form-group has-feedback">
      
      
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Final Standing Points</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding" style="max-height: 150px; min-height: 150px;overflow-y: scroll;">
              <table id="tableFinal" class="table" style="background-color:#b0acac;">
                <tr> 
                  <th bgcolor="#b0acac">Team</th>
                  <th bgcolor="#b0acac">Points</th>
                </tr>
              
              <?php
                $query5 = "SELECT * FROM tbl_sports Where SportsID = '$sportsid'";
                $result5 = mysqli_query($link, $query5);

                while($row = mysqli_fetch_assoc($result5)){
                      $type = $row['SportsType'];
                }
                //Trigger after last game pls make

                if($type == "Single/Paired"){
                    
                     $option1 = $counter * 5;
                     arsort($finalpoints);

                      foreach($finalpoints as $x => $x_value) {
                          echo "<tr>";
                          echo "<td>" . $x . "<td>" . $option1 ."</td>";
                          $option1 = $option1 - 5;  
                          
                      }
                  
                }else{
                     $option2 = $counter * 10;
                     arsort($finalpoints);
                     foreach($finalpoints as $x => $x_value) {
                          echo "<tr>";
                          echo "<td>" . $x . "<td>" . $option2 ."</td>";
                          $option2 = $option2 - 10;  
                          
                      }
                   
                }
              

              ?>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->     

      </div>
      </div> <!-- col -->
      </div> <!-- row -->
      <div class="row">
      <div class="col-md-6">
      <div class="form-group has-feedback">
      <label >Facilitated by:</label>
             <input type="text"  class="form-control" id="Ffname" value="<?php echo $fname . " " . $lname;?>" readonly >
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group has-feedback">
      <label >Status:</label>
             <input type="text"  class="form-control"  id="Fstatus" value="Verified" readonly >
      </div>
      </div>
      </div>

      <div class="row">
      <?php

      
      

     
      ?> 
     
     
      </div> <!-- row -->        
      </div>
      <div class="modal-footer">
                <button type="button" class="btn  pull-left btn-success" data-dismiss="modal">Close</button>
                <button  type="submit" class="btn btn-success" id="Final" >Submit</button>        
      </div>
    </div>
  </div>
</div>
<!-- Modal -->


<!-- Modal -->
<div id="myModal2" class="modal fade modal-default" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Match Details</h4>
         <div class="form-group has-feedback">
         <label>Match ID</label>
         <input type="text" class="form-control"name="search" id="search"/ active>
         </div>
         <div class="form-group has-feedback">
         <label>Team Scores</label>
         <div class="result">
         </div>
         </div>
      </div>
      <div class="modal-body">
            
      </div>
      <div class="modal-footer">
                <button type="button" class="btn  pull-left " data-dismiss="modal">Close</button>
                       
      </div>
    </div>
  </div>
</div>
<!-- Modal -->





<!-- Modal -->
<div id="myModalPen" class="modal fade modal-default" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Peding Games For Double Elimination</h4>
      </div>
      <div class="modal-body" style="max-height: 250px; min-height: 250px; overflow-y: scroll; zoom: 90%;">
                
                           <table id="tablepen" class="table">
                            <tr>
                                <th><h4>Match ID</h4></th>
                                <th><h4>Match No</h4></th>
                                <th><h4>Time</h4></th>
                                <th><h4>TeamA</h4></th>
                                <th><h4>TeamB</h4></th>
                                <th><h4>Action</h4></th>
                                  
                            </tr>
                            <?php
                              $query6 = "SELECT * FROM tbl_schedule Where EventID = '$id' And SportsID = '$id2' And Status = '' ";
                              $result6 = mysqli_query($link, $query6);

                              while($row = mysqli_fetch_assoc($result6)){
                              echo "<tr>";
                              $matchid = $row['MatchID'];
                              echo "<td>" . $row['MatchID'] . "</td>";
                              echo "<td>" . $row['MatchNo'] . "</td>";
                              echo "<td>" . $row['StartTime'] . "-" . $row['EndTime'] . "</td>";
                              echo "<td>" . $row['TeamA'] . "</td>";
                              echo "<td>" . $row['TeamB'] . "</td>";
                              ?>
                              <td><button id="botpen" class="btn btn-primary" >Load</button></td>
                            <?php
                            }
                            ?>  
                            
                            </table>
                 
      
      </div>
      <div class="modal-footer">
                <button type="button" class="btn  pull-left" data-dismiss="modal">Close</button>
                
                
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<!-- Modal -->
<div id="myModalPen2" class="modal fade modal-default" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sports Rules</h4>
      </div>
      <div class="modal-body" style="max-height: 250px; min-height: 250px; overflow-y: scroll; zoom: 90%;">
                
              <p><?php echo $rules;?></p>
                 
      
      </div>
      <div class="modal-footer">
                <button type="button" class="btn  pull-left" data-dismiss="modal">Close</button>
                
                
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<script>
                  $(document).ready(function(){
                    $(document).on("click", "#bot", function() {
                      $(this).prop("disabled", true);
                      $(this).text("Loaded");
                    });

                    // code to read selected table row cell data (values).
                    $("#table2").on('click','.btn',function(){
                         // get the current row
                        var currentRow=$(this).closest("tr"); 
                         
                        var col1=currentRow.find("td:eq(0)").html(); // get current row 1st table cell TD value
                        var col2=currentRow.find("td:eq(1)").html(); // get current row 2nd table cell TD value
                        var col3=currentRow.find("td:eq(2)").html(); // get current row 3rd table cell  TD value
                        var col4=currentRow.find("td:eq(3)").html(); // get current row 3rd table cell  TD value
                        var col5=currentRow.find("td:eq(4)").html(); // get current row 3rd table cell  TD value

                        
                        document.getElementById("MatchID").value = col1;
                        document.getElementById("MatchNo").value = col2;
                        document.getElementById("Time").value = col3;
                        document.getElementById('Teamtxt').value = col4;
                        document.getElementById("Teamtxt1").value = col5;
                        document.getElementById("GoRun").disabled = false;
                        document.getElementById("GoUpdate").disabled = false;
                        
                       

                    });
                  });

                  $(document).ready(function(){
                    $(document).on("click", "#botpen", function() {
                      $(this).prop("disabled", true);
                      $(this).text("Loaded");
                    });

                    // code to read selected table row cell data (values).
                    $("#tablepen").on('click','.btn',function(){
                         // get the current row
                        var currentRow=$(this).closest("tr"); 
                         
                        var col1=currentRow.find("td:eq(0)").html(); // get current row 1st table cell TD value
                        var col2=currentRow.find("td:eq(1)").html(); // get current row 2nd table cell TD value
                        var col3=currentRow.find("td:eq(2)").html(); // get current row 3rd table cell  TD value
                        var col4=currentRow.find("td:eq(3)").html(); // get current row 3rd table cell  TD value
                        var col5=currentRow.find("td:eq(4)").html(); // get current row 3rd table cell  TD value

                        
                        document.getElementById("MatchID").value = col1;
                        document.getElementById("MatchNo").value = col2;
                        document.getElementById("Time").value = col3;
                        document.getElementById('Teamtxt').value = col4;
                        document.getElementById("Teamtxt1").value = col5;
                        document.getElementById("GoRun").disabled = false;
                        document.getElementById("GoUpdate").disabled = false;
                        
                       

                    });
                  });



                  function jsFunction1(){
                     // set text box value here
                     var txt =  document.getElementById('Teamtxt');
                     var conceptName = $('#TeamA').find(":selected").text();
                     txt.value = conceptName;
                  }
                  function jsFunction2(){
                     // set text box value here
                     var txt =  document.getElementById('Teamtxt1');
                     var conceptName = $('#TeamB').find(":selected").text();
                     txt.value = conceptName;
                  }


                  

$('#finaladd').click(function() {

         var r = confirm("Add points?");
             if (r == true) {

                        var tname = $('#teamname').val();
                        var tpoints = $('#teampoints').val();

                        var table = document.getElementById("tableFinal");
                        var row = table.insertRow(-1);
                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);
                       
                        
                        cell1.innerHTML = tname;
                        cell2.innerHTML = tpoints;
                        document.getElementById("teamname").value = "";
                        document.getElementById("teampoints").value = "";

               
             }else{
               
             }

});//click end
$('#Final').click(function() {

         var r = confirm("Submit Finalized Sports Event Result Now?");
             if (r == true) {
                var fm1 = document.getElementById("Fm1").value;
                var fs1 = document.getElementById("Fs1").value;
                var  ffname = document.getElementById("Ffname").value;
                var  fstatus = document.getElementById("Fstatus").value;
                  
                $.ajax({
                        type: 'POST',
                        url: 'php/Ffinalreport.php',
                        data: { FM1: fm1 , FS1: fs1 ,Ffname: ffname , Fstatus: fstatus },
                        success: function(response) {
                             $('#result').html(response);
                             CallA();
                        }
                });

                function CallA(){

                   $("#tableFinal tr:gt(0)").each(function () {
                      
                      var this_row = $(this);
                      var dcode = $.trim(this_row.find('td:eq(0)').html());//td:eq(0) means first td of this row
                      var dpoint = $.trim(this_row.find('td:eq(1)').html())
                      
                      $.ajax({
                          type: 'POST',
                          url: 'php/Ffinalreport1.php',
                          data: { FM1: fm1 , FS1: fs1 ,DCODE: dcode , DPOINT: dpoint },
                          success: function(response) {
                              
                               $('#result').html(response);
                               window.location.replace("host.php");
                          }
                      });
                     });
                }

                
        }else{
          
        }
});//click end

$('#ViewD').click(function() {

         $("#tableRecent").on('click','.btn',function(){
                         // get the current row
             var currentRow=$(this).closest("tr"); 
                         
             var col1=currentRow.find("td:eq(0)").html(); // get current row 1st table cell TD value
                        
             document.getElementById("search").value = col1;
                       

           });
               

});//click end
$('#Docu').click(function() {

        window.location.replace("Freport.php?id=<?php echo $id;?>&id2=<?php echo $sportsid?>");
               

});//click end
</script>
<script>

            
            $(document).ready(function() {
                var search = $("#search");
                    search.keyup(function() {
                        if (search.val() != '') {       
                        $.post("php/this.php", { search : search.val()}, function(data) {
                            $(".result").html(data);

                            
                        });
                        }
                    });

            });


            $(document).ready(function() {
              $('#modal-6').on('shown.bs.modal', function(e) {
                var id = $(e.relatedTarget).data('id');
                $.ajax({
                    type : 'post',
                    url : 'file.php', //Here you will fetch records or images
                    data :  'id='+ id, //Pass id
                    success : function(data){
                        $('#fetched-data').html(data);//Show fetched data from database
                    }
                });
              });
            });


            

</script>



</body>
</html>
