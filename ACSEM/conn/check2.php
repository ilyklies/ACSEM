<?php
	
				
  session_start();

  if(isset($_COOKIE['userid']) && $_COOKIE['userid'] != ''){
 
  $user = $_COOKIE['userid'];
  $user;
  //get user data from mysql

  }else if(isset($_SESSION['userid']) && $_SESSION['userid'] !=''){
 
  $user = $_SESSION['userid'];
  //get user data from mysql
  }else if(!isset($_COOKIE['userid']) && $_COOKIE['userid'] != ''){

      header("Location: ../../login.php");

  }else if(!isset($_SESSION['userid']) && $_SESSION['userid'] !=''){
 
      header("Location: ../../login.php");
  
  }
	

?>
