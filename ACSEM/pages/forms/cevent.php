<?php
  include("../../conn/connection.php");
  include("../../conn/check2.php");
  


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
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ACSEM</title>
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
                  <small>ADMIN</small>
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

        <li><a href="#"><i class="fa fa-file"></i> <span>Reports</span></a></li>
        

        
      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Sports
        <small>Event</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../../starter.html"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create Event</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Create</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          
            
            <div class="tab-content">

                  <div class="active tab-pane" id="tab1">
                  <div class="row">
                    <div class="col-md-6">
                        <form>
                        <div class="form-group">
                          
                            <label>Event Name</label>
                            <input id="eventN" type="text" class="form-control" placeholder="Type here ..." required>
                          
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                          
                          <label>Event Description</label>
                          <textarea id="eventD" class="form-control" rows="3" placeholder="Type here ..." required></textarea>

                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                          
                          <label>Start Date:</label>

                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input id="eventS" name="txtDateS" type="text" class="form-control pull-right" required>
                          </div>
                          <!-- /.input group -->
                        </div>
                        <!-- /.form-group -->


                        <div class="form-group">
                          
                          <label>End Date:</label>

                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input id="eventE" name="txtDateE" type="text" class="form-control pull-right" required>
                          </div>
                          <!-- /.input group -->
                        </div>
                        <!-- /.form-group -->
                        

                  </div><!-- /.COL MD 6 -->





           
                <div class="col-md-6">
                      <div class="form-group">
                
                          <div class="col-sm-12 ">
                    				      
                            <div id="image_preview" style="width:200; height:200;">
                              <img id="previewing" src="data:image/jpeg;base64,'.base64_encode( noimage.png ). ' " width="200" height="200" />
                            </div>
            
                            <br>
                            <label>Select Your Image</label><br/>
                            <input type="file" name="file" id="file" required />
                            <br>
                    				
    						            
				                  </div> <!--COL SM 12-->
					
                      </div>
                      <!-- /.form-group -->
                
                
                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->

            
            <div ="row">
            <div class="form-group">
            <button type="submit" class="btn btn-primary" data-toggle="tab" href="#tab2">Next</button>
            </form>
            </div>
            </div><!--Row end-->



              	
            <!-- Post -->
            </div>
            <!-- /.tab-pane -->


              <div class="tab-pane" id="tab2">
                
               <div class="row">
               <div class="col-sm-6">
               <div class="box box-primary">
		            <div class="box-header">
		              <h3 class="box-title">Imported Sports</h3>

		              
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body table-responsive no-padding" style="max-height: 350px; min-height: 250px; overflow-y: scroll;">
                  <table id="myTable" class="table table-fixed">
		               <tr>
                      <th width="18%">Sports ID</th>
                      <th >Sports Name</th>
                      <th >Category</th>
                      <th width="15%" >Action</th>
                    </tr>
		                
		              </table>
		            </div>
		            <!-- /.box-body -->
		          </div>
		          <!-- /.box -->
		          
		         

               </div>
               <div class="col-sm-6">
               <div class="box box-primary">
		            <div class="box-header">
		              <h3 class="box-title">Sports List</h3>

		              <div class="box-tools">
		                
		              </div>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body table-responsive no-padding" style="max-height: 350px; min-height: 250px; overflow-y: scroll;" >
                  <table id="table2" class="table table-fixed">

		                <tr>
                      <th width="20%">Sports ID</th>
                      <th >Sports Name</th>
                      <th >Category</th>
                      <th >Type</th>
                    </tr>

                    <?php
                    $query = "SELECT * FROM tbl_sports order by SportsName";
                    $result = mysqli_query($link, $query);
                    while($row = mysqli_fetch_assoc($result)){
                         
                    
                    echo "<tr>";
                    echo "<td>" . $row['SportsID'] ."</td>";
                    echo "<td>" . $row['SportsName'] ."</td>";
                    echo "<td>" . $row['SportsCategory'] ."</td>";
                    
                    ?>
                    <td><button id="bot" class="btn btn-primary" >Add</button></td>
                    <?php

                    echo "<tr>";

                    }
                    ?>
		                
		              </table>
		            </div>
		            <!-- /.box-body -->
		          </div>
		          <!-- /.box -->

              <script>
                
                
                
                    

          

               </script>


               </div>
               </div>

                <div ="row">
                <div class="form-group">
                
                <button type="submit" class="btn btn-primary" data-toggle="tab" href="#tab1">Back</button>
                <button type="submit" class="btn btn-primary" data-toggle="tab" href="#tab3">Next</button>
                </div>
                </div><!--Row end-->


              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab3">

              <div class="row">
               <div class="col-sm-6">
               <div class="box box-primary">
		            <div class="box-header">
		              <h3 class="box-title">Participating Deparments/Teams</h3>

		              
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body table-responsive no-padding" style="max-height: 350px; min-height: 250px; overflow-y: scroll;">
                  <table id="myTable1" class="table table-fixed">
		                <tr>
                      <th width="18%">DepID</th>
		                  <th>DepCode</th>
		                  <th>Description</th>
		                  <th>Action</th>
		                  
		                </tr>
		                
		              </table>
		            </div>
		            <!-- /.box-body -->
		          </div>
		          <!-- /.box -->
		          
		          

               </div>
               <div class="col-sm-6">
               <div class="box box-primary">
		            <div class="box-header">
		              <h3 class="box-title">Departments List</h3>

		              <div class="box-tools">
		                
		              </div>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body table-responsive no-padding" style="max-height: 350px; min-height: 250px; overflow-y: scroll;" >
                  <table id="table3" class="table table-fixed">
		                <tr>
                      <th width="18%">DepID</th>
		                  <th>DepCode</th>
                      <th>Description</th>
                      <th>Action</th>
		                </tr>
                    <?php
                    $query = "SELECT * FROM tbl_departments order by Depcode";
                    $result = mysqli_query($link, $query);
                    while($row = mysqli_fetch_assoc($result)){
                         
                    
                    echo "<tr>";
                    echo "<td>" . $row['DepID'] ."</td>";
                    echo "<td>" . $row['Depcode'] ."</td>";
                    echo "<td>" . $row['Depdes'] ."</td>";
                    
                    ?>
                    <td><button id="bot1" class="btn btn-primary" >Add</button></td>
                    <?php

                    echo "<tr>";

                    }
                    ?>
		                
		              </table>
		            </div>
		            <!-- /.box-body -->
		           </div>
		           <!-- /.box -->

               <script>
                
                
                
                    

          

               </script>

                
               </div>
               </div>

                <div ="row">
                <div class="form-group">
                
                <button type="submit" class="btn btn-primary" data-toggle="tab" href="#tab2">Back</button>
                <button type="submit" class="btn btn-primary" data-toggle="tab" href="#tab4">Next</button>
                </div>
                </div><!--Row end-->
                
              </div>
              <!-- /.tab-pane -->

              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab4">

              <div class="row">
               <div class="col-sm-6">
               <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Selected Facilitators</h3>

                  
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding" style="max-height: 350px; min-height: 250px; overflow-y: scroll;">
                  <table id="myTable2" class="table table-fixed">
                    <tr>
                      <th width="18%">ID</th>
                      <th >Name</th>
                      <th>Action</th>
                      
                    </tr>
                    
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
              
              

               </div>
               <div class="col-sm-6">
               <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Facilitators List</h3>

                  <div class="box-tools">
                    
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding" style="max-height: 350px; min-height: 250px; overflow-y: scroll;" >
                  <table id="table4" class="table table-fixed">
                    <tr>
                      <th width="18%">ID</th>
                      <th>Name</th>
                      <th>Action</th>
                      
                    </tr>
                    <?php
                      $query = "SELECT * FROM tbl_facilitator order by Ffname";
                      $result = mysqli_query($link, $query);
                      while($row = mysqli_fetch_assoc($result)){
                           
                      
                      echo "<tr>";
                      echo "<td>" . $row['FacilitatorID'] ."</td>";
                      echo "<td>" . $row['Ffname'] . " " . $row['Ffname'] . " " . $row['Flname'] ."</td>";
                      
                      
                      ?>
                      <td><button id="bot2" class="btn btn-primary" >Add</button></td>
                      <?php

                      echo "<tr>";

                      }
                    ?>
                    
                  </table>
                </div>
                <!-- /.box-body -->
               </div>
               <!-- /.box -->

               <script>
                
                
                
                    

          

               </script>

               </div>
               </div>

                <div ="row">
                <div class="form-group">
                
                <button  class="btn btn-primary" data-toggle="tab" href="#tab3">Back</button>
                <input type="submit" value="Save" class="btn btn-primary" id="button" />
                
                </div>
                </div><!--Row end-->
                
              </div>
              <!-- /.tab-pane -->


            </div>
            <!-- /.tab-content -->
          
          
            
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        
           
        	
        	<div class="form-group has-error">
                  <label class="control-label" for="inputError">Please fill out everything</label>
                  
                </div>

          <div id="result"></div>
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
    $('#eventS').datepicker({
      autoclose: true
    });
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

