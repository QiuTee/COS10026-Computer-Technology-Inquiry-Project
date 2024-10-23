<?php
session_start(); // start the session
unset($_SESSION['name']); // unset the username session variable
session_destroy(); // destroy all session data
header("Location: login.php"); // redirect to login page
exit();
?>