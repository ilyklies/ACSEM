 <?php
 include("../../../conn/connection.php");

 		$faci = $_POST['Fid'];
        $ffname = $_POST['Ffname'];
        $fmname = $_POST['Fmname'];  
        $flname = $_POST['Flname'];
        $bdate = $_POST['Bdate'];
        $fgender = $_POST['Fgender'];
        $funame = $_POST['Funame'];
        $fpword = $_POST['Fpword'];
               
        $eventf = $_POST['Eventfile'];
        $File = substr($eventf,12);

 		$query = "SELECT * FROM tbl_facilitator";
        $result = mysqli_query($link, $query);
                    
        

	  	$sql1 = "Insert Into tbl_facilitator(FacilitatorID,Ffname,Fmname,Flname,Fbdate,Fgender,Fphoto,Fusername,Fpassword) Values ('$faci','$ffname','$fmname','$flname','$bdate','$fgender','$File','$funame','$fpword')";

  		$result1 = $link->query($sql1);

  		
 ?>