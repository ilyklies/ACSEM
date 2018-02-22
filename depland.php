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

 
  		$query1 = "SELECT * FROM tbl_departments Where DepID = '$id2'";
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
      
      <a class="navbar-brand" href="Indexalt.php" style="padding:4px 0 0 0;"> <img src="images/Fiacsem.png" alt="logo" style="height:45px;width:145px;"></a>
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
	<h3>&nbsp;&nbsp;&nbsp;<?php echo $depcode1 ;?> <small>Department</small></h3>
	</div>
	
	</div>
	<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12 ">


	<div class="col-md-6 col-sm-6 col-xs-6 ">

		  
		  
		  </br>
		  <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-trophy"></i>

              <h3 class="box-title">Overall LeaderBoard</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">
              		<table id="tableLeader" class="table"  style="max-height:300px; min-height:20 0px" style="overflow-x: hidden;overflow-y:scroll ;"  >
			                <tr> 
			                  <th bgcolor="#b0bad4">Team</th>
			                  <th bgcolor="#b0bad4">Points</th>
			                  
			                </tr>
			               <?php
			                    $query3 = "SELECT * FROM tbl_edepartments Where EventID = '$id'";
			                    $result3 = mysqli_query($link, $query3);
			                              while($row = mysqli_fetch_assoc($result3)){
			                              $depid = $row['DepID'];
			                                    $query4 = "SELECT * FROM tbl_departments Where DepID = '$depid'";
			                                    $result4 = mysqli_query($link, $query4);
			                                    while($row = mysqli_fetch_assoc($result4)){
			                                           echo "<tr>";
			                                           $depcode = $row['Depcode'];
			                                           
			                                           //echo "<td style="."color:#031b59;".">" ."<b>".$row['Depcode']."</b>". "</td>";
			                                    }
			                                    $query4 = "SELECT * FROM tbl_sportpoints Where Depcode = '$depcode' And EventID = '$id' ";
			                                    $result4 = mysqli_query($link, $query4);
			                                    while($row = mysqli_fetch_assoc($result4)){
			                                          $points = $points + $row['Points'];
			                                          $holder = $points;
			                                    }
			                                     $points = 0;
			                                     $finalpoints[$depcode] = $holder;
			                                     if ($holder == 0){
			                                         $points1 = 0;
			                                     }
			                                     //echo "<td style="."color:#031b59;".">" ."<b>". $holder ."</b>". "</td>";
			                                     $holder = 0;
			                                     //echo "<td style="."color:#031b59;".">" ."<b>". $points1 ."</b>". "</td>";              
			                                     //$points1 = $points1 + 1;
			                              }
                                    arsort($finalpoints);


                                    foreach($finalpoints as $x => $x_value) {
                                        echo "<tr>";
                                        //echo "<td style="."color:#031b59;".">" ."<b>".$x."</b>". "</td>";
                                        ?>
                                        <td style="color:#031b59;">
                                        <form method="POST" action="Select/submit4.php">
                                        <input type="text" name="depcode" value="<?php echo $x; ?>" hidden>
                                        <button class="btn" ><?php echo $x; ?></button>
                                        </form>
                                        </td>
                                        <?php
                                        echo "<td style="."color:#031b59;".">" ."<b>". $x_value ."</b>". "</td>";
                                        if( $x_value == 0){
                                            $points1 = 0;
                                        }
                                        //echo "<td style="."color:#031b59;".">" ."<b>". $points1 ."</b>". "</td>";
                                        $points1 = $points1 + 1;
                                         
                                        
                                    }		                
			            ?>         
			      </table>
            <br>

            <form Method="POST" action="Breakdown2.php">
            <button class="btn">View all</button>
            </form>
            
            </div>
            
            
          </div> <!-- /. box-info -->
          </br>
          

	</div><!--Col-md-6-->
 


  

	<!--#########################################################################################-->
	<div class="col-md-6 col-sm-6 col-xs-6 ">

		  
		   
		   </br>
		   <div class="box box-info" >
            <div class="box-header">
              <i class="fa  fa-soccer-ball-o"></i>

              <h3 class="box-title">Participated Sports</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body" style="width:100%;max-height:450px;min-height:450px;overflow-x: hidden;overflow-y:scroll hidden;">
            <div class="row">
            </div class="col-md-12 col-sm-12 col-xs-12 ">


              <?php
				$query = "SELECT * from tbl_esports Where EventID = '$id'";
			    $result = mysqli_query($link, $query);
			      while($row = mysqli_fetch_assoc($result))
			      {
			      		$sportsid = $row['SportsID'];
			      		
			      		$query1 = "SELECT * from tbl_sports Where SportsID = '$sportsid'";
					    $result1 = mysqli_query($link, $query1);
					    	while($row = mysqli_fetch_assoc($result1))
					      	{
					      		$sportn = $row['SportsName'];
					      		$cat = $row['SportsCategory'];	
					      	?>

							 
							 <div class="col-md-4" style="margin-bottom:5px;">
				                <form method="POST" action="select/submit3.php">
				                <input type="text" name="sportsid" value="<?php echo $sportsid?>"hidden>
				                <button class="btn btn-info" type="submit" style="height:200px;width:180px;">
				                 <h3 class="widget-user-username"><b><?php echo $sportn; ?></b></h3>
				                 <small><h4 class="widget-user-username"><b><?php echo $cat; ?></b></h4></small>
				                </button>
				                </form>
				              </div>	
					      	<?php	
					      	}
			      }
				?>
			</div><!-- /. col -->
			</div><!-- /. row -->
            </div><!-- /. box-body -->
          </div> <!-- /. box-info -->
	</div><!--Col-md-6-->

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


                    $(document).ready(function(){
                    // code to read selected table row cell data (values).
                    $("#tableLeader").on('click','.btn',function(){
                         // get the current row
                        //var currentRow=$(this).closest("tr");
                         
                        $('#myModal').modal({
                            show: 'true'
                        });

                    });
                  });

</script>




</body>
</html>
