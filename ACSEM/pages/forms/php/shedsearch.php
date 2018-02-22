<?php
							  
	include("../../../conn/connection.php");

	$ven = $_POST['Ven'];
	echo "</br>";
	$sta = $_POST['Sta'];
	$end = $_POST['End'];

	$begin = new DateTime($sta);
    $end = new DateTime($end);
    $end = $end->modify( '+1 day' );
    $diff = $end->diff($begin)->format("%a");
    $daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ACSEM</title>
  <link rel="shortcut icon" href="../../../images/ar.png" style="width:50%;height:10%;" type="image/x-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../../plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../../plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../../plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../../../plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../../dist/css/skins/_all-skins.min.css">

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
<body>

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
                          $query6 = "SELECT * FROM tbl_schedule Where Dates = '$now' And Venue = '$ven'";
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


</body>
</html>
