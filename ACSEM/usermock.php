<!DOCTYPE html>
<html lang="en">
<head>

  <title> Mock User </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>


  body {
      font: 400 15px Lato, sans-serif;
      line-height: 1.8;
      color: #818181;
  }
  h2 {
      font-size: 24px;
      text-transform: uppercase;
      color: #303030;
      font-weight: 600;
      margin-bottom: 30px;
  }
  h4 {
      font-size: 19px;
      line-height: 1.375em;
      color: #303030;
      font-weight: 400;
      margin-bottom: 30px;
  }  
  .jumbotron {
      background-color: #f4511e;
      color: #fff;
      padding: 100px 25px;
      font-family: Montserrat, sans-serif;
  }
  .container-fluid {
      padding: 60px 50px;
  }
  .bg-grey {
      background-color: #f6f6f6;
  }
  .logo-small {
      color: #f4511e;
      font-size: 50px;
  }
  .logo {
      color: #f4511e;
      font-size: 200px;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail img {
      width: 100%;
      height: 100%;
      margin-bottom: 10px;
  }

  .carousel-inner>.item>img, .carousel-inner>.item>a>img {
    display:  block;
    height: auto;
    max-width: 100%;
    line-height: 1;
    margin: auto;
    width: 100%;
  }

  .carousel-control.right, .carousel-control.left {
      background-image: none;
      color: #FFF;
  }
  .carousel-indicators li {
      border-color: #FFF;
  }
  .carousel-indicators li.active {
      background-color: #FFF;
  }
  .item h4 {
      font-size: 19px;
      line-height: 1.375em;
      font-weight: 400;
      font-style: italic;
      margin: 70px 0;
  }
  .item span {
      font-style: normal;
  }
  .panel {
      border: 1px solid #f4511e; 
      border-radius:0 !important;
      transition: box-shadow 0.5s;
  }
  .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
      border: 1px solid #f4511e;
      background-color: #fff !important;
      color: #f4511e;
  }
  .panel-heading {
      color: #fff !important;
      background-color: #f4511e !important;
      padding: 25px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
  }
  .panel-footer {
      background-color: white !important;
  }
  .panel-footer h3 {
      font-size: 32px;
  }
  .panel-footer h4 {
      color: #aaa;
      font-size: 14px;
  }
  .panel-footer .btn {
      margin: 15px 0;
      background-color: #f4511e;
      color: #fff;
  }
  .navbar {
      margin-bottom: 0;
      background-color: rgba(45, 45, 48, 0.9) ;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
      font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #2D2D30 !important;
      background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }
  footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color: #f4511e;
  }
  .slideanim {visibility:hidden;}
  .slide {
      animation-name: slide;
      -webkit-animation-name: slide;
      animation-duration: 1s;
      -webkit-animation-duration: 1s;
      visibility: visible;
  }
  @keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
        width: 100%;
        margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
        font-size: 150px;
    }
  }

  </style>
</head>


<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" >

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <img src="images/aclogo1.png" style="float:left;padding:0;margin: 10px 10px 0 40px;width:30px;height:35px;">
      <a class="navbar-brand" href="#myPage"> ACSEM</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#events">EVENTS</a></li>
        <li><a href="#matches">MATCHES</a></li>
        <li><a href="#scoreboard">SCOREBOARD</a></li>
        <li><a href="pages/forms/php/Logoutprocess.php">LOGOUT</a></li>
      </ul>
    </div>
  </div>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
            <div class="item active">
              <img src="ac/1.jpg" alt="1">
              <div class="carousel-caption">
              <h3>Asian College Gym</h3>
              <p>Commencement Excercise 2017</p>
              </div>
            </div>

            <div class="item">
              <img src="ac/2.jpg" alt="2">
              <div class="carousel-caption">
                <h3>Glits And Glamour</h3>
                <p>Employees' Night</p>
              </div>
            </div>

            <div class="item">
              <img src="ac/3.jpg" alt="3">
            <div class="carousel-caption">
              <h3>DumzVille Sandurot</h3>
              <p>Asian College Contingent</p>
            </div>
            </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>


