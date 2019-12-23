<?php

session_start();



$_SESSION['loggedin']=false;

// Redirect to login page
header("location: login.php");

?>