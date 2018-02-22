
<?php 
	include("ACSEM/conn/connection.php");

$StartDate = date("m/d/Y",strtotime('monday this week'));

?>


<!DOCTYPE html>
<html lang="en">
<head>

  <title> ACSEM - Asian College Sports and Event Manager </title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" style="text/css" href="style.css" >
  <link rel="shortcut icon" href="ACSEM/images/ar.png" type="image/x-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="ACSEM/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="ACSEM/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="ACSEM/plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="ACSEM/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="ACSEM/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="ACSEM/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="ACSEM/plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="ACSEM/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="ACSEM/dist/css/skins/_all-skins.min.css">

  <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="script.js"></script>


</head>


<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top" style="margin: 0; background-color: rgba(60,141,181,0.9);z-index:9999;border:0;font-size: 12px !important; letter-spacing: 4px; border-radius: 0; font-family: Montserrat, sans-serif;">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      
      <a class="navbar-brand" href="#myPage" style="padding:4px 0 0 0;"> <img src="images/white2.png" alt="logo" style="height:45px;width:145px;"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">

      </ul>
    </div>
  </div>
</nav>


<div id="front" class="container-fluid" style="height:650px;">
  <div class="row">
     <div class="col-sm-2">
    </div>
    <div id="center" class="col-sm-8" style="text-align:center;margin-top:10%;">

    <h1> Please click on an event. Thank you! </h1>

    <?php
    $query = "SELECT * FROM tbl_event Where EventStart = '$StartDate'";
    $result = mysqli_query($link, $query);
    while($row = mysqli_fetch_assoc($result))
    {
      $eventid = $row['EventID'];
      $eventname = $row['EventName'];
      $image = $row['Eventphoto'];
      ?>

      <form action="submit.php" method="post">
      <h2> <?php echo $eventname ?> <h2>
      <input type="text" name="eventid" value=<?php echo $eventid?> hidden>

      <button class="btn btn-primary" type="submit"> <img src="ACSEM/pages/forms/upload/<?php echo $image?>" class="img-responsive" width="280" height="200"></button>
      
      </form>
      <?php
    }

    ?>  
    
    


    <!--<a href="indexalt.php?eventid=<?php //echo $eventid ?>"> <h1>Click Me madafaka</h1> </a> -->

    </div>
    <div class="col-sm-2">
     
    </div>
  </div>
</div>


<footer class="container-fluid text-center">

  <p>Designed by <p style="color: #0E2F44">TEAM PMR</p></p>
</footer>


</body>
</html>