<!-- Container (About Section) -->
<div id="events" class="container-fluid" style="height:650px;">
  <div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">
      <h2 style="text-align:center;"><img src="images/aclogo.png" style="padding:0;margin: 0 10px 0 40px;width:30px;height:35px;">Asian College Events</h2><br>

      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#ongoing">On-Going</a></li>
        <li><a data-toggle="tab" href="#upcoming">Up-Coming</a></li>
        <li><a data-toggle="tab" href="#recent">Recent</a></li>
      </ul>

      <div class="tab-content">
        <div id="ongoing" class="tab-pane fade in active">
          <h3>On-Going Events</h3>
          <div class="table-responsive">          
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Event</th>
                    <th>Time Remaining</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>College Week</td>
                    <td>On-Going</td>
                  </tr>
                </tbody>

            </table>
          </div>
        </div>
        <div id="upcoming" class="tab-pane fade">
          <h3>Up-Coming Events</h3>
                    <div class="table-responsive">          
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Event</th>
                    <th>Time Remaining</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Padula 2017</td>
                    <td>150d 2h</td>
                  </tr>
                  <tr>
                    <td>CCSE</td>
                    <td>162d 10h</td>
                  </tr>
                </tbody>

            </table>
          </div>
        </div>

        <div id="recent" class="tab-pane fade">
          <h3>Recent Events</h3>
          <div class="table-responsive">          
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Event</th>
                    <th>Time Remaining</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Padula 2016</td>
                    <td>Done</td>
                  </tr>
                </tbody>

            </table>
          </div>

        </div>
      </div>

    </div>
    <div class="col-sm-2">
     
    </div>
  </div>
</div>

<!-- Container (Services Section) -->
<div id="matches" class="container-fluid bg-grey" style="height:650px;" >
 <div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">
      <h2 style="text-align:center;"><img src="images/aclogo.png" style="padding:0;margin: 0 10px 0 40px;width:30px;height:35px;">Event Matches</h2><br>

      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#ongoingm">On-Going</a></li>
        <li><a data-toggle="tab" href="#upcomingm">Up-Coming</a></li>
        <li><a data-toggle="tab" href="#recentm">Recent</a></li>
      </ul>

      <div class="tab-content">
        <div id="ongoingm" class="tab-pane fade in active">
          <h3>On-Going Matches</h3>
          <div class="table-responsive">          
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Game</th>
                    <th>Time Remaining</th>
                    <th>Venue</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Mens Basketball</td>
                    <td>On-Going</td>
                    <td>Gym</td>
                  </tr>
                  <tr>
                    <td>Womens Volleyball</td>
                    <td>On-Going</td>
                    <td>Gym - Right Side</td>
                  </tr>
                  <tr>
                    <td>Chess</td>
                    <td>On-Going</td>
                    <td>Lobby</td>
                  </tr>
                  <tr>
                    <td>Womens Badminton</td>
                    <td>On-Going</td>
                    <td>Canteen - Right Side</td>
                  </tr>
                  <tr>
                    <td>Table Tennis</td>
                    <td>On-Going</td>
                    <td>Gym - Stage</td>
                  </tr>
                </tbody>

            </table>
          </div>
        </div>
        <div id="upcomingm" class="tab-pane fade">
          <h3>Up-Coming Matches</h3>
          <div class="table-responsive">          
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Game</th>
                    <th>Time Remaining</th>
                    <th>Venue</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Mens Soccer</td>
                    <td>1h 20m</td>
                    <td>Gym - Left Side</td>
                  </tr>
                  <tr>
                    <td>Mens Volleyball</td>
                    <td>1h 25m</td>
                    <td>Canteen - Right Side</td>
                  </tr>
                  <tr>
                    <td>Womens Basketball</td>
                    <td>1h 25m</td>
                    <td>Gym</td>
                  </tr>
                  <tr>
                    <td>Mens Badminton</td>
                    <td>1h 30m</td>
                    <td>Canteen - Left Side</td>
                  </tr>
                </tbody>

            </table>
          </div>
        </div>

        <div id="recentm" class="tab-pane fade">
          <h3>Recent Matches</h3>
          <div class="table-responsive">          
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Game</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Sepak Takraw</td>
                    <td>Done</td>
                  </tr>
                  <tr>
                    <td>Tennis</td>
                    <td>Done</td>
                  </tr>
                  <tr>
                    <td>Swimming</td>
                    <td>Done</td>
                  </tr>
                  <tr>
                    <td>Mens Soccer</td>
                    <td>Done</td>
                  </tr>
                  <tr>
                    <td>Womens Futsal</td>
                    <td>Done</td>
                  </tr>
                </tbody>

            </table>
          </div>

        </div>
      </div>

    </div>
    <div class="col-sm-2">
     
    </div>
  </div>
</div>

<!-- Container (Portfolio Section) -->
<div id="scoreboard" class="container-fluid text-center" style="height:650px;">
  <h2 style="text-align:center;"><img src="images/aclogo.png" style="padding:0;margin: 0 10px 0 40px;width:30px;height:35px;">SCORE BOARD HIGHLIGHT</h2><br>

  <div class="row">
    <div class="col-sm-5">
    <h1 style="font-size: 75px;color: blue;"> 68 </h1>
    <h3>CCSE</h3>
    </div>
    <div class="col-sm-2">
    <br>
    <h2> VS </h2><br>
    <br>
    <h1 style="color:red;"> Men's Basketball</h1>
    </div>
    <div class="col-sm-5">
    <h1 style="font-size: 75px;color: blue;"> 74 </h1>
    <h3>CBA</h3>
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
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
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
