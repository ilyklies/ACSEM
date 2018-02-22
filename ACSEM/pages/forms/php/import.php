<?php
include("../../../conn/connection.php");
if(isset($_POST["Import"])){
 
    
        $type = explode(".",$_FILES['file']['name']);
        if(strtolower(end($type)) == 'csv'){
          
          echo $filename=$_FILES["file"]["tmp_name"];
     
     
          if($_FILES["file"]["size"] > 0)
          {
     
            $file = fopen($filename, "r");
               while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
               {
     
                
                 $sql = "Insert Into tbl_students (StudID, Sfname, Smname, Slname,Sgender,DepID ) 
                    values('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]')";
                 $result = $link->query($sql);
            if(! $result )
            {
              
     
            }
     
               }
               fclose($file);
               //throws a message if data successfully imported to mysql database from excel file
               echo "<script type=\"text/javascript\">
                alert(\"CSV File has been successfully Imported.\");
                window.location = \"../users.php\"
              </script>";
     
     
     
           //close of connection
          mysql_close($conn); 
     
     
     
          }



    } else {
              echo "<script type=\"text/javascript\">
              alert(\"Invalid File:Please Upload CSV File.\");
              window.location = \"../users.php\"
            </script>";
    }


     
  }  
?>  