<?php
	
				
  session_start();

  if(isset($_COOKIE['userid1']) && $_COOKIE['userid1'] != ''){
 
  $user1 = $_COOKIE['userid1'];
  $user1;
  //get user data from mysql

  }else if(isset($_SESSION['userid1']) && $_SESSION['userid1'] !=''){
 
  $user1 = $_SESSION['userid1'];
  //get user data from mysql
  }else if(!isset($_COOKIE['userid1']) && $_COOKIE['userid2'] != ''){

      header("Location: ../login.php");

  }else if(!isset($_SESSION['userid2']) && $_SESSION['userid2'] !=''){
 
      header("Location: ../login.php");
  
  }
	

?>