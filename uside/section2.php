<?php 
 include('ACSEM/conn/connection.php');
 session_start();
 $id = $_SESSION['id'];

     date_default_timezone_set('Asia/Manila');


    // Prints something like: Monday
    
    $today = date("m/d/Y"); 
 ?> 
  	
<html>
<body style="margin:auto;">
<h2 style="text-align:center;"><img src="images/acsemlogo.png" style="padding:0;margin: 0 10px 0 40px;width:43px;height:45px;">Match Schedules</h2><br>
	
	            <?php
                    $query2 = "SELECT * FROM tbl_schedule Where EventID = '$id' and Dates = '$today'";
                    $result2 = mysqli_query($link, $query2);
                              while($row = mysqli_fetch_assoc($result2)){
                              
                              $sportsid = $row['SportsID'];
                              $matchid = $row['MatchID'];
                              $venue = $row['Venue'];
                              $starttime = $row['StartTime'];
                              $endtime = $row['EndTime'];
                              $teama = $row['TeamA'];
                              $teamb = $row['TeamB'];


                              $query3 = "SELECT * FROM tbl_sports Where SportsID = '$sportsid'";
                              $result3 = mysqli_query($link, $query3);
                              while($row = mysqli_fetch_assoc($result3)){
             						
                              $sportsname = $row['SportsName'];
                              
                              ?>
       

		                              	<table class="table">
		                              		<thread>
		                              			<tr>
		                              				<th>Sport</th>
		                              				<th>Venue</th>
		                              				<th>Team A</th>
		                              				<th>Team B</th>
		                              				<th>Start Time</th>
		                              				<th>End Time</th>
		                              			</tr>
		                              		</thread>
		                              		<tbody>
		                              			<tr>
		                              				<th><?php echo $sportsname ?></th>
		                              				<th><?php echo $venue ?></th>
		                              				<th><?php echo $teama ?></th>
		                              				<th><?php echo $teamb ?></th>
		                              				<th><?php echo $starttime ?></th>
		                              				<th><?php echo $endtime ?></th>
		                              			</tr>
		                              		</tbody>
		                              	</table>


                              <?php
                              }
  
              	                    
                }?>
</body>
</html>