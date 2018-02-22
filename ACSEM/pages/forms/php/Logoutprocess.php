<?php


session_start();
//deleting cookie by setting expirty to past time
setcookie ('userid', "", time() - 3600);
//destroys all session variables
session_destroy();

header("Location: ../../../login.php");

?>