<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php

require_once "conn.php";
require_once ('SendGrid-API/vendor/autoload.php');



if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['send'])){

 $email = $_POST['mail'];

 $forgot_password = rand(000000,999999);


 $q = "SELECT * FROM users WHERE email='$email'";
 $newquery = mysqli_query($con,$q);

$HasPass=md5($forgot_password );

$query = "update users set password='$HasPass' where email='$email'";
$result = mysqli_query($con,$query);


 if (mysqli_num_rows($newquery) > 0 ){     

    $from = new SendGrid\Email("98200Batch", "noreply@98200batch.com");
                $subject = "Your new password for 98200Batch login";
                $message="This is your new password: ".$forgot_password;
                $to = new SendGrid\Email("", "$email");
                $content = new SendGrid\Content("text/html", "
                {$message}
                
                ");
                $mail = new SendGrid\Mail($from, $subject, $to, $content);
                $apiKey = ('SG.AdxYy_-aT9CTwmjEnxz1Iw._aQikEn_Cj9sQU_XpX_RGOY_7im9YAxVNiC-jo-8xHQ'); //api key provided by sendgrid
                $sg = new \SendGrid($apiKey);
                $response = $sg->client->mail()->send()->post($mail);

     echo "<script>alert('Password send to your mail. Please check');          
        window.location='login.php'
        </script>";
 }else{
    echo "<script>alert('Email does not exists');          
        window.location='forgot_password.php'
        </script>";
 }

// mailStart



//mailEnd

}

    


// if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['send'])){

//     $forgot_password = $_POST['forgot_password'];
//     if (empty($forgot_password)){
//      echo "<script>
//                 alert('Field must not be empty');
//                 window.location='forgot_password.php';
//                 </script>";
         
//     }else{
         
//           $query="SELECT password FROM users WHERE email='$email'";
//           $getResult=mysqli_query($con,$query);

//             if($getResult){
//             while($row=mysqli_fetch_array($getResult)){
//                 $mail_password=$row['forgot_password'];
//                 }
//             }

               
//     }

//       if ($forgot_password == $mail_password ) {
//         $query = "update users set forgot_password='$mail_password' where email='$email'";
//                     $getResult=mysqli_query($con,$query);

//                     if($getResult){
//                     echo "<script>
//                             alert('Your password has been updated. Please login');
//                             window.location='login.php';
//                             </script>";
//                             }
                     
//                              } else{

//                     echo "<script>
//                             alert('Your password does not match. Please check your email and try again');
//                             window.location='forgot_password.php';
//                             </script>";
//                         }



// }





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
    <h2>Forgot Password</h2>
        <form action="" method="post">
            <input type="email" class="ggg" name="mail" placeholder="Enter your mail" required="">
            
                <div class="clearfix"></div>
                <input type="submit" value="Send" name="send" class="btn btn-primary">
                
        </form>
        <p><a href="register.php">Register</a><a href="login.php"  role="button">Login</a></p>
        
        
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
