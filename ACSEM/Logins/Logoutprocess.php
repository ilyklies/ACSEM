<?php

session_start();

$cookie_name1 = 'userid1';
unset($_COOKIE[$cookie_name]);
// empty value and expiration one hour before
$res = setcookie($cookie_name1, '', time() - 3600);

session_destroy();

header("Location: ../flogin.php");
?>