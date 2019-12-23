<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->



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
    <h2>OTP Verification</h2>
    


<?php

require_once "conn.php";
require_once ('SendGrid-API/vendor/autoload.php');
session_start();


if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['resend'])){

    $email = $_SESSION['myemail'];
    $username = $_SESSION['username'];
    $otp = rand(00000,99999);


$query ="update users set otp='$otp' where email='$email'";
$result = mysqli_query($con,$query);

if($result){
    
}
// mailStart

$from = new SendGrid\Email("98200Batch", "noreply@98200batch.com");
                $subject = "Your OTP password for 98200Batch registration";
                $message="This is your otp password: ".$otp;
                $to = new SendGrid\Email("$username", "$email");
                $content = new SendGrid\Content("text/html", "
                {$message}
                
                ");
                $mail = new SendGrid\Mail($from, $subject, $to, $content);
                $apiKey = ('SG.AdxYy_-aT9CTwmjEnxz1Iw._aQikEn_Cj9sQU_XpX_RGOY_7im9YAxVNiC-jo-8xHQ'); //api key provided by sendgrid
                $sg = new \SendGrid($apiKey);
                $response = $sg->client->mail()->send()->post($mail);

//mailEnd



    
}

if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['verify'])){
   
    unset($_GET['otpsendmsg']);
    $input_otp = $_POST['otp'];
    if (empty($input_otp)){
     $emptymsg = "<div style='margin-top: 50px'class='alert alert-danger'>
                      <strong>Field must not be empty</strong>
                    </div>";
                    echo $emptymsg;

         
    }else{
          $email = $_SESSION['myemail'];
          $username = $_SESSION['username'];
          $query="SELECT otp FROM users WHERE email='$email'";
          $getResult=mysqli_query($con,$query);

            if($getResult){
            while($row=mysqli_fetch_array($getResult)){
                $mail_otp=$row['otp'];
                }
            }

            if ($input_otp == $mail_otp ) {
        $query = "update users set mail_verify='1' where email='$email'";
                    $getResult=mysqli_query($con,$query);


                    if($getResult){
                      header("Location: login.php?loginmsg");



                }
                     
                 } else{

                    $matchmsg = "<div style='margin-top: 50px'class='alert alert-danger'>
                      <strong>OTP does not match !!! Please check your email and try again</strong>
                    </div>";
                    echo $matchmsg;
                        }

               
    }

      



}


 if(isset($_GET['otpsendmsg'])) {

     $otpsend = "<div style='margin-top: 50px'class='alert alert-success'>
                      <strong>OTP sent to your mail. Please check your mail</strong>
                    </div>";
                    echo $otpsend;

                  
                 
}






?>

        <form action="" method="post">
            <input type="text" class="ggg" name="otp" placeholder="Enter your otp password">
            
                <div class="clearfix"></div>
                <input type="submit" name="verify">
                <input type="submit" value="Resend" name="resend">
        </form>
        <p><a href="register.php">Register</a><a href="login.php"  role="button">Login</a></p>
</div>
</div>

<!-- For alert msg slider start -->
<script>
  
$(document).ready (function(){
            $(".alert").fadeTo(3000, 3000).slideUp(800);
 });
</script>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<!-- For alert msg slider end -->
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
