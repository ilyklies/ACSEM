<?php
	include("../../conn/connection.php");

   include("../../conn/checker2.php");

   $query = "SELECT * FROM tbl_facilitator where FacilitatorID = '$user1'  " ;
     $result = mysqli_query($link, $query);

     while($row = mysqli_fetch_assoc($result))
       {
        $fname = $row['Ffname'];
        $lname = $row ['Flname'];
        $Fphoto = $row['Fphoto'];
       
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


	$id = $_GET['id'];
	$id2 = $_GET['id2'];

	  $query0 = "SELECT * FROM tbl_schedule Where EventID = '$id' And SportsID = '$id2'";
    $result0 = mysqli_query($link, $query0);

    while($row = mysqli_fetch_assoc($result0)){
    	$matchno = $row['MatchNo'];
    	$venue = $row['Venue'];
    	$count = $matchno + 1  ;
	  }

	  $query = "SELECT * FROM tbl_esports Where EventID = '$id' And SportsID = '$id2'";
    $result = mysqli_query($link, $query);

    while($row = mysqli_fetch_assoc($result)){
    	 $elim = $row['Elimination'];
	  }

	  $query1 = "SELECT * FROM tbl_edepartments Where EventID = '$id'";
    $result1 = mysqli_query($link, $query1);

    while($row = mysqli_fetch_assoc($result1)){
    	 $counter = $counter + 1;

	  }
	
	  $query2 = "SELECT * FROM tbl_sports Where SportsID = '$id2'";
    $result2 = mysqli_query($link, $query2);

    while($row = mysqli_fetch_assoc($result2)){
    	$sportsname = $row['SportsName'];
      $categ = $row['SportsCategory'];
	  }

	  $query5 = "SELECT * FROM tbl_event Where EventID = '$id'";
    $result5 = mysqli_query($link, $query5);

    while($row = mysqli_fetch_assoc($result5)){
    	$startd = $row['EventStart'];
    	$endd = $row['EventEnd'];
	  }


	  $StartDate =  date("m/d/Y",strtotime('monday this week'));
    $Enddate = date("m/d/Y",strtotime('sunday this week'));
    //$StartDate = "10/09/2017";
    //$Enddate = "10/15/2017";


    $begin = new DateTime($startd);
    $end = new DateTime($endd);
    $end = $end->modify( '+1 day' );

    $diff = $end->diff($begin)->format("%a");

    $daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);

    foreach($daterange as $date){
        $day[$counts] = $date->format("m/d/Y");
        $counts++; 
    }
    //echo $day1;
    
   

   
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
<style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
</style>
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

        
        <li><a href="../../facilitator.php"><i class="fa fa-ioxhost"></i> <span>Host Game</span></a></li>
        <li><a href="apindex.php"><i class="fa fa-user-plus"></i> <span>Players</span></a></li>
        <li class="active"><a href="scheduling.php"><i class="fa fa-calendar-plus-o"></i> <span>Schedules</span></a></li>
        
        

        
      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Scheduling <small>Games</small>

      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a>Scheduling</a></li>
        
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    	    <div class="box" >
            <div class="box-header with-border">
              <h3 class="box-title">Match Brackets  </h3> for:  <b><?php echo $sportsname ." ".$categ . " (" . $elim .") "?></b>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="max-height: 550px; min-height: 450px; overflow-y: scroll; zoom: 75%; ">
            
            <?php
            if( $elim == "Single Elimination" ){
              
            }elseif( $elim == "Double Elimination" ){
                  if( $counter == 3){
                    ?>
                    <img src="formats/DE3.png">
                    <?php
                     
                  }else if ($counter == 4){
                    ?>
                    <img src="formats/DE4.png">
                    <?php      
                  }else if ($counter == 5){
                    ?>
                    <img src="formats/DE5.png">
                    <?php
                  
                  }else if($counter == 6){
                    ?>
                    <img src="formats/DE6.png">
                    <?php
                  
                  }else if ($counter == 7){
                    ?>
                    <img src="formats/DE7.png">
                    <?php
                  
                  }else if($counter == 8){
                     ?>
                    <img src="formats/DE8.png">
                    <?php
                  
                  }else if($counter == 9){
                    ?>
                    <img src="formats/DE9.png">
                    <?php
                  
                  }else if($counter == 10){
                    ?>
                    <img src="formats/DE10.png">
                    <?php
                  }
              
            }elseif( $elim == "Round Robin" ){
                  if( $counter == 3){
                    ?>
                    <img src="formats/RR3.png">
                    <?php
                     
                  }else if ($counter == 4){
                    ?>
                    <img src="formats/RR4.png">
                    <?php      
                  }else if ($counter == 5){
                    ?>
                    <img src="formats/RR5.png">
                    <?php
                  
                  }else if($counter == 6){
                    ?>
                    <img src="formats/RR6.png">
                    <?php
                  
                  }else if ($counter == 7){
                    ?>
                    <img src="formats/RR7.png">
                    <?php
                  
                  }else if($counter == 8){
                     ?>
                    <img src="formats/RR8.png">
                    <?php
                  
                  }


            }elseif( $elim == "Double Round Robin" ){
                  if( $counter == 3){
                    ?>
                    <img src="formats/DRR3.png">
                    <?php
                     
                  }else if ($counter == 4){
                    ?>
                    <img src="formats/DRR4.png">
                    <?php      
                  }else if ($counter == 5){
                    ?>
                    <img src="formats/DRR5.png">
                    <?php
                  
                  }else if($counter == 6){
                    ?>
                    <img src="formats/DRR6.png">
                    <?php
                  
                  }else if ($counter == 7){
                    ?>
                    <img src="formats/DRR7.png">
                    <?php
                  
                  }else if($counter == 8){
                     ?>
                    <img src="formats/DRR8.png">
                    <?php
                  
                  }


            }
            ?>

           
    	
  
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Schedule</button>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->



		  <div class="box" >
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            
              <a href="Sreport.php?id=<?php echo $id;?>&id2=<?php echo $id2;?>"><button class="btn btn-primay">Print</button></a>
              
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="max-height: 550px; min-height: 450px; overflow-y: scroll; zoom: 85%;">
            
            <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#Main" data-toggle="tab">Main</a></li>
              <li><a href="#Check" data-toggle="tab">Check Venue</a></li>
              <li class="pull-left header"><i class="fa  fa-calendar-plus-o"></i> Schedules</li>
            </ul>


           
           

            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->

              <div class="chart tab-pane " id="Check" style="position: relative; height: 450px;">
                  </br>
                  <div  class="row">
                  <div class="col-md-12">
                      <div class="col-md-3">
                      <label>Venue:</label>
                      <div class="input-group">
                        <select class="form-control" id="venues"  name="venue">
                              <option></option>
                              <option>FR</option>
                              <option>Library</option>
                              <option>Back of Library</option>
                              <option>Left Side Gym</option>
                              <option>Right Side Gym</option>
                              <option>Gym Court</option>
                              <option>Stage</option>
                              <option>Back of Canteen</option>
                              <option>Other</option>
                          </select>
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-info btn-flat" id="Go">Go!</button>
                            </span>
                      </div>
                      <!-- /input-group -->
                      </div>
                      <div class="col-md-3">
                      <label>Date Start:</label>
                      <div class="form-group">
                            
                             <div class="input-group date">
                             <div class="input-group-addon">
                             <i class="fa fa-calendar"></i>
                             </div>
                             <input id="DateSS" name="DateSS" type="text" class="form-control pull-right" value="<?php echo $startd?>" readonly>
                             </div>
                        </div>
                        <!-- /.form-group -->     
                      </div>
                      <div class="col-md-3">
                      <label>Date End:</label>
                      <div class="form-group">
                             
                             <div class="input-group date">
                             <div class="input-group-addon">
                             <i class="fa fa-calendar"></i>
                             </div>
                             <input id="DateEE" name="DateEE" type="text" class="form-control pull-right" value="<?php echo $endd?>" readonly>
                             </div>
                        </div>
                        <!-- /.form-group -->    
                      </div>
                      
                  </div>
                  </div>

                  <div class="row">
                        <div class="result" id="result">
                        
                        </div>
                  </div>

              </div>
              <script>
              $('#Go').click(function() {
                  alert("Do search?");
                  var ven = $('#venues').val();
                  var sta = $('#DateSS').val();
                  var end = $('#DateEE').val();

                  $.ajax({
                      type: 'POST',
                      url: 'php/schedsearch.php',
                      data: {Ven: ven , Sta: sta , End: end },
                      success: function(response) {
                            $('#result').html(response);
                            
                      }
                  });
               });
            </script>

              <div class="chart tab-pane active" id="Main" style="position: relative; height: 400px;overflow-y: scroll;">

                <div class="row">
                <div class="col-md-3">
                    <input id="eventN" type="text" class="form-control" value="<?php echo "Venue: " . $venue . "  Date: " . $startd . " to " . $endd; ?>" readonly>
                </div>
                </div>

                <div class="row">
                <div class="col-md-12">
                </br>
                <?php
                foreach($daterange as $date){
                    $now =  $date->format("m/d/Y");
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
                          $query6 = "SELECT * FROM tbl_schedule Where EventID = '$id' And SportsID = '$id2' And Dates = '$now'";
                          $result6 = mysqli_query($link, $query6);
                          while($row = mysqli_fetch_assoc($result6)){
                          $match = $row['MatchID'];
                          echo "<tr>";
                          ?>
                          <td><a href="schedelete.php?id=<?php echo $match?>"><button class="btn btn-primary" style="width:100%"><?php
                          echo  "<b>Match No:</b> " . $row['MatchNo'] . "</br>" . "TimeStart: " . $row['StartTime'] ."</br>". "TimeEnd: " . $row['EndTime'] ."</br>". "Teams: " . $row['TeamA'] . "<b>  vs  </b>" . $row['TeamB'] . "</br><b>Venue</b>: " . $row['Venue'] ;
                          ?></button></a></td>
                          
                          <?php  
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



              </div><!-- /.check tab pane -->
            </div>
            </div>
            <!-- /.nav-tabs-custom -->




            </div>
            <!-- ./box-body -->
            <div class="box-footer">

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
        <form method="post">
          
        </form>
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
    //Date picker
    
    
    $('#eventE').datepicker({
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

<style>
              body.modal-open .datepicker {
                  z-index: 1050 !important;
              }
              body.modal-open .bootstrap-timepicker-widget {
                  z-index: 1050 !important;
              }
          </style>
          <!-- Modal -->
          <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="example-modal">
                  <div class="modal modal-primary">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Add Schedules</h4>
                        </div>
                        <div class="modal-body">
                        <div class="col-md-12">
                        <img src="../../dist/img/ACmap.jpg" width="100%" height="100%">
                        </div>
                        <form method="POST" action="php/scheduleadd.php">
                        <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                                    
                             <label>Event ID</label>

                             <div class="input-group date">
                             <div class="input-group-addon">
                             <i class="fa fa-calendar"></i>
                             </div>
                             <input name="txtEventID" type="text" class="form-control pull-right" value="<?php echo $id; ?>" readonly>
                             </div>
                             
                        </div>
                        <!-- /.form-group --> 	
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                                    
                             <label>Sports ID</label>

                             <div class="input-group date">
                             <div class="input-group-addon">
                             <i class="fa fa-soccer-ball-o"></i>
                             </div>
                             <input name="txtSportsID" type="text" class="form-control pull-right" value="<?php echo $id2; ?>"  readonly>
                             </div>
                             
                        </div>
                        <!-- /.form-group --> 
                        </div>
                        </div>
                        <div class="form-group">
                          <label>Venue</label>
                            <select class="form-control"  name="txtvenue">
                              <option></option>
                              <option>FR</option>
                              <option>Library</option>
                              <option>Back of Library</option>
                              <option>Left Side Gym</option>
                              <option>Right Side Gym</option>
                              <option>Gym Court</option>
                              <option>Stage</option>
                              <option>Back of Canteen</option>
                              <option>Other</option>
                             
                          </select>
                        </div>
                        <!-- /.form-group -->
                      	<div class="row">
                      	<div class="col-md-6">
                      	<div class="form-group">
                                    
                             <label>Date:</label>

                             <div class="input-group date">
                             <div class="input-group-addon">
                             <i class="fa fa-calendar"></i>
                             </div>
                             <!--<input id="eventS" name="txtDateS" type="text" class="form-control pull-right"  required> -->
                             <select id="eventS" name="txtDateS" class="form-control pull-right"  required>
                             <option></option>
                             <?php
                             foreach($daterange as $date){
                                 $now =  $date->format("m/d/Y");
                                 echo "<option>" . $now . "</option>";
                             }
                             ?>
                             </select>
                             </div>
                             
                        </div>
                        <!-- /.form-group -->  
                      	</div>
                      	<div class="col-md-6">
                      	<div class="form-group">
                                    
                             <label>Event Date Range</label>

                             <div class="input-group date">
                             <div class="input-group-addon">
                             <i class="fa fa-bookmark-o"></i>
                             </div>
                             <input name="txtD" type="text" class="form-control pull-right" value="<?php echo $startd ." to " . $endd; ?>"  readonly>
                             </div>
                        </div>
                        <!-- /.form-group --> 
                      	</div>
                      	</div>
                        <div class="row">
                        <div class="col-md-6">
                        <div class="bootstrap-timepicker">
                          <div class="form-group">
                            <label>Start Time:</label>

                            <div class="input-group">
                              <input type="text" class="form-control timepicker" name="txtStime">

                              <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                              </div>
                            </div>
                            <!-- /.input group -->
                          </div>
                          <!-- /.form group -->
                        </div>    
                        </div>
                        <div class="col-md-6">
                        <div class="bootstrap-timepicker">
                          <div class="form-group">
                            <label>End Time:</label>
                            <div class="input-group">
                              <input type="text" class="form-control timepicker" name="txtEtime">
                              <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                              </div>
                            </div>
                            <!-- /.input group -->
                          </div>
                          <!-- /.form group -->
                        </div>
                      </div>
                        </div>  
                        <div class="row">
                        <div class="col-md-5">
                        <div class="form-group">
                          <label>Team A</label>
                            <select class="form-control"  name="txtTeamA">
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
                              <?php
                              for($x = 1;$x <= 20; $x++){
                                echo "<option>" . "Winner of Match" . " " . $x . "</option>";
                              }
                              ?>
                              <?php
                              for($x = 1;$x <= 20; $x++){
                                echo "<option>" . "Loser of Match" . " " . $x . "</option>";
                              }
                              ?>
                              <option>Twice To Beat A</option>
                            </select>
                        </div>
                        <!-- /.form-group --> 
                        </div>
                        <div class="col-md-2">
                        </br>
                        </br>
                        <label>Versus</label>
                        </div>
                        <div class="col-md-5">
                        <div class="form-group">
                          <label>Team B</label>
                            <select class="form-control"  name="txtTeamB">
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
                              <?php
                              for($x = 1;$x <= 20; $x++){
                                echo "<option>" . "Winner of Match" . " " . $x . "</option>";
                              }
                              ?>
                              <?php
                              for($x = 1;$x <= 20; $x++){
                                echo "<option>" . "Loser of Match" . " " . $x . "</option>";
                              }
                              ?>
                              <option>Twice To Beat B</option>
                            </select>
                        </div>
                        <!-- /.form-group --> 
                        </div>
                        </div>
                        <label>Match No.</label>
                        <input type="text" name="txtMatch" class="form-control" value="<?php echo $count?>" readonly>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-outline pull-left">Add</button>
                          <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button> 
                          </form>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                </div>
                <!-- /.example-modal -->
            </div>
          </div>

          


</body>
</html>


       
