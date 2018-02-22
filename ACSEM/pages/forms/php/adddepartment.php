 <?php
 include("../../../conn/connection.php");

 		$depcode = $_POST['Depcode'];
        $depdes = $_POST['Depdes'];
        $depcover = $_POST['Depcover'];
        $eventf = $_POST['Eventfile'];
        $File = substr($eventf,12);

 		$query = "SELECT * FROM tbl_departments";
        $result = mysqli_query($link, $query);
                    
        while($row = mysqli_fetch_assoc($result)){
                    $depid = $row['DepID'];	
        }

        if($depid == ""){

	    $depid = "1000-Dep";

	  	}else{

	    $depid = $depid + 1 . "-Dep";
	   
	  	}

	  	$sql1 = "Insert Into tbl_departments(DepID,Depcode,Depdes,Deplogo,Depcover) Values ('$depid','$depcode','$depdes','$File','$depcover')";

  		$result1 = $link->query($sql1);

  		
 ?>