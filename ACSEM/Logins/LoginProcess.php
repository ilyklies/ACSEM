<?php

include("../conn/connection.php");

	$username = $_POST['txtuname'];
	$password = $_POST['txtpword'];
	
	$uname = "";
	$pword = "";

	

	$query = "SELECT * FROM tbl_facilitator where Fusername = '$username' and Fpassword = '$password'" ;
    $result = mysqli_query($link, $query);
    
    if($query){
	     while($row = mysqli_fetch_assoc($result))
	     {
	    		$uname = $row['Fusername'];
				$pword = $row ['Fpassword'];
				$pas = $row['FacilitatorID'];
				
	     }
	    

	     		if ($username == "" && $password == "") {

					header("Location: ../flogin.php");
    				

				}else if($username != $uname && $password != $pword){
				 	
				 	header("Location: ../flogin.php");

				}else if($username == $uname && $password == $pword){ 
				 	   
					    


						if(isset($_POST['remember'])){

							$cookie_name1 = "user1";
							$cookie_value1 = $uname;
							$cookie_id1 = "userid1";
							$cookie_idvalue1 = $pas;
							$cookie_s1 = "psd1";
							$cookie_psdvalue1 = $pword;
							//expiriry time. 86400 = 1 day (86400*30 = 1 month)
							$expiry1 = time() + ( 3600);

							 setcookie($cookie_name1, $cookie_value1, $expiry1);
							 setcookie($cookie_id1, $cookie_idvalue1, $expiry1);
							 setcookie($cookie_s1, $cookie_psdvalue1, $expiry1);
							 $cookie_value;
							 session_start();
							 $_SESSION['userid1'] = $pas;
	         				 $_SESSION['logon'] = true;
							 header("Location: ../facilitator.php");
							 

					    }else{
					   		 session_start();
					   		 $_SESSION['userid1'] = $pas;
	         				 $_SESSION['logon'] = true;
							 header("Location: ../facilitator.php");
					    }	


	     	
	           }

	      
    }else{    	
    	$msg = 'alert("message successfully sent")';
    	header("Location: ../flogin.php?$mes=<?php echo $msg;?>");
    	
    }

    
   include("conn/close_connection.php");

?>