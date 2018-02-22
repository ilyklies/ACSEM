<?php

include("../../../conn/connection.php");

	$username = $_POST['username'];
	$password = $_POST['password'];
	$uname = "";
	$pword = "";
	
	

	$query = "SELECT * FROM tbl_userlogin where Useruname = '$username' and Userpword = '$password'" ;
    $result = mysqli_query($link, $query);
    
    if($query){
	     while($row = mysqli_fetch_assoc($result))
	     {
	    		$uname = $row['Useruname'];
				$pword = $row ['Userpword'];
				$pas = $row['UserinID'];
				$position = $row['Position'];

	     }

	     if($position == "Administrator"){

	     		if ($username == "" && $password == "") {

					header("Location: ../../../login.php");	

				}else if($username != $uname && $password != $pword){
				 	
				 	header("Location: ../../../login.php");	
				}else if($username == $uname && $password == $pword){ 
				 	   
					  if(isset( $_POST['chkrm' ])){
							$remember = $_POST['chkrm'];
					  }
					  if(!isset( $remember )){
			
							$_SESSION['name'] = $pas;
							echo $_SESSION['name'] . " this is session";
							//header("Location: Profile.php");

		
							} 


					   else if(isset( $remember )) {
			
							setcookie("inID",$pas,time()+(60*60*60*60));
							echo $_COOKIE['inID'] . " this is cookie";

							//header("Location: Profile.php");

				
					   }


	     	
	           }

	       }

    }else{
    	
    	echo "fail login";
    	header("Location: ../../../login.php");

    }

    
   include("conn/close_connection.php");

?>