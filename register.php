<?php

// Initialize the session

session_start();

?>





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
<div class="reg-w3">
<div class="w3layouts-main">
    <h2>Register Now</h2>

<?php
require_once "conn.php";
require_once ('SendGrid-API/vendor/autoload.php');
if($_SERVER['REQUEST_METHOD']=="POST"){
        
        $email = $_POST['Email'];
        $phone = $_POST['Phone'];
        $username= $_POST['Username'];
        $password = $_POST['Password'];
        $otp = rand(00000,99999);
        $Confirm_Password = $_POST['Confirm_Password'];
     


        if(empty($email) || empty($phone) || empty($username) || empty($password)){
           $msg = "<div style='margin-top: 20px'class='alert alert-danger'>
                <strong>Field must not be empty</strong>
             </div>";
                echo $msg;
        }elseif( $password != $Confirm_Password){
         $msg = "<div style='margin-top: 20px'class='alert alert-danger'>
                <strong>Password does not match</strong>
             </div>";
     echo $msg;
        }else{
            $password = md5($password);
            $query="INSERT INTO users (email,phone,username,password,otp) VALUES ('$email','$phone','$username','$password','$otp')";
            $result=mysqli_query($con,$query);

            if($result==true){
                $_SESSION['myemail'] = $email;
                $_SESSION['username'] = $username;
// mailStart

$from = new SendGrid\Email("98200Batch", "noreply@98200batch.com");
                $subject = "Your OTP password for 98200uttara Batch registration";
                $message="Dear User,

                        The One Time Password (OTP) for your registration is: ".$otp;
                $to = new SendGrid\Email("$username", "$email");
                $content = new SendGrid\Content("text/html", "
                {$message}
                
                ");
                $mail = new SendGrid\Mail($from, $subject, $to, $content);
                $apiKey = ('SG.AdxYy_-aT9CTwmjEnxz1Iw._aQikEn_Cj9sQU_XpX_RGOY_7im9YAxVNiC-jo-8xHQ'); //api key provided by sendgrid
                $sg = new \SendGrid($apiKey);
                $response = $sg->client->mail()->send()->post($mail);

//mailEnd
           
             
             header("Location: otp.php?otpsendmsg");
         
                 
            }else{
              $msg = "<div style='margin-top: 20px'class='alert alert-danger'>
                <strong>Registration Failed</strong>
             </div>";
                echo $msg;

            }
            
        }
}
?>
    
        <form action="" method="post">
            <input type="email" class="ggg" name="Email" placeholder="Please enter your valid email">
            <input type="text" class="ggg" name="Phone" placeholder="Please enter your 11 digit phone number">
            <input type="text" class="ggg" name="Username" minlength="6" maxlength="12" placeholder="Username ">
            <input type="password" class="ggg" name="Password" placeholder="Password">
            <input type="password" class="ggg" name="Confirm_Password" placeholder="Confirm Password">
            <!-- <h4><input type="checkbox" />I agree to the Terms of Service and Privacy Policy</h4> -->
            
                <div class="clearfix"></div>
                <input type="submit" value="submit" name="register">
        </form>
        <p>Already Registered.<a href="login.php">Login</a></p>
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
