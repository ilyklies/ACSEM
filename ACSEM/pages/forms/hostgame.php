<?php
	   include("../../conn/connection.php");
    
     include("../../conn/checker2.php");

     $id = $_SESSION["matchid"];
     $sportsname = $_SESSION["sportn"];
     $show1 = 0;
     $show2 = 0;
    
     //if (!$_SESSION['logon']){ 
     // header("Location: login.php");
      //die();
     //}  
     

     $query = "SELECT * FROM tbl_facilitator where FacilitatorID = '$user1'  " ;
     $result = mysqli_query($link, $query);

     while($row = mysqli_fetch_assoc($result))
       {
        $fname = $row['Ffname'];
        $lname = $row ['Flname'];
        $Fphoto = $row['Fphoto'];
       

       }

     $query1 = "SELECT * FROM tbl_sports Where SportsName = '$sportsname'" ;
     $result1 = mysqli_query($link, $query1);
     While($row = mysqli_fetch_assoc($result1)){
              
          $sportsid = $row['SportsID'];
          $categ = $row['SportsCategory'];
                 
     }
     
   
     $query1 = "SELECT * FROM tbl_schedule where MatchID = '$id'  " ;
         $result1 = mysqli_query($link, $query1);

         while($row = mysqli_fetch_assoc($result1))
           {
                $team1 = $row['TeamA'];
                $team2 = $row['TeamB'];
                $event = $row['EventID'];
  
           }
      $query0 = "SELECT * FROM tbl_departments where Depcode = '$team1'  " ;
      $result0 = mysqli_query($link, $query0);

          while($row = mysqli_fetch_assoc($result0))
            {
               $depcode1 = $row['Depcode'];
               $deplogo1 = $row['Deplogo'];
                        
            }
      $query00 = "SELECT * FROM tbl_departments where Depcode = '$team2'  " ;
      $result00 = mysqli_query($link, $query00);

          while($row = mysqli_fetch_assoc($result00))
            {
               $depcode2 = $row['Depcode'];
               $deplogo2 = $row['Deplogo'];
                        
            }
      $query0 = "SELECT * FROM tbl_gameplay Where MatchID = '$id' ";
      $result0 = mysqli_query($link, $query0);

      while($row = mysqli_fetch_assoc($result0)){
        
        $stat1 = $row['TeamAstat'];
        $stat2 = $row['TeamBstat'];

        $show1 = $show1 + $stat1;
        $show2 = $show2 + $stat2;
        
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

        
	   <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Match for <?php echo $sportsname . " " . $categ ?></h3>
          <small class="text-red"> Plss Dont Refresh Page When Scoring Starts</small>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
              <div class="row">
                    <div class="col-md-5">
                          <div class="nav-tabs-custom">
                            <!-- Tabs within a box -->
                            <ul class="nav nav-tabs pull-right">
                              
                              
                              <li class="pull-left header"><i class="fa fa-group"></i></li>
                            </ul>
                            <div class="tab-content no-padding">
                              <!-- Morris chart - Sales -->
                              <div class="row">
                                    <div class="col-md-12">
                                    <div class="row">
                                          <div class="col-md-4">
                                          </br>
                                          <input type="text" id="depcode1" name="txtTeam1" class="form-control" value="<?php echo $depcode1;?>" placeholder="Team" readonly>
                                          </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                    </br>
                                    
                                      <img class="profile-user-img img-responsive img-circle" src="upload/<?php echo $deplogo1;?>" alt="User profile picture">
                                       
                                    </div><!-- /.col -->
                                    <div class="col-md-6">
                                          </br>
                                          <div class="form-group">
                                          <input type="text" style="width: 100%; height: 100px; font-size: 30px; line-height: 18px; border: 1px solid #dddddd; padding: 10px; text-align:center;" id="Score1" readonly>
                  
                                          </div>
                                          
                                    </div><!-- /.col -->
                                    </div><!-- /.colMain -->
                                    
                              </div><!-- /.RowMain -->
                              <div class="row">
                                    <div class="col-md-12">
                                    <div class="col-md-12" align="center">

                                          <button id="botA1" class="btn btn-app" disabled>
                                            <i class="fa  fa-plus-square"></i><b>1</b>
                                          </button>
                                          <button id="botA2" class="btn btn-app" disabled>
                                            <i class="fa  fa-plus-square"></i><b>2</b>
                                          </button>
                                          <button id="botA3" class="btn btn-app" disabled>
                                            <i class="fa  fa-plus-square"></i><b>3</b>
                                          </button>
                                          <button id="botA4" class="btn btn-app" disabled>
                                            <i class="fa   fa-ban"></i><b>Default</b>
                                          </button>
                                          <button id="botA5" class="btn btn-app" disabled>
                                            <i class="fa   fa-eraser"></i><b>Clear</b>
                                          </button>

                                    </div><!-- /.col -->
                                    
                                    </div><!-- /.col -->
                              </div><!-- /.RowMain -->
                              <div class="row">
                              <div class="col-md-12">
                                    <div class="box box-default">
                                      <div class="box-header with-border">
                                        <i class="fa  fa-user"></i>

                                        <h3 class="box-title">Players</h3>
                                      </div>
                                      <!-- /.box-header -->
                                      <div class="box-body" style="max-height: 200px; min-height: 160px; overflow-y: scroll;">
                                       
                                       <table id="table1" class="table table-fixed">
                      
                                          <tr>
                                            <th width="30%">Student ID</th>
                                            <th width="70%">Name</th>
                                          </tr>
                                       <?php
                                        $queryAt = "SELECT * FROM tbl_esplaying where MatchID ='$id' AND Depcode = '$depcode1'";
                                        $resultAt = mysqli_query($link, $queryAt);
                                        while($row = mysqli_fetch_assoc($resultAt))
                                        {
                                              $studid = $row['StudID'];

                                              $queryO = "SELECT * FROM tbl_students where  StudID = '$studid'" ;
                                              $resultO = mysqli_query($link, $queryO);

                                              while($row = mysqli_fetch_assoc($resultO))
                                              {
                                                echo "<tr>";

                                                echo "<td>" . $row['StudID'] ."</td>";

                                                echo "<td>" . $row['Sfname'] . " " . $row['Smname'] . " " . $row['Slname'] . "</td>";  

                                              }
                                        }

                                       ?>
                                       
                                       </table>
                                        
                                      </div>
                                      <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->

                              </div><!-- /.col -->
                              </div><!-- /.RowMain -->
                              
                            </div>
                          </div>
                          <!-- /.nav-tabs-custom -->
                    </div><!-- /.col -->
                    <div class="col-md-2" >
                    
                    <div class="row">
                          <div class="col-md-12">
                                </br>
                                </br>
                                <div class="form-group has-feedback" align="center">
                                <label >Standings</label>
                                <div id="result">
                                <?php
                                echo $team1 . " " . $show1;
                                echo " - ";
                                echo $team2 . " " . $show2;
                                ?>
                                </div>
                                </div>
                          </div>
                          <div class="col-md-12" style="font-size:30px;text-align:center;line-height: 5em;">
                          VS
                          </div><!-- /.col -->
                          <div class="col-md-12">
                          <!-- select -->
                          <div class="form-group has-feedback" align="center">
                                        <label >Match ID</label>
                                        <input type="text" id="match" class="form-control"  id="Teamtxt1" value="<?php echo $id;?>"readonly >
                                      </div>
                          <div class="form-group">
                            
                            <select class="form-control" id="set" required>
                              <option></option>
                              <option>Game</option>
                              <option>Set 1</option>
                              <option>Set 2</option>
                              <option>Set 3</option>
                              <option>Set 4</option>
                              <option>Set 5</option>
                              
                              
                            </select>

                          </div>
                          
                          </div><!-- /.col -->
                          <div class="col-md-12">
                                <div class="form-group" align="center">
                                <button  id="start" class="btn btn-primary" >Start Match</button>
                                </div>
                                <div class="form-group" align="center">
                                     <button class="btn btn-primary" id="newgame" disabled>Submit</button>
                                </div>
                          </div>
                          
                    </div><!-- /.RowMain -->
                    
                    </div><!-- /.col -->
                    <div class="col-md-5">
                          <div class="nav-tabs-custom">
                            <!-- Tabs within a box -->
                            <ul class="nav nav-tabs pull-right">
                              
                              
                              <li class="pull-left header"><i class="fa fa-group"></i></li>
                            </ul>
                            <div class="tab-content no-padding">
                              <!-- Morris chart - Sales -->
                              <div class="row">
                                    <div class="col-md-12">
                                    <div class="row">
                                          <div class="col-md-4">
                                          </br>
                                          <input type="text" id="depcode2" name="txtTeam2" class="form-control" placeholder="Team" value="<?php echo $depcode2;?>" readonly>
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                    </br>
                                    
                                      <img class="profile-user-img img-responsive img-circle" src="upload/<?php echo $deplogo2;?>" alt="User profile picture">
                                       
                                    </div><!-- /.col -->
                                    <div class="col-md-6">
                                          </br>
                                          <div class="form-group">
                                          <input type="text" id="Score2" style="width: 100%; height: 100px; font-size: 30px; line-height: 18px; border: 1px solid #dddddd; padding: 10px; text-align:center;" readonly>
                  
                                          </div>
                                          
                                    </div><!-- /.col -->
                                    </div><!-- /.colMain -->
                                    
                              </div><!-- /.RowMain -->
                              <div class="row">
                                    <div class="col-md-12">
                                    <div class="col-md-12" align="center">
                                          <button id="botB1" class="btn btn-app" disabled>
                                            <i class="fa  fa-plus-square"></i><b>1</b>
                                          </button>
                                          <button id="botB2" class="btn btn-app" disabled>
                                            <i class="fa  fa-plus-square"></i><b>2</b>
                                          </button>
                                          <button id="botB3" class="btn btn-app" disabled>
                                            <i class="fa  fa-plus-square"></i><b>3</b>
                                          </button>
                                          <button id="botB4" class="btn btn-app" disabled>
                                            <i class="fa   fa-ban"></i><b>Default</b>
                                          </button>
                                          <button id="botB5" class="btn btn-app" disabled>
                                            <i class="fa   fa-eraser"></i><b>Clear</b>
                                          </button>
                                          
                                    </div><!-- /.col -->
                                    
                                    </div><!-- /.col -->
                              </div><!-- /.RowMain -->
                              <div class="row">
                              <div class="col-md-12">
                                    <div class="box box-default">
                                      <div class="box-header with-border">
                                        <i class="fa  fa-user"></i>

                                        <h3 class="box-title">Players</h3>
                                      </div>
                                      <!-- /.box-header -->
                                      <div class="box-body" style="max-height: 200px; min-height: 160px; overflow-y: scroll;">
                                            <table id="table2" class="table table-fixed">
                      
                                              <tr>
                                                <th width="30%">Student ID</th>
                                                <th width="70%">Name</th>
                                              <?php
                                              $queryAt = "SELECT * FROM tbl_esplaying where MatchID ='$id' AND Depcode = '$depcode2'";
                                              $resultAt = mysqli_query($link, $queryAt);
                                              while($row = mysqli_fetch_assoc($resultAt))
                                              {
                                                    $studid = $row['StudID'];

                                                    $queryO = "SELECT * FROM tbl_students where  StudID = '$studid'" ;
                                                    $resultO = mysqli_query($link, $queryO);

                                                    while($row = mysqli_fetch_assoc($resultO))
                                                    {
                                                      echo "<tr>";

                                                      echo "<td>" . $row['StudID'] ."</td>";

                                                      echo "<td>" . $row['Sfname'] . " " . $row['Smname'] . " " . $row['Slname'] . "</td>";  

                                                    }
                                              }

                                             ?>  
                                               
                                                
                                              </tr>
                                            </table>
                                      </div>
                                      <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->

                              </div><!-- /.col -->
                              </div><!-- /.RowMain -->

                            </div>
                          </div>
                          <!-- /.nav-tabs-custom -->
                    </div><!-- /.col -->
              </div>
                
                 
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
         <div class="form-group">
                <button class="btn btn-success" id="Done" >Done</button>
         </div> 
        </div>

      </div>
      <!-- /.box -->

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Teams</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        
       

        <div class="row">
              <div class="col-md-6">
              
                <?php
                  $query2 = "SELECT * FROM tbl_departments where Depcode = '$team1'  " ;
                  $result2 = mysqli_query($link, $query2);

                  while($row = mysqli_fetch_assoc($result2))
                  {
                        $did = $row['DepID'];

                        $query1 = "SELECT * FROM tbl_esplayers where EventID ='$id' AND DepID = '$did'" ;
                        $result1 = mysqli_query($link, $query1);
                  }
                ?>

                 <div class="box" >
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $team1; ?>  Team</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body" style="max-height: 450px; min-height: 350px; overflow-y: scroll;">
              
              <table id="tableleft" class="table table-fixed">
                      
                      <tr>
                        <th width="30%">Student ID</th>
                        <th width="50%">Name</th>
                        
                        <th >Action</th>
                        
                      </tr>
                      
                     

                      <?php
                      
                     


                      $query1 = "SELECT * FROM tbl_esplayers where EventID ='$event' AND DepID = '$did' AND SportsID = '$sportsid'" ;
                      $result1 = mysqli_query($link, $query1);

                      while($row = mysqli_fetch_assoc($result1)){
                      $stud = $row['StudID'];
                              $query2 = "SELECT * FROM tbl_students where StudID = '$stud'" ;
                              $result2 = mysqli_query($link, $query2);
                              while($row = mysqli_fetch_assoc($result2)){
                                  echo "<tr>";

                                  echo "<td>" . $row['StudID'] ."</td>";

                                  echo "<td>" . $row['Sfname'] . " " . $row['Smname'] . " " . $row['Slname'] . "</td>";  
                              ?>
                              <td><button id="bot1" class="btn btn-primary" >Select</button></td>
                              <?php
                              }

                      
                      
                     
                      ?>
                      
                      <?php
                      
                      echo "<tr>";

                      }//1st query;
                  
                      ?>
                      

                     
                      
   
                    </table>

              </div>
              <!-- ./box-body -->
              <div class="box-footer">
              
              </div>
              <!-- /.box-footer -->
              </div>
              <!-- /.box -->

              </div>
              <div class="col-md-6">

                <?php
                  $query2 = "SELECT * FROM tbl_departments where Depcode = '$team2'  " ;
                  $result2 = mysqli_query($link, $query2);

                  while($row = mysqli_fetch_assoc($result2))
                  {
                        $did = $row['DepID'];

                        $query1 = "SELECT * FROM tbl_esplayers where EventID ='$id' AND DepID = '$did'" ;
                        $result1 = mysqli_query($link, $query1);
                  }
                ?>

                 <div class="box" >
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $team2; ?>  Team</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body" style="max-height: 450px; min-height: 350px; overflow-y: scroll;">
              
              <table id="tableright" class="table table-fixed">
                      
                      <tr>
                        <th width="30%">Student ID</th>
                        <th width="50%">Name</th>
                        
                        <th >Action</th>
                        
                      </tr>
                      
                     

                      <?php
                      
                     


                      $query1 = "SELECT * FROM tbl_esplayers where EventID ='$event' AND DepID = '$did' AND SportsID = '$sportsid'" ;
                      $result1 = mysqli_query($link, $query1);

                      while($row = mysqli_fetch_assoc($result1)){
                      $stud = $row['StudID'];
                              $query2 = "SELECT * FROM tbl_students where StudID = '$stud'" ;
                              $result2 = mysqli_query($link, $query2);
                              while($row = mysqli_fetch_assoc($result2)){
                                  echo "<tr>";

                                  echo "<td>" . $row['StudID'] ."</td>";

                                  echo "<td>" . $row['Sfname'] . " " . $row['Smname'] . " " . $row['Slname'] . "</td>";  
                              ?>
                              <td><button id="bot2" class="btn btn-primary" >Select</button></td>
                              <?php
                              }

                      
                      
                     
                      ?>
                      
                      <?php
                      
                      echo "<tr>";

                      }//1st query;
                  
                      ?>
                      

                     
                      
   
                    </table>

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
        <!-- /.box-body -->
        <div class="box-footer">
         
          <div  id="result1" class="form-group has-error">
                  
                  
                </div>
        </div>

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

  var Score1 = 0;
  var Score2 = 0;
  var def = 0;

                 $(document).ready(function(){
                    $(document).on("click", "#botA1", function() {
                      Score1 = Score1 + 1;
                      document.getElementById("Score1").value = Score1;
                      callScore1();
                    });
                    $(document).on("click", "#botA2", function() {
                      Score1 = Score1 + 2;
                      document.getElementById("Score1").value = Score1;
                      callScore1();
                    });
                    $(document).on("click", "#botA3", function() {
                      Score1 = Score1 + 3;
                      document.getElementById("Score1").value = Score1;
                      callScore1();
                    });
                    $(document).on("click", "#botA4", function() {
                      
                      document.getElementById("Score1").value = def;
                      callScore1();
                    });
                    $(document).on("click", "#botA5", function() {
                      Score1 = Score1 - Score1;
                      document.getElementById("Score1").value = Score1;
                      callScore1();
                    });
                   
                  });

                  $(document).ready(function(){
                    $(document).on("click", "#botB1", function() {
                      Score2 = Score2 + 1;
                      document.getElementById("Score2").value = Score2;
                      callScore1();
                    });
                    $(document).on("click", "#botB2", function() {
                      Score2 = Score2 + 2;
                      document.getElementById("Score2").value = Score2;
                      callScore1();
                    });
                    $(document).on("click", "#botB3", function() {
                      Score2 = Score2 + 3;
                      document.getElementById("Score2").value = Score2;
                      callScore1();
                    });
                    $(document).on("click", "#botB4", function() {
                      
                      document.getElementById("Score2").value = def;
                      callScore1();
                    });
                    $(document).on("click", "#botB5", function() {
                      Score2 = Score2 - Score2;
                      document.getElementById("Score2").value = Score2;
                      callScore1();
                    });
                   
                  });


                  $(document).ready(function(){
                    $(document).on("click", "#bot1", function() {
                      $(this).prop("disabled", true);
                      $(this).text("Selected");
                    });

                    // code to read selected table row cell data (values).
                    $("#tableleft").on('click','.btn',function(){
                         // get the current row
                        var currentRow=$(this).closest("tr"); 
                         
                        var col1=currentRow.find("td:eq(0)").html(); // get current row 1st table cell TD value
                        var col2=currentRow.find("td:eq(1)").html(); // get current row 2nd table cell TD value
                      
                        

                        
                        var table = document.getElementById("table1");
                        var row = table.insertRow(-1);
                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);
                       

                        cell1.innerHTML = col1;
                        cell2.innerHTML = col2;
                        
                        
                        
                       

                    });
                  });

                  $(document).ready(function(){
                    $(document).on("click", "#bot2", function() {
                      $(this).prop("disabled", true);
                      $(this).text("Selected");
                    });

                    // code to read selected table row cell data (values).
                    $("#tableright").on('click','.btn',function(){
                         // get the current row
                        var currentRow=$(this).closest("tr"); 
                         
                        var col1=currentRow.find("td:eq(0)").html(); // get current row 1st table cell TD value
                        var col2=currentRow.find("td:eq(1)").html(); // get current row 2nd table cell TD value
                      
                        

                        
                        var table = document.getElementById("table2");
                        var row = table.insertRow(-1);
                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);
                       

                        cell1.innerHTML = col1;
                        cell2.innerHTML = col2;
                        
                        
                        
                       

                    });
                  });


                  $('#start').click(function() {

                  var r = confirm("Are you sure you want to Start Game!");
                        if (r == true) {

                          $(document).on("click", "#start", function() {
                          $(this).prop("disabled", true);
                          
                          }); 
                          
                        document.getElementById("Score1").value = 0;
                        document.getElementById("Score2").value = 0;
                        document.getElementById("newgame").disabled = false;
                        document.getElementById("botA1").disabled = false;
                        document.getElementById("botA2").disabled = false;
                        document.getElementById("botA3").disabled = false;
                        document.getElementById("botA4").disabled = false;
                        document.getElementById("botA5").disabled = false; 
                        
                        document.getElementById("botB1").disabled = false;
                        document.getElementById("botB2").disabled = false;
                        document.getElementById("botB3").disabled = false;
                        document.getElementById("botB4").disabled = false;
                        document.getElementById("botB5").disabled = false;   
                        
                        document.getElementById("set").disabled = true;                      
                            
                        var matchid = $('#match').val();
                        var gameset = $('#set').val();
                        $.ajax({

                        type: 'POST',
                        url: 'php/setmatch.php',
                        data: { MatchID: matchid, GameSet: gameset},
                        success: function(response) {
                              
                              callA();
                        }

                        });

                        function callA() {
                        $("#table1 tr:gt(0)").each(function () {
                          
                          var matchid = $('#match').val();
                          var gameset = $('#set').val();
                          var depcode = $('#depcode1').val();

                          var this_row = $(this);
                          var playerid = $.trim(this_row.find('td:eq(0)').html());//td:eq(0) means first td of this row
                          
                          $.ajax({
                              type: 'POST',
                              url: 'php/playerplaying.php',
                              data: { PlayerID: playerid , MatchID: matchid, GameSet: gameset , DepCode: depcode},
                              success: function(response) {
                                   callB();
                                   
                              }
                          });

                         });
                         }

                        function callB() {
                        $("#table2 tr:gt(0)").each(function () {
                          
                          var matchid = $('#match').val();
                          var gameset = $('#set').val();
                          var depcode = $('#depcode2').val();
                          

                          var this_row = $(this);
                          var playerid = $.trim(this_row.find('td:eq(0)').html());//td:eq(0) means first td of this row
                          
                          $.ajax({
                              type: 'POST',
                              url: 'php/playerplaying.php',
                              data: { PlayerID: playerid , MatchID: matchid, GameSet: gameset , DepCode: depcode},
                              success: function(response) {
                                  
                                   
                              }
                          });

                         });
                         }

                        }//if
                        else{
                          
                        }//else
                  });//click end

                   function callScore1() {
                                      
                          var matchid = $('#match').val();
                          var gameset = $('#set').val();
                          var tscore1 = $('#Score1').val();
                          var tscore2 = $('#Score2').val();
                          var status = "NotDone";

                          $.ajax({
                              type: 'POST',
                              url: 'php/scoring.php',
                              data: { MatchID: matchid, GameSet: gameset , TScore1: tscore1, TScore2: tscore2 , Status: status},
                              success: function(response) {
                                  
                                   $('#result').html(response);
                              }
                          });                
                   }

                  $('#newgame').click(function() {

                    var r = confirm("Submiting Score!");
                        if (r == true) {

                          $(document).on("click", "#newgame", function() {
                          $(this).prop("disabled", true);
                          
                          }); 
                          var matchid = $('#match').val();
                          var gameset = $('#set').val();
                          var tscore1 = $('#Score1').val();
                          var tscore2 = $('#Score2').val();
                          var status = "Done";

                          $.ajax({
                              type: 'POST',
                              url: 'php/finalscore.php',
                              data: { MatchID: matchid, GameSet: gameset , TScore1: tscore1, TScore2: tscore2 , Status: status},
                              success: function(response) {
                                  
                                   $('#result').html(response);
                              }
                          });
                          
                          document.getElementById("Score1").value = 0;
                          document.getElementById("Score2").value = 0;
                          document.getElementById("newgame").disabled = true;
                          document.getElementById("botA1").disabled = true;
                          document.getElementById("botA2").disabled = true;
                          document.getElementById("botA3").disabled = true;
                          document.getElementById("botA4").disabled = true;
                          document.getElementById("botA5").disabled = true; 
                          
                          document.getElementById("botB1").disabled = true;
                          document.getElementById("botB2").disabled = true;
                          document.getElementById("botB3").disabled = true;
                          document.getElementById("botB4").disabled = true;
                          document.getElementById("botB5").disabled = true;   
                          
                          document.getElementById("set").disabled = false;
                          document.getElementById("start").disabled = false;
                          document.getElementById("set").value = "";
                          Score1 = Score1 - Score1; 
                          Score2 = Score2 - Score2;
                        }
                          
                  
                  });//click end


                  $('#Done').click(function() {

                    var r = confirm("Submiting Match Result!");
                        if (r == true) {
                            var matchid = $('#match').val(); 


                            $.ajax({
                              type: 'POST',
                              url: 'php/matchresult.php',
                              data: { MatchID: matchid},
                              success: function(response) {
                                  
                                   $('#result1').html(response);
                                   window.location.replace("host.php");
                              }
                             });
                        }

                   });//click end

  	
</script>
</body>
</html>
