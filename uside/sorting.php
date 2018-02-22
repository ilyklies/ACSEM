<?php

$age['Peter'] = "35";

$age = array("CCSE"=>"7", "CBA"=>1, "CTHM"=>2);

arsort($age);
foreach($age as $x => $x_value) {
    echo "Dep=" . $x . ", Score" . $x_value;
    echo "<br>";
}
$counts = 1;

$StartDate =  date("m/d/Y",strtotime('monday this week'));
$Enddate = date("m/d/Y",strtotime('sunday this week'));

$begin = new DateTime($StartDate);
$end = new DateTime($Enddate);
$end = $end->modify( '+1 day' );

$diff = $end->diff($begin)->format("%a");

$daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);

foreach($daterange as $date){
	  echo $day[$counts] = $date->format("m/d/Y");
	  echo "</br>";
      $counts++; 
    }

?>