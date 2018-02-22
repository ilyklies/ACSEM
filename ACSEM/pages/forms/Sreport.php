<?php
include("../../conn/connection.php");
    
    date_default_timezone_set('Asia/Manila');
    // Prints something like: Monday
    $today = date("m/d/Y"); 

    $id = $_GET['id'];
    $id2 = $_GET['id2'];
    $faciname = "";
    $status = "";


    $query = "SELECT * FROM tbl_event WHERE EventID = '$id' ";
    $result = mysqli_query($link, $query);
    if(!$result){
        header("Location: error/404.html");
    }
    while($row = mysqli_fetch_assoc($result)){
          
          $eventname = $row['EventName'];    
    }
    
    $query = "SELECT * FROM tbl_sports WHERE SportsID = '$id2' ";
    $result = mysqli_query($link, $query);
    while($row = mysqli_fetch_assoc($result)){
          
          $sportsname = $row['SportsName'];    
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

    $query0 = "SELECT * FROM tbl_schedule Where EventID = '$id' And SportsID = '$id2'";
    $result0 = mysqli_query($link, $query0);

    while($row = mysqli_fetch_assoc($result0)){
    	$matchno = $row['MatchNo'];
    	$venue = $row['Venue'];
    	$count = $matchno + 1  ;
	  }
	$query2 = "SELECT * FROM tbl_sports Where SportsID = '$id2'";
    $result2 = mysqli_query($link, $query2);

    while($row = mysqli_fetch_assoc($result2)){
    	$sportsname = $row['SportsName'];
	  }

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
      <div class="col-md-10 col-md-push-1 table-responsive">
      </br>
      </br>
      <?php
      echo "<b>Venue:</b> " . $venue . "       <b>Date:</b> " . $startd . " to " . $endd;
      ?>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

              <div class="row">
                <div class="col-md-12">
                </br>
                <?php
                foreach($daterange as $date){
                    $now =  $date->format("m/d/Y");
                    $timestamp = strtotime($now);
                    $day = date('l', $timestamp);
                    ?>
                    <div class="col-md-3 col-sm-3 col-xs-3">
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
                          echo "<td>" . "<b>Match No:</b> " . $row['MatchNo'] . "</br>" . "TimeStart: " . $row['StartTime'] ."</br>". "TimeEnd: " . $row['EndTime'] ."</br>". "Teams: " . $row['TeamA'] . "<b>  vs  </b>" . $row['TeamB'] . "</br><b>Venue</b>: " . $row['Venue'] . "</td>";  
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
