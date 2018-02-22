<?php


		  

		 

		  
		  


		  $begin = new DateTime('09/16/2017');
		  $end = new DateTime('09/22/2017');
		  
		  $diff = $end->diff($begin)->format("%a");
		  
		  echo $diff;
		  echo "</br>";

          $daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);


          foreach($daterange as $date){
          echo $date->format("m/d/Y") . "<br>";
          }

?>