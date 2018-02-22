 <?php
 include("../../../conn/connection.php");

 	$studid = $_POST['Sid'];
        $sfname = $_POST['Sfname'];
        $smname = $_POST['Smname'];  
        $slname = $_POST['Slname'];
        $sgender = $_POST['Sgender'];
        $depcode = $_POST['Sdep'];
        $depid = "";


        $query1 = "SELECT * FROM tbl_departments where Depcode = '$depcode'";
        $result1 = mysqli_query($link, $query1);

        while($row = mysqli_fetch_assoc($result1)){

                $depid = $row['DepID'];

        }     
        

 	$query = "SELECT * FROM tbl_admin";
        $result = mysqli_query($link, $query);
                    
        

	$sql1 = "Insert Into tbl_students(StudID,Sfname,Smname,Slname,Sgender,DepID) Values ('$studid','$sfname','$smname','$slname','$sgender','$depid')";

  	$result1 = $link->query($sql1);
        header("Location: ../addstudent.php");

  		
 ?>