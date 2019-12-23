<?php



// Initialize the session
session_start();

// // Unset all of the session variables
// $_SESSION = array();

// // Destroy the session.

$_SESSION['adminLoggedin']=false;


// Redirect to login page
header("location: login.php");
exit;
?>
