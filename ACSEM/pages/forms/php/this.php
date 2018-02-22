<?php
							  
	include("../../../conn/connection.php");
	if (isset($_POST['search'])) {
        
        $search = $_POST['search'];
    }

    $query = "SELECT * FROM tbl_schedule where Venue LIKE '%".$search."%'";
   
    $result = mysqli_query($link, $query);
    while($row = mysqli_fetch_assoc($result)){
    	?> 
        <div class="col" style="width:100;height:20px;position:center;">
        <table Style="width:100%;">
        <tr>
            <th width="50%" bgcolor="#b0acac"><b><?php echo $row['TeamA']?></b><th>
            <th width="50%" bgcolor="#b0acac"><b><?php echo $row['TeamB'];?></b></th>
        <tr>
        </table>
       
        </div>

    	<?php
	}


	$query1 = "SELECT * FROM tbl_schedule where Venue LIKE '%".$search."%'";
   
    $result1 = mysqli_query($link, $query1);
    while($row = mysqli_fetch_assoc($result1)){
    	
        echo $row['Venue'];

	}	

?>
