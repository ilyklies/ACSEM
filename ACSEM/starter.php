<?php
  include("conn/connection.php");
  include("conn/check.php");

   

  date_default_timezone_set('Asia/Manila');
    
  $today = date("m/d/Y"); 
  
  
  
  $StartDate =  date("m/d/Y",strtotime('monday this week'));
  
  $Enddate = date("m/d/Y",strtotime('sunday this week'));

  if(isset($_SESSION['logon']) && $_SESSION['logon'] !=''){
 
 
  }else{
      header("Location: login.php");
      die();
  }
  //if (!$_SESSION['logon']){ 
   // header("Location: login.php");
    //die();
  //}  
  

  $query = "SELECT * FROM tbl_admin where AdminID = '$user'  " ;
  $result = mysqli_query($link, $query);

  while($row = mysqli_fetch_assoc($result))
       {
        $fname = $row['Afname'];
        $lname = $row ['Alname'];
        $Aphoto = $row['Aphoto'];
       

       }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ACSEM</title>
  <link rel="shortcut icon" href="images/ar.png" style="width:50%;height:10%;" type="image/x-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

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
    <a href="starter.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="images/ar.png" style="width:70%; height:10%;"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><img src="images/Fiacsem.png" style="width:65%; height:5%;"></b></span>
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
              <img src="pages/forms/upload/<?php echo $Aphoto; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $fname; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="pages/forms/upload/<?php echo $Aphoto; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $fname . " " . $lname ; ?>
                  <small>ADMIN</small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="pages/forms/profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="Logoutprocess.php" class="btn btn-default btn-flat">Sign out</a>
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
          <img src="pages/forms/upload/<?php echo $Aphoto; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $fname . " " . $lname ; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online Admin</a>
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
            <li><a href="pages/forms/cevent.php">Create Sports Event</a></li>
            <li><a href="pages/forms/uevent.php">Update Sports Event</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-soccer-ball-o"></i> <span>Sports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/csport.php">Create Sports</a></li>
            <li><a href="pages/forms/usport.php">Update Sports</a></li>
          </ul>
        </li>
        
        
        
        

        

        <li><a href="pages/forms/users.php"><i class="fa fa-users"></i> <span>Users</span></a></li>

        
        <li class="treeview">
          <a href="#"><i class="fa fa-building"></i> <span>Departments</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/cdepartment.php">Create Department</a></li>
            <li><a href="pages/forms/updatedepartment.php">Update Department</a></li>
          </ul>
        </li>

        <li><a href="pages/forms/Report.php"><i class="fa fa-file"></i> <span>Reports</span></a></li>
        

        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SPORTS EVENT <small>preview</small>

      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        
      </ol>
     
    </section>

    <!-- Main content -->
    <section class="content">
      
    
    <div class="row">
    <div class="col-md-3">
    <h3>Ongoing</h3>
    </div>
    </div>


    <div class="row">
       
     
     <?php
      $query = "SELECT * FROM tbl_event Where EventStart <= '$today' AND EventEnd >= '$today'";
      
      $result = mysqli_query($link, $query);


      while($row = mysqli_fetch_assoc($result)){
          $eventid  = $row['EventID'];
          $eventname = $row['EventName'];
          $events = $row['EventStart'];
          $evente =  $row['EventEnd'];
          $eventp = $row['Eventphoto']; 
          ?>



          <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url('pages/forms/upload/<?php echo $eventp; ?>') center center;">
              <h3 class="widget-user-username"><b><?php echo $eventname; ?></b></h3>
              <h5 class="widget-user-desc">Ongoing</h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="dist/img/ac.png" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                    <span class="description-text"></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">View</h5>
                    <span class="description-text"><a href="pages/forms/eventdetails.php?id=<?php echo $eventid;?>">Click Here</a></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                    <span class="description-text"></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->
    
      <?php
      }
      ?>

      </div> <!-- /.div -->

      <div class="row">
      <div class="col-md-3">
      <h3>Up Coming</h3>
      </div>
      </div>

      <div class="row">
       
     
     <?php
      $query = "SELECT * FROM tbl_event Where EventStart > '$today'" ;
      $result = mysqli_query($link, $query);

      while($row = mysqli_fetch_assoc($result)){
          
          $eventid  = $row['EventID'];
          $eventname = $row['EventName'];
          $events = $row['EventStart'];
          $evente =  $row['EventEnd'];
          $eventp = $row['Eventphoto']; 
          ?>



          <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url('pages/forms/upload/<?php echo $eventp; ?>') center center;">
              <h3 class="widget-user-username"><b><?php echo $eventname; ?></b></h3>
              <h5 class="widget-user-desc">Upcoming</h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="dist/img/ac.png" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                    <span class="description-text"></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">View</h5>
                    <span class="description-text"><a href="pages/forms/eventdetails.php?id=<?php echo $eventid;?>">Click Here</a></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                    <span class="description-text"></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->
    
      <?php
      }
      ?>

      </div> <!-- /.div -->

      <div class="row">
      <div class="col-md-3">
      <h3>Done</h3>
      </div>
      </div>

      <div class="row">
       
     
     <?php
      $query = "SELECT * FROM tbl_event Where EventEnd < '$today'";
      $result = mysqli_query($link, $query);

      while($row = mysqli_fetch_assoc($result)){
          $eventid  = $row['EventID'];
          $eventname = $row['EventName'];
          $events = $row['EventStart'];
          $evente =  $row['EventEnd'];
          $eventp = $row['Eventphoto']; 
          ?>



          <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url('pages/forms/upload/<?php echo $eventp; ?>') center center;">
              <h3 class="widget-user-username"><b><?php echo $eventname; ?></b></h3>
              <h5 class="widget-user-desc">Done</h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="dist/img/ac.png" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                    <span class="description-text"></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">View</h5>
                    <span class="description-text"><a href="pages/forms/eventdetails.php?id=<?php echo $eventid;?>">Click Here</a></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                    <span class="description-text"></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->
    
      <?php
      }
      ?>

      </div> <!-- /.div -->



        
      





      



    </section>
    <!-- /.content -->
   
    <!-- Main content -->
   
   
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

     
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
