<?php
  include("../../conn/connection.php");

  include("../../conn/check2.php");
  
  date_default_timezone_set('Asia/Manila');
  // Prints something like: Monday
  $today = date("m/d/Y");
  $studid = $_GET['id'];
  $unique = array();
  $x = 0;
  $cont = "";

  if (!session_id()) session_start();
  if (!$_SESSION['logon']){ 
    header("Location: ../../login.php");
    die();
  }  
  $query = "SELECT * FROM tbl_admin where AdminID = '$user'  " ;
  $result = mysqli_query($link, $query);

  while($row = mysqli_fetch_assoc($result))
       {
        $fname = $row['Afname'];
        $lname = $row ['Alname'];
        $Aphoto = $row['Aphoto'];
       

       }

  $query1 = "SELECT * FROM tbl_esplayers where StudID = '$studid'  " ;
  $result1 = mysqli_query($link, $query1);

  $query2 = "SELECT * FROM tbl_students where StudID = '$studid'  " ;
  $result2 = mysqli_query($link, $query2);
   while($row = mysqli_fetch_assoc($result2)){
   		$name = $row['Sfname'] . " " . $row['Slname'];
   		$depid = $row['DepID'];
   }
  $query3 = "SELECT * FROM tbl_departments where DepID = '$depid'  " ;
  $result3 = mysqli_query($link, $query3);
   while($row = mysqli_fetch_assoc($result3)){
   		$depcode = $row['Depcode'];
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
    .example-modal .modal1 {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal1 {
      background: transparent !important;
    }
  </style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../starter.php" class="logo">
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
              <img src="upload/<?php echo $Aphoto; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $fname; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="upload/<?php echo $Aphoto; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $fname . " " . $lname ; ?>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="php/Logoutprocess.php" class="btn btn-default btn-flat">Sign out</a>
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
         <img src="upload/<?php echo $Aphoto; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $fname . " " . $lname ; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        
        <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i> <span>Sports Event</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="cevent.php">Create Sports Event</a></li>
            <li><a href="uevent.php">Update Sports Event</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-soccer-ball-o"></i> <span>Sports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="csport.php">Create Sports</a></li>
            <li><a href="usport.php">Update Sports</a></li>
          </ul>
        </li>
        
        
        
       

        <li><a href="users.php"><i class="fa fa-users"></i> <span>Users</span></a></li>

        <li class="treeview">
          <a href="#"><i class="fa fa-building"></i> <span>Departments</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="cdepartment.php">Create Department</a></li>
            <li><a href="updatedepartment.php">Update Department</a></li>
          </ul>
        </li>

        <li><a href="Report.php"><i class="fa fa-file"></i> <span>Reports</span></a></li>
        

        
      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Report
        <small>Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../../starter.html"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Report</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa  fa-bookmark-o"></i>
          <small class="pull-right"><b>Date:</b> <?php echo $today?></small>
        </h2>
        
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row ">
        <div class="col-md-12 " align="center">
              <img src="upload/covers/ACSEM.png" style="hieght:20px;width:200px;">
              <h3><b>Student Records</b></h3>
        </div>
    </div>
    <!-- /.row -->
    <div class="row ">
        <div class="col-md-10 col-md-push-2 ">
              <h4><b>Name: <?php echo $name;?></b>&nbsp&nbsp&nbsp&nbsp<b><?php echo $depcode?></b></h4>
        </div>
    </div>
    <!-- /.row -->
    <?php
    while($row = mysqli_fetch_assoc($result1)){
    	$eventid = $row['EventID'];

    	$unique[$x] = $eventid;
    	$x = $x + 1;

   	}
   	$cont = array_unique($unique);
   	foreach($cont as $x => $x_value) {
   		$query11 = "SELECT * FROM tbl_event where EventID = '$x_value'  " ;
  		$result11 = mysqli_query($link, $query11);
  		while($row = mysqli_fetch_assoc($result11)){
  			$eventn = $row['EventName'];
  		}
  		?>
    	
    	<div class="row ">
        <div class="col-md-10 col-md-push-2">
              <p><b>Eventname:</b><?php echo $eventn ?></p>
              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b>Sports:</b>
              <?php
              $query1 = "SELECT * FROM tbl_esplayers where StudID = '$studid' And EventID = '$x_value' " ;
  			  $result1 = mysqli_query($link, $query1);
  			  while($row = mysqli_fetch_assoc($result1)){
  				$sportsid = $row['SportsID'];
  				$query111 = "SELECT * FROM tbl_sports where SportsID = '$sportsid'  " ;
		  		$result111 = mysqli_query($link, $query111);
		  		while($row = mysqli_fetch_assoc($result111)){
		  				echo $row['SportsName'] . ", ";		
		  		}
  			  }
              ?>
        </div>
    	</div>
    	</br>
    	<?php
    }
    ?>




  

   

    

     

  </section>
  <!-- /.content -->



      

      

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
      
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
         
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      
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



       
</body>
</html>