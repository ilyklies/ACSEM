<?php
  include("../../conn/connection.php");

  date_default_timezone_set('Asia/Manila');
    // Prints something like: Monday
  $today = date("m/d/Y");
  $eventid = $_GET['id'];

 
      $query = "SELECT * FROM tbl_event WHERE EventID = '$eventid' ";
      $result = mysqli_query($link, $query);
      while($row = mysqli_fetch_assoc($result)){
          
          $eventname = $row['EventName'];
          $eventdes = $row['EventDescription'];
          $events = $row['EventStart'];
          $evente =  $row['EventEnd'];
          $eventp = $row['Eventphoto']; 
      }

       $query1 = "SELECT * FROM tbl_esports WHERE EventID = '$eventid'";
       $result1 = mysqli_query($link, $query1);

       $query3 = "SELECT * FROM tbl_edepartments WHERE EventID = '$eventid'";
       $result3 = mysqli_query($link, $query3);

       $query5 = "SELECT * FROM tbl_efacilitators  WHERE EventID = '$eventid'";
       $result5 = mysqli_query($link, $query5);

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
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body onload="window.print();">

  <!-- Main content -->
  
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
              
              <h3><b><?php echo $eventname?></b></h3>
     
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-md-12 col-md-push-1">
      </br>
      			  <h4><b>Description:</b> <?php echo $eventdes; ?></h4>
                  <br>
                  <h5><b>Start Date:</b> <?php echo " " . $events; ?></h5>
                  <h5><b>End Date:</b><?php echo " " . $evente; ?></h5>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-md-8 col-md-push-2 table-responsive">
      </br>
      </br>
      <h4>Event Sports:</h4>
                  <table id="table1" class="table table-fixed">
                    
                    <tr>
                      <th >Sports ID</th>
                      <th >Elimination</th>
                      <th >Sports Name</th>
                      <th >Sports Category</th>
                    </tr>
                  <?php

                  while($row = mysqli_fetch_assoc($result1)){
                    $sid = $row['SportsID'];
                    echo "<tr>";
                    echo "<td>" . $row['SportsID'] ."</td>";
                    echo "<td>" . $row['Elimination'] ."</td>";

                          $query2 = "SELECT * FROM tbl_sports where SportsID = '$sid'";
                          $result2 = mysqli_query($link, $query2);
                          while($row = mysqli_fetch_assoc($result2)){
                               echo "<td>" . $row['SportsName'] ."</td>"; 
                               echo "<td>" . $row['SportsCategory'] ."</td>";
                          ?>
                            
                          <?php
                          };               
                  }
                  ?>
                  </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-md-8 col-md-push-2">
      </br>
      </br>
      <h4>Participating Departments:</h4>
                  <table class="table table-fixed">
                    
                    <tr>
                      <th width="30%">Department ID</th>
                      <th width="20%">DepCode</th>
                      <th >DepDescription</th>
                    </tr>
                    <?php

                    while($row = mysqli_fetch_assoc($result3)){
                      $did = $row['DepID'];
                      echo "<tr>";
                      echo "<td>" . $row['DepID'] ."</td>";
                     
                            $query4 = "SELECT * FROM tbl_departments where DepID = '$did'";
                            $result4 = mysqli_query($link, $query4);
                            while($row = mysqli_fetch_assoc($result4)){
                                 echo "<td>" . $row['Depcode'] ."</td>"; 
                                 echo "<td>" . $row['Depdes'] ."</td>"; 
                            };                        
                    }
                    ?>

                  </table>
      </div>
      <!-- /.col -->
     
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-md-8 col-md-push-2">
      <h4>Event Facilitators:</h4>
                  <table id="table3" class="table table-fixed">
                    
                    <tr>
                      <th >Facilitator ID</th>
                      <th >Assigned Sports</th>
                      <th >Name</th>
                    </tr>
                    <?php

                    while($row = mysqli_fetch_assoc($result5)){
                      $fid = $row['FacilitatorID'];
                      echo "<tr>";
                      echo "<td>" . $row['FacilitatorID'] ."</td>";
                      echo "<td>" . $row['SportsID'] ."</td>";
                     
                            $query4 = "SELECT * FROM tbl_facilitator where FacilitatorID = '$fid'";
                            $result4 = mysqli_query($link, $query4);
                            while($row = mysqli_fetch_assoc($result4)){
                                 echo "<td>" . $row['Ffname'] . " " . $row['Flname'] ."</td>"; 
                            ?>
                           
                          <?php     
                            };
                                                    
                    }
                    ?>

                  </table>
      </div>
      <!-- /.col -->
     
    </div>
    <!-- /.row -->

    

     

  
  <!-- /.content -->
     <footer class="main-footer">
           </br>
           </br>
            
            </br>
            Powered by: ACSEM-2017 
     </footer>

<!-- ./wrapper -->
</body>
</html>
