 <?php
 include("../../../conn/connection.php");

 	$admin = $_POST['Aid'];
        $afname = $_POST['Afname'];
        $amname = $_POST['Amname'];  
        $alname = $_POST['Alname'];
        $bdate = $_POST['Bdate'];
        $agender = $_POST['Agender'];
        $auname = $_POST['Auname'];
        $apword = $_POST['Apword'];
               
        $eventf = $_POST['Eventfile'];
        $File = substr($eventf,12);

 	$query = "SELECT * FROM tbl_admin";
        $result = mysqli_query($link, $query);
                    
        

	$sql1 = "Insert Into tbl_admin(AdminID,Afname,Amname,Alname,Bdate,Gender,Aphoto,Ausername,Apassword) Values ('$admin','$afname','$amname','$alname','$bdate','$agender','$File','$auname','$apword')";

  	$result1 = $link->query($sql1);

  		
 ?>