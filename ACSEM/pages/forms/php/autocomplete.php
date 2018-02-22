<?php 
	include("../../../conn/connection.php");
	if (isset($_POST['search'])) {
        
        $search = $_POST['search'];
    }

    $query = "SELECT * FROM tbl_event where EventID LIKE '%".$search."%'";
   
    $result = mysqli_query($link, $query);
    while($row = mysqli_fetch_assoc($result)){
    	 
    	 $eventn = $row['EventName'];
         $eventd = $row['EventDescription'];
         
    }
   

    
?>