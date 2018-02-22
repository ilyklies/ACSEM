<?php
include("../../conn/connection.php");
    
    date_default_timezone_set('Asia/Manila');
    // Prints something like: Monday
    $today = date("m/d/Y"); 

    $eventid = $_GET['id'];
    $sportsid = $_GET['id2'];
    $faciname = "";
    $status = "";


    $query = "SELECT * FROM tbl_event WHERE EventID = '$eventid' ";
    $result = mysqli_query($link, $query);
    if(!$result){
        header("Location: error/404.html");
    }
    while($row = mysqli_fetch_assoc($result)){
          
          $eventname = $row['EventName'];    
    }
    $query = "SELECT * FROM tbl_sports WHERE SportsID = '$sportsid' ";
    $result = mysqli_query($link, $query);
    while($row = mysqli_fetch_assoc($result)){
          
          $sportsname = $row['SportsName'];    
    }
    $query = "SELECT * FROM tbl_sportreport WHERE EventID = '$eventid' AND SportsID = '$sportsid' ";
    $result = mysqli_query($link, $query);
    while($row = mysqli_fetch_assoc($result)){
          
          $faciname = $row['FCname'];
          $status = $row['Fstatus'];    
    }
    $query = "SELECT * FROM tbl_sportpoints WHERE EventID = '$eventid' AND SportsID = '$sportsid' ORDER BY Points DESC";
    $result = mysqli_query($link, $query);

    $query = "SELECT * FROM tbl_schedule WHERE EventID = '$eventid' AND SportsID = '$sportsid' AND Status = 'Done' ORDER BY MatchNo ASC";
    $result1 = mysqli_query($link, $query);
    

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
      <h4><b>Sports Name:</b> <?php echo $sportsname;?></h4>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-md-8 col-md-push-2 table-responsive">
      </br>
      </br>
      <b>Overall Winning Points</b>
      <table class="table" >
          <tr>
          <th>Department</th>
          <th>Points</th>
          </tr>
          <?php
          while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                
                echo "<td>" . $row['Depcode'] . "</td>";
                echo "<td>" . $row['Points'] . "</td>";
            
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
      <b>All Macthes</b>
      <table class="table" >
          <tr>
          <th>Match ID</th>
          <th>Match No</th>
          <th>Winner</th>
          <th>Loser</th>
          <th width="10%">Date</th>
          
          </tr>
          <?php
          while($row = mysqli_fetch_assoc($result1)){
                echo "<tr>";
                
                echo "<td>" . $row['MatchID'] . "</td>";
                echo "<td>" . $row['MatchNo'] . "</td>";
                echo "<td>" . $row['Winner'] . "</td>";
                echo "<td>" . $row['Losser'] . "</td>";
                echo "<td>" . $row['Dates'] . "</td>";
            
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
            <p>-----------------------------------</p>
            <p><?php echo $faciname; ?></p>
            <b>&nbsp&nbsp&nbspFacilitated by</b>
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
