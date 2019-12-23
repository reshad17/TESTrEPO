<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php

require_once "conn.php";
session_start();



// For Expired Event Start

$times = date('h:i');
$date = date('Y-m-d');


$check_event_time=strtotime($date.$times);



$q = "update add_event set status=0 WHERE event_time > '$date'";
$result=mysqli_query($con,$q);

// For Expired Event End



if($_SERVER['REQUEST_METHOD']=="POST"){

    
    $email = $_POST['email'];
    $password = $_POST['Password'];


    if(empty($email) || empty($password)){
            echo "<script>
                alert('Field must not be empty!');
                window.location='login.php';
                </script>";
        }else{
            $password = md5($password);
            $query="SELECT * FROM admin_auth WHERE email='$email' AND password='$password'";
            $result=mysqli_query($con,$query);

            $value= mysqli_fetch_array($result);

            if(mysqli_num_rows($result)>0){

                $_SESSION['adminLoggedin']=true;
                $_SESSION['adminUsername']=$value['username'];
                $_SESSION['adminEmail']=$value['email'];
                $_SESSION['adminRole']=$value['role'];
                

                echo "<script>
                
                window.location='admin_welcome.php';
                </script>";
            }
            else{
                echo "<script>
                alert('Username password not matched!');
                window.location='login.php';
                </script>";
            }

        }
}


?>


<!DOCTYPE html>
<head>
<title>98-2000 Uttara Batch</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
    <h2>Log In Now</h2>
        <form action="" method="post">
            <input type="text" class="ggg" name="email" placeholder="EMAIL" required="">
            <input type="password" class="ggg" name="Password" placeholder="PASSWORD" required="">
         
            
                <div class="clearfix"></div>
                <input type="submit" value="Sign In" name="login">
        </form>
        <h6><a href="#">Forgot Password?</a></h6>
        
</div>
</div>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