</body>
</html>

<script>

                    $(document).ready(function(){
                    $(document).on("click", "#bot", function() {
                      $(this).prop("disabled", true);
                      $(this).text("Added");
                    });

                    // code to read selected table row cell data (values).
                    $("#table2").on('click','.btn',function(){
                         // get the current row
                        var currentRow=$(this).closest("tr"); 
                         
                        var col1=currentRow.find("td:eq(0)").html(); // get current row 1st table cell TD value
                        var col2=currentRow.find("td:eq(1)").html(); // get current row 2nd table cell TD value
                        var col3=currentRow.find("td:eq(2)").html(); // get current row 3rd table cell  TD value

                        var table = document.getElementById("myTable");
                        var row = table.insertRow(-1);
                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);
                        var cell3 = row.insertCell(2);
                        var cell4 = row.insertCell(3);
                        var cell5 = row.insertCell(4);

                        cell1.innerHTML = col1;
                        cell2.innerHTML = col2;
                        cell3.innerHTML = col3;
                        
                        cell4.innerHTML = '<button class="btn btn-primary"> Remove</button>';

                    });
                  });

                  $("#myTable").on('click','.btn',function(){
                      $(this).closest('tr').remove();
                  });
                  
                  
                  $(document).ready(function(){
                    $(document).on("click", "#bot1", function() {
                      $(this).prop("disabled", true);
                      $(this).text("Added");
                    });

                    // code to read selected table row cell data (values).
                    $("#table3").on('click','.btn',function(){
                         // get the current row
                         var currentRow=$(this).closest("tr"); 
                         
                         var col1=currentRow.find("td:eq(0)").html(); // get current row 1st table cell TD value
                         var col2=currentRow.find("td:eq(1)").html(); // get current row 2nd table cell TD value
                         var col3=currentRow.find("td:eq(2)").html(); // get current row 3rd table cell  TD value

                        var table = document.getElementById("myTable1");
                        var row = table.insertRow(-1);
                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);
                        var cell3 = row.insertCell(2);
                        var cell4 = row.insertCell(3);

                        cell1.innerHTML = col1;
                        cell2.innerHTML = col2;
                        cell3.innerHTML = col3;
                        cell4.innerHTML = '<button class="btn btn-primary"> Remove</button>';

                    });
                  }); 

                  $("#myTable1").on('click','.btn',function(){
                      $(this).closest('tr').remove();
                  }); 


                  $(document).ready(function(){
                    $(document).on("click", "#bot2", function() {
                      $(this).prop("disabled", true);
                      $(this).text("Added");
                    });

                    // code to read selected table row cell data (values).
                    $("#table4").on('click','.btn',function(){
                         // get the current row
                         var currentRow=$(this).closest("tr"); 
                         
                         var col1=currentRow.find("td:eq(0)").html(); // get current row 1st table cell TD value
                         var col2=currentRow.find("td:eq(1)").html(); // get current row 2nd table cell TD value
                         var col3=currentRow.find("td:eq(2)").html(); // get current row 3rd table cell  TD value

                        var table = document.getElementById("myTable2");
                        var row = table.insertRow(-1);
                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);
                        var cell3 = row.insertCell(2);
                        
                        cell1.innerHTML = col1;
                        cell2.innerHTML = col2;
                        cell3.innerHTML = '<button class="btn btn-primary"> Remove</button>'; 

                    });
                  });

                  $("#myTable2").on('click','.btn',function(){
                      $(this).closest('tr').remove();
                  });

                 
                 function myFunction() {
            
             
                 
                
               
                 }
                 $('#button').click(function() {

                  var r = confirm("Are you sure you want to continue!");
                  if (r == true) {
                      
                  var eventn = $('#eventN').val();
                  var eventd = $('#eventD').val();
                  var events = $('#eventS').val();
                  var evente = $('#eventE').val();
                  var efile = $('#file').val();

                  data = new FormData();
                  data.append('file', $('#file')[0].files[0]);
                  $.ajax({
                      url: "ajax_php_file.php",
                      type: "POST",
                      data: data,
                      enctype: 'multipart/form-data',
                      processData: false,  // tell jQuery not to process the data
                      contentType: false,   // tell jQuery not to set contentType
                      success: function(response) {
                              callA();
                      }
                  });

                  function callA() {
                  $.ajax({
                      type: 'POST',
                      url: 'php/eventadd.php',
                      data: { Eventname: eventn, Eventdes: eventd , Eventsdate: events , Eventedate: evente , Eventfile: efile   },
                      success: function(response) {
                            $('#result').html(response);
                            callB();
                      }
                  });}
                  function callB() {
                  $("#myTable tr:gt(0)").each(function () {
                  
                    var this_row = $(this);
                    var sportsid = $.trim(this_row.find('td:eq(0)').html());//td:eq(0) means first td of this row
                    var sname = $.trim(this_row.find('td:eq(1)').html())
                    var scat = $.trim(this_row.find('td:eq(2)').html())
                    
                    //alert( productId + " " +  product + " " + Quantity);

                    $.ajax({
                        type: 'POST',
                        url: 'php/processJSONarray.php',
                        data: { SportsID: sportsid },
                        success: function(response) {
                            
                             $('#result').html(response);
                        }
                    });



                   });
                   }

                   callC();
                   function callC() {
                   $("#myTable1 tr:gt(0)").each(function () {
                  
                    var this_row = $(this);
                    var depid = $.trim(this_row.find('td:eq(0)').html());//td:eq(0) means first td of this row
                   

                    $.ajax({
                        type: 'POST',
                        url: 'php/processJSONarray1.php',
                        data: { DepID: depid },
                        success: function(response) {
                            
                             $('#result').html(response);
                        }
                    });



                    });}

                    callD();
                    function callD() {
                    $("#myTable2 tr:gt(0)").each(function () {
                    
                      var this_row = $(this);
                      var userid = $.trim(this_row.find('td:eq(0)').html());//td:eq(0) means first td of this row
                     
                      
                      //alert( productId + " " +  product + " " + Quantity);

                      $.ajax({
                          type: 'POST',
                          url: 'php/processJSONarray2.php',
                          data: { UserID: userid },
                          success: function(response) {
                              
                               $('#result').html(response);
                          }
                      });



                     });
                     }

                     setTimeout(function () { location.reload(1); }, 2000);

                  } else {
                      
                  }

                  
                  
                    


                  });//end of button




</script>



