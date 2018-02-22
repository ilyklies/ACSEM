<?php 
 include("ACSEM/conn/connection.php");
 session_start();
 $id = $_SESSION['id'];

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
<div id="fb-root"></div>


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
        <li><a href="#events">LEADERBOARD</a></li>
        <li><a href="#matches">GAME SCHEDULES</a></li>
        <li><a href="#scoreboard">DEPARTMENTS</a>
        <li><a href="#recent">RECENT GAMES</a></li>
      </ul>
    </div>
  </div>
</nav>

<div id="landing" class="container-fluid" style="height:650px;">
  <div class="row" style="margin:auto;">

    <div class="col-xs-9 col-xs-push-1 hidden-sm hidden-md hidden-lg" style="margin-top:100px">
        <div class="nav-container2" style="width:940px; margin:auto; height:30px;">
            <ul class="social-media-list" style="width: 393px;">
                <li style="display:block; float: left; width:33.3%; text-align:center; margin: 0 auto;">
                    <div class="fb-share-button" data-href="http://acsem.x10.bz/" data-layout="button" data-size="large" data-mobile-iframe="true" style="margin:0 0 0 60px;"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Facsem.x10.bz%2F&amp;src=sdkpreparse">Share</a></div>
                </li>
                <li style="display:block; float: left; width:33.3%; text-align:center; margin: 0 auto;">
                     <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false" data-size="large">Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script> 
                </li>
            </ul>
        </div>

        <br><img src="images/acsemlogo.png" height="250" width="250" style="margin-left:100px">
    </div>

    <div class="hidden-xs col-sm-7 col-sm-push-3 hidden-md hidden-lg" style="margin-top:100px">

        <div class="nav-container2" style="width:940px; margin:auto; height:30px;">
            <ul class="social-media-list" style="width: 393px;">
                <li style="display:block; float: left; width:33.3%; text-align:center; margin: 0 auto;">
                    <div class="fb-share-button" data-href="http://acsem.x10.bz/" data-layout="button" data-size="large" data-mobile-iframe="true" style="margin:0 0 0 60px;"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Facsem.x10.bz%2F&amp;src=sdkpreparse">Share</a></div>
                </li>
                <li style="display:block; float: left; width:33.3%; text-align:center; margin: 0 auto;">
                     <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false" data-size="large">Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script> 
                </li>
            </ul>
        </div>

        <br><img src="images/acsemlogo.png" height="250" width="250" style="margin-left:100px">
  
    </div>

    <div class="hidden-xs hidden-sm col-md-9 col-md-push-1 hidden-lg" style="margin-top:200px;">
        <div class="nav-container2" style="width:940px; margin:auto; height:30px;">
            <ul class="social-media-list" style="width: 393px;">
                <li style="display:block; float: left; width:33.3%; text-align:center; margin: 0 auto;">
                    <div class="fb-share-button" data-href="http://acsem.x10.bz/" data-layout="button" data-size="large" data-mobile-iframe="true" style="margin:0 0 0 60px;"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Facsem.x10.bz%2F&amp;src=sdkpreparse">Share</a></div>
                </li>
                <li style="display:block; float: left; width:33.3%; text-align:center; margin: 0 auto;">
                     <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false" data-size="large">Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script> 
                </li>
            </ul>
        </div>
        
        <br><img src="images/landing.png" height="150" width="750">
    </div>

    <div class="hidden-xs hidden-sm hidden-md col-lg-8 col-lg-push-2" style="margin-top:200px;">
        <div class="nav-container2" style="width:940px; margin:auto; height:30px;">
            <ul class="social-media-list" style="width: 393px;">
                <li style="display:block; float: left; width:33.3%; text-align:center; margin: 0 auto;">
                    <div class="fb-share-button" data-href="http://acsem.x10.bz/" data-layout="button" data-size="large" data-mobile-iframe="true" style="margin:0 0 0 60px;"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Facsem.x10.bz%2F&amp;src=sdkpreparse">Share</a></div>
                </li>
                <li style="display:block; float: left; width:33.3%; text-align:center; margin: 0 auto;">
                     <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false" data-size="large">Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script> 
                </li>

            </ul>
        </div>
        
        <br><img src="images/landing.png" height="150" width="750">
        
    </div>
    <div class="col-sm-2">
    </div>
  </div>
</div>

<div id="events" class="container-fluid" style="height:650px;">
  <div class="row">
    <div class="col-sm-2">
    </div>
    <div id="events1" class="col-sm-8">
    
    </div>
    <div class="col-sm-2">
     
    </div>
  </div>
</div>


<div id="matches" class="container-fluid bg-grey" style="height:650px;" >
 <div class="row">
    <div id="matches1" class="col-sm-8 col-sm-push-2">


    </div>
    <div class="col-sm-2">
     
    </div>
  </div>
</div>

<!-- Container (Portfolio Section) -->
<div id="scoreboard" class="container-fluid text-center" style="height:650px;">
  <h2 style="text-align:center;"><img src="images/acsemlogo.png" style="padding:0;margin: 0 10px 0 40px;width:43px;height:45px;">DEPARTMENTS</h2><br>
  <div id="scoreboard1" style="max-height:400px;min-height:400px;overflow-y:scroll;">
<div class="row" >
  <div class="col-md-10 col-md-push-1">
  <?php
  $query = "SELECT * from tbl_edepartments Where EventID = '$id'";
  $result = mysqli_query($link, $query);
    while($row = mysqli_fetch_assoc($result))
    {
      $depid = $row['DepID'];

      $query1 = "SELECT * FROM tbl_departments Where DepID = '$depid'";
      $result1 = mysqli_query($link, $query1);
        while($row = mysqli_fetch_assoc($result1))
        {
          $depcode = $row['Depcode'];
          $deplogo = $row['Deplogo'];
          ?>
            
            <div class="col-md-3" style="margin-bottom:20px;">
              <a href="scorebored.php"><button class="btn btn-primary"> <img src="ACSEM/pages/forms/upload/<?php echo $deplogo?>" class="img-responsive" width="180" height="100"></button></a>
            </div>
          
          <?php
        }
    }

  ?>
  </div>
  </div>
  </div>
</div>

<div id="recent" class="container-fluid bg-grey" style="height:650px;" >
 <div class="row">
    <div id="recent1" class="col-sm-8 col-sm-push-2">


    </div>
    <div class="col-sm-2">
     
    </div>
  </div>
</div>




<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>Designed by <p style="color: #0E2F44">TEAM PMR</p></p>
</footer>

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
