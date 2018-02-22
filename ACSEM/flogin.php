<?php
if((isset($_COOKIE['user1']) && $_COOKIE['user1'] != '')){
	$user1 = $_COOKIE['user1'];
}else{
	$user1 = "";
}
if((isset($_COOKIE['psd1']) && $_COOKIE['psd1'] != '')){
	$ps = $_COOKIE['psd1'];
}else{
	$ps = "";
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ACSEM</title>
  <link rel="shortcut icon" href="images/ar.png" style="width:50%;height:10%;" type="image/x-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<nav class="navbar navbar-default navbar-fixed-top" >
  <div class="container">
    <div class="navbar-header">
      
        <!-- Logo -->
	    <a href="facilitator.php" class="logo">
	      <!-- mini logo for sidebar mini 50x50 pixels -->
	      <span class="logo-mini"></span>
	      <!-- logo for regular state and mobile devices -->
	      <span class="logo-lg"><img src="images/Fiacsem.png" style="padding:0;margin: 10px 10px 0 40px;width:18%;height:80%;"></span>
	    </a>
      
      
    </div>
   
  </div>
</nav>
<div class="row">
	<div class="col-md-4">
			</br>
			</br>
			</br>
			</br>
			</br>
			</br>
			</br>
			</br>
			</br>
			<strong>
			<div class="login-box" >
  
			  <!-- /.login-logo -->
			  <div class="login-box-body" style=" height:350px;opacity:0.9; ">
			    <div class="login-logo">

			    <h3><b>Facilitator Login<b></h3>
			    
			    </div>

			    <form action="Logins/LoginProcess.php" method="POST">
			      <div class="form-group has-feedback">
			        <input type="text" name="txtuname" class="form-control" placeholder="ACSEM Username" value="<?php echo $user1;?>">
			        <span class="glyphicon glyphicon-user form-control-feedback"></span>
			      </div>
			      <div class="form-group has-feedback">
			        <input type="password" name="txtpword" class="form-control" placeholder="Password" value="<?php echo $ps;?>">
			        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
			      </div>
			      <div class="row">
			        <div class="col-xs-8">
			          <div class="checkbox icheck">
			            <label>
			              <input type="checkbox" name="remember" class="rmbr" value="true"> Remember Me
			            </label>
			          </div>
			        </div>
			        <!-- /.col -->
			        
			      </div><!-- /.row -->
			      <div class="row">
			      	 <div class="col-xs-4">
			          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
			         </div>
			         <!-- /.col -->
			      </div>

			      
			    </form>
			    <div class="row">
			    </br>
			    </br>
			    </br>
			    <div class="col-md-12">
			    <strong>Capstone ACSEM-2017</strong>
			    </div>
			    </div>
			   

			  </div>
			  <!-- /.login-box-body -->
			</div>
			<!-- /.login-box -->
			</strong>
			
	</div>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	<div class="col-md-8 col-md-push-1 hidden-xs">
		       <img src="images/Fiacsem.png">   
	</div>
</div>



<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
