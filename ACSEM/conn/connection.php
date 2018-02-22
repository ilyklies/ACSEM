<?php

$link = mysqli_connect('localhost','root','','db_acsem');

 if($link->connect_error){
 	die('connection error: '.$link->connect_error);
 }
 

?>