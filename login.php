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
date_default_timezone_set('Asia/Dhaka');
$q = "SELECT * FROM add_event WHERE status='1'";
$result=mysqli_query($con,$q);
$currentDate = strtotime((new DateTime())->format("Y-m-d H:i"));

if ($result) {
   while ($row = mysqli_fetch_array($result)) {
      $id = $row['id'];
      $event_time = $row['event_time'];
      $event_date = $row['e_time'];

      if ($currentDate > $event_time) {
          $q = "UPDATE add_event SET status='0' WHERE id='$id'";
          $res=mysqli_query($con,$q);
      }
   }


}




// For Expired Event End



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
    <h2>Login Now</h2>

<?php
if($_SERVER['REQUEST_METHOD']=="POST"){

    
    $email = $_POST['email'];
    $password = $_POST['Password'];


    if(empty($email) || empty($password)){
             $msg = "<div style='margin-top: 50px'class='alert alert-danger'>
                      <strong>Field must not be empty</strong>
                    </div>";
                    echo $msg;
        }else{
            $password = md5($password);
            
            $query="SELECT * FROM users WHERE email='$email' AND password='$password'";
            $result=mysqli_query($con,$query);

            $value= mysqli_fetch_array($result);

            if(mysqli_num_rows($result)>0){

                $_SESSION['loggedin']=true;
                $_SESSION['username']=$value['username'];
                $_SESSION['phone']=$value['phone'];
               
                $_SESSION['email']=$value['email'];
                echo "<script>
                
                window.location='welcome.php';
                </script>";
            }
            else{
               $msg = "<div style='margin-top: 50px'class='alert alert-danger'>
                      <strong>Username or Password does not match</strong>
                    </div>";
                    echo $msg;
            }

        }
}


?>



     <?php  
 if(isset($_GET['loginmsg'])) {
     $loginmsg = "<div style='margin-top: 50px'class='alert alert-success'>
                  <strong>Please login</strong>
                </div>";
                echo $loginmsg;
                 
}
 ?>

        <form action="" method="post">
            <input type="text" class="ggg" name="email" placeholder="EMAIL">
            <input type="password" class="ggg" name="Password" placeholder="PASSWORD">
            <!-- <span><input type="checkbox" />Remember Me</span> -->
            <h6><a href="forgot_password.php">Forgot Password?</a></h6>
                <div class="clearfix"></div>
                <input type="submit" value="Login" name="login">
               <!--  <input type="button" onclick="window.location = '<?php echo $loginURL; ?>';" value="Log In With Facebook" class="btn btn-primary"> -->
                
        </form>

        <p>Don't Have an Account ?<a href="register.php">Create an account</a></p>
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
