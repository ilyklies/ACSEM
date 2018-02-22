<?php
  include("../../conn/connection.php");

  include("../../conn/check2.php");
  $status = "Verified";


  $points1 = 1;
  $points = 0;
  $holder = 0;
  $finalpoints = array();
   
  date_default_timezone_set('Asia/Manila');
  // Prints something like: Monday
  $today = date("m/d/Y"); 

   $eventid = $_GET['id'];

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
  $AdminN = $fname . " " . $lname;
  $query = "SELECT * FROM tbl_event WHERE EventID = '$eventid' ";
  $result = mysqli_query($link, $query);
    if(!$result){
        header("Location: error/404.html");
    }
    while($row = mysqli_fetch_assoc($result)){
          
          $eventname = $row['EventName'];    
    }
  $query = "SELECT * FROM tbl_sportpoints WHERE EventID = '$eventid' ORDER BY Points DESC";
  $result = mysqli_query($link, $query);

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
      <div class="col-md-10 col-md-push-1">
      </br>

      <h3><b style="color:#031b59;">Overall Leader Board Points</b></h3>
      <table id="tableLeader" class="table"  >
                <tr> 
                  <th bgcolor="#b0bad4">Team</th>
                  <th bgcolor="#b0bad4">Points</th>
                  <th bgcolor="#b0bad4">Position</th>
                </tr>
                <?php
                              $query3 = "SELECT * FROM tbl_edepartments Where EventID = '$eventid'";
                              $result3 = mysqli_query($link, $query3);
                              while($row = mysqli_fetch_assoc($result3)){
                              
                              $depid = $row['DepID'];

                                    $query4 = "SELECT * FROM tbl_departments Where DepID = '$depid'";
                                    $result4 = mysqli_query($link, $query4);
                                    while($row = mysqli_fetch_assoc($result4)){
                                           echo "<tr>";
                                           $depcode = $row['Depcode'];
                                           
                                           echo "<td style="."color:#031b59;".">" ."<b>".$row['Depcode']."</b>". "</td>";

                                           
                                    
                                    }
                                    $query4 = "SELECT * FROM tbl_sportpoints Where Depcode = '$depcode' And EventID = '$eventid' ";
                                    $result4 = mysqli_query($link, $query4);
                                    while($row = mysqli_fetch_assoc($result4)){
                                          $points = $points + $row['Points'];
                                          
                                          $holder = $points;
                                    }
                                     $points = 0;
                                     $finalpoints[$depcode] = $holder;
                                     //$finalpoints = array($depcode=>$holder);
                                     //$arraycount = $arraycount + 1;
                                     echo "<td style="."color:#031b59;".">" ."<b>". $holder ."</b>". "</td>";
                                     
                                     $holder = 0;
                                     echo "<td style="."color:#031b59;".">" ."<b>". $points1 ."</b>". "</td>";
                  
                                     $points1 = $points1 + 1;


                              }
                ?>
                
      </table>

      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-md-10 col-md-push-1">
      <h4><b>Event Games</b></h4>
      <?php
            $query3 = "SELECT * FROM tbl_esports Where EventID = '$eventid'";
            $result3 = mysqli_query($link, $query3);

            while($row = mysqli_fetch_assoc($result3)){
                $sportsid = $row['SportsID'];

                $query = "SELECT * FROM tbl_sports Where SportsID = '$sportsid'";
                $result = mysqli_query($link, $query);

                while($row = mysqli_fetch_assoc($result)){
                  
                     echo "<b>" .$row['SportsName'] . "</b>" ;
                     echo "</br>";
                     
                      

                }//while 
                  ?>
                  <table class="table" >
                  <tr>
                  <th bgcolor="#e3dede">Department</th>
                  <th bgcolor="#e3dede">Points</th>
                  </tr>
                  <?php

                      $query = "SELECT * FROM tbl_sportpoints WHERE EventID = '$eventid' AND SportsID = '$sportsid' ORDER BY Points DESC";
                      $result = mysqli_query($link, $query);
                      while($row = mysqli_fetch_assoc($result)){

                            echo "<tr>";
                            echo "<td>" . $row['Depcode'] . "</td>";
                            echo "<td>" . $row['Points'] . "</td>";
                        
                      }//while 2nd

                  ?>
                  </table>
                  
                  </br>
                  <?php


            }//while Main
      ?>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-md-8 col-md-push-1">
      
      </div>
      <!-- /.col -->
     
    </div>
    <!-- /.row -->

    

     

  
  <!-- /.content -->
     <footer class="main-footer">
           </br>
           </br>
           	
            <p>-----------------------------------</p>
            <p><?php echo $AdminN; ?></p>
            <b>&nbsp&nbsp&nbspAdministrated by</b>
            </br>
            <b>Status:</b><?php echo $status; ?>
            </br>
            </br>
            </br>
            Powered by: <b>ACSEM-2017</b> 
     </footer>

<!-- ./wrapper -->
</body>
</html>
