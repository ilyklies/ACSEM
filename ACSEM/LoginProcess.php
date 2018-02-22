<?php

include("conn/connection.php");

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$uname = "";
	$pword = "";

	

	$query = "SELECT * FROM tbl_admin where Ausername = '$username' and Apassword = '$password'" ;
    $result = mysqli_query($link, $query);
    
    if($query){
	     while($row = mysqli_fetch_assoc($result))
	     {
	    		$uname = $row['Ausername'];
				$pword = $row ['Apassword'];
				$pas = $row['AdminID'];
				
	     }
	    

	     		if ($username == "" && $password == "") {

					header("Location: login.php");	

				}else if($username != $uname && $password != $pword){
				 	
				 	header("Location: login.php");	
				}else if($username == $uname && $password == $pword){ 
				 	   
					    


						if(isset($_POST['remember'])){

							$cookie_name = "user";
							$cookie_value = $uname;
							$cookie_id = "userid";
							$cookie_idvalue = $pas;
							$cookie_s = "psd";
							$cookie_psdvalue = $pword;
							//expiriry time. 86400 = 1 day (86400*30 = 1 month)
							$expiry = time() + ( 3600);

							 setcookie($cookie_name, $cookie_value, $expiry);
							 setcookie($cookie_id, $cookie_idvalue, $expiry);
							 setcookie($cookie_s, $cookie_psdvalue, $expiry);
							 $cookie_value;
							 session_start();
							 $_SESSION['userid'] = $pas;
	         				 $_SESSION['logon'] = true;
							 header("Location: starter.php");
							 

					    }else{
					   		 session_start();
					   		 $_SESSION['userid'] = $pas;
	         				 $_SESSION['logon'] = true;
							 header("Location: starter.php");
					    }	


	     	
	           }

	      
    }else{    	
    	echo "fail login";
    	header("Location:login.php");
    }

    
   include("conn/close_connection.php");

?>