<?php

require_once "conn.php";
session_start();

// For Expired Event Start

$date = time();


$q = "update add_event set status=0 WHERE event_time < '$date'";

$result=mysqli_query($con,$q);

// For Expired Event End

?>