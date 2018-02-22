<?php 
 include("ACSEM/conn/connection.php");
 session_start();
 
 
    //$id = $_SESSION['id'];
    //$id2 =  $_SESSION['id2'];

    if(empty($_SESSION['id']) && empty($_SESSION['id2'])) {
       header("Location: index.php");
    }else{
       $id = $_SESSION['id'];
       $id2 =  $_SESSION['id2'];
    }

    $evntid = $_SESSION['id'];
 	  $dcode = $_SESSION['Depcode'];

  	$query1 = "SELECT * FROM tbl_departments Where DepID = '$dcode'";
    $result1 = mysqli_query($link, $query1);
    while($row = mysqli_fetch_assoc($result1))
    {
        $deplogo = $row['Deplogo'];
        $depcode1 = $row['Depcode'];
    } 

    $points1 = 1;
    $points = 0;
    $holder = 0;
    $finalpoints = array();
    $spid = 0;
    $win = 0;
    $loss = 0;
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
  .modal {
   position: absolute;
   top: 10px;
   z-index: 10040;
   }
  </style>

</head>


<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<div id="fb-root"></div>


<nav class="navbar navbar-default navbar-fixed-top" style="margin: 0; background-color: rgba(60,141,181,0.9);z-index:9999;border:0;font-size: 12px !important; letter-spacing: 4px; border-radius: 0; font-family: Montserrat, sans-serif;">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      
      <a class="navbar-brand" href="depland.php" style="padding:4px 0 0 0;"> <img src="images/Fiacsem.png" alt="logo" style="height:45px;width:145px;"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        
      </ul>
    </div>
  </div>
</nav>

<div id="landing" class="container-fluid">
	
	
	<div class="row">
	<div class="col-md-4">
	<h3>&nbsp;&nbsp;&nbsp;<?php echo $dcode ;?> <small>Department</small></h3>
	</div>
	
	</div>
	<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12 ">


	<div class="col-md-8 col-md-push-2 col-sm-8 col-sm-push-2 col-xs-8 col-xs-push-2 ">

		  
		  
		  </br>
		  <div class="box box-info" style="max-height:290px; min-height:290px" style="overflow-x: hidden;overflow-y:scroll hidden;">
            <div class="box-header">
              <i class="fa fa-trophy"></i>

              <h3 class="box-title">Overall LeaderBoard Breakdown</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">
            <table class="table">
                <tr> 
        			   <th bgcolor="#b0bad4">Sports</th>
        			   <th bgcolor="#b0bad4">Points</th>             
    			      </tr>
			
      			<?php
            $query3 = "SELECT * FROM tbl_esports Where EventID = '$evntid'";
            $result3 = mysqli_query($link, $query3);
            while($row = mysqli_fetch_assoc($result3)){
                  $spid = $row['SportsID'];
                  echo "<tr>";
                  $query4 = "SELECT * FROM tbl_sports Where SportsID = '$spid'";
                  $result4 = mysqli_query($link, $query4);
                  while($row = mysqli_fetch_assoc($result4)){
                      echo "<td style="."color:#031b59;".">" ."<b>". $row['SportsName'] ."</b>". "</td>";
                  }

                  $query5 = "SELECT * FROM tbl_sportpoints Where SportsID = '$spid' And EventID = '$evntid' And Depcode = '$dcode' ";
                  $result5 = mysqli_query($link, $query5);
                  while($row = mysqli_fetch_assoc($result5)){
                      $spoint = $row['Points'];
                      //echo "<td style="."color:#031b59;".">" ."<b>". $row['Points'] ."</b>". "</td>";
                  }
                  if(empty($spoint)){
                    $spoint = 0;
                  }

                  echo "<td style="."color:#031b59;".">" ."<b>". $spoint ."</b>". "</td>";
                  $holder = $holder + $spoint;


            }
      			?>

            </table>
           

              		
            </div>
            <br>

            <div class="col-md-6">
            <strong><input type="text" class="form-control" value="<?php echo "Total: " .$holder . "  Points"; ?>"></strong>
            </div>

          </div> <!-- /. box-info -->
          </br>
          

	</div><!--Col-md-6-->
 

  
  

	<!--#########################################################################################-->
	
	</div><!--Col-md-12-->
	</div><!--Row-->



</div>


<script>

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));



$(function worker1(){
    // don't cache ajax or content won't be fresh
    $.ajaxSetup ({
        cache: false,
        complete: function() {
          setTimeout(worker1, 10000);
        }
    });
    

    // load() functions
    
    var loadsection1 = "section1.php";
    
        
        $("#events1").load(loadsection1);

// end  
});

$(function worker2(){
    // don't cache ajax or content won't be fresh
    $.ajaxSetup ({
        cache: false,
        complete: function() {
          setTimeout(worker2, 10000);
        }
    });
    

    // load() functions
    
    var loadsection2 = "section2.php";
    
        
        $("#matches1").load(loadsection2);

// end  
});


$(function worker4(){
    // don't cache ajax or content won't be fresh
    $.ajaxSetup ({
        cache: false,
        complete: function() {
          setTimeout(worker4, 10000);
        }
    });
    

    // load() functions
    
    var loadrecent1 = "recentgame.php";
    
        
        $("#recent1").load(loadrecent1);

// end  
});



$(document).ready(function(){

  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    if (this.hash !== "") {
  
      event.preventDefault();


      var hash = this.hash;


      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   

        window.location.hash = hash;
      });
    } 
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})



</script>




</body>
</html>
