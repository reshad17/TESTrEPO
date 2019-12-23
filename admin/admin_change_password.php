<?php
// Initialize the session
require_once "conn.php";
session_start();


// Check if the user is already logged in, if yes then redirect him to welcome page
if($_SESSION["adminLoggedin"] != true){

  header('location:login.php');
}
?>

<!DOCTYPE html>
<?php 
$page = "admin_change_password";
?>

<?php
include('header.php');



include('sidebar.php');

?>


<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
      <div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     <b>Change Password</b>
    </div>
    <div>
      <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
      
        <tbody>

   <?php



?>

<?php


    $email=$_SESSION['adminEmail'];
    $query="SELECT * FROM admin_auth where email='$email'";
    $getResult=mysqli_query($con,$query);


if($getResult){
    while($row=mysqli_fetch_array($getResult)){
        $email=$row['email'];
        $password=$row['password'];
        

    }
}

if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['update'])) {

    $old_pass=$_POST['old_pass'];
    $old_pass=md5($old_pass);
    $new_password=md5($_POST['new_password']);
    $confirm_new_password=$_POST['confirm_new_password'];

   
if ($_POST['old_pass'] && $_POST['new_password'] && $_POST['confirm_new_password']) {

          
     if ($password != $old_pass) {
            $msg = "<div style='margin-top: 20px'class='alert alert-danger'>
                          <strong>Old password does not match</strong>
                       </div>";
                  echo $msg;
            }elseif ($new_password == $password) {
             $msg = "<div style='margin-top: 20px'class='alert alert-danger'>
                              <strong>Old password can not be new password</strong>
                           </div>";
                      echo $msg;
            }elseif ($confirm_new_password != $_POST['new_password']) {
              $msg = "<div style='margin-top: 20px'class='alert alert-danger'>
                              <strong>Confirm password does not match</strong>
                           </div>";
                      echo $msg;
}else{
       $query="update admin_auth set password='$new_password' where email='$email'";
       $result=mysqli_query($con,$query);

         $msg = "<div style='margin-top: 20px'class='alert alert-success'>
                  <strong>Password changed successfully</strong>
               </div>";
       echo $msg;
              }
  

}else{
   $msg = "<div style='margin-top: 20px'class='alert alert-danger'>
          <strong>All field is required</strong>
       </div>";
      echo $msg;
}
    

}


?>


         <form method="post" action="" enctype="multipart/form-data">
           <div class="col-md-12"></div>
              <div class="col-md-4">
                <div class="card">
                <div class="card-header bg-dark">
                    <h1 class="text-white text-center">  </h1>
                </div>
                <br>

                <label> Old Password </label>
                <input type="password" name="old_pass" class="form-control" >
                <br>

                <label> New Password </label>
                <input type="password" minlength="6" maxlength="12" name="new_password" class="form-control" >
                <br>

                <label> Confirm New Password </label>
                <input type="password" name="confirm_new_password" class="form-control" >
                <br>

                <button class="btn btn-success" type="submit" name="update" > Change </button>
              
            </div>
              </div>
              <div class="col-md-2"></div>
               <div class="col-md-6" style="background-color: pink; padding: 20px; border-radius: 10px;     margin-top: 20px;">

                <label>Note:</label>
              <p readonly="">
 <b>Old password can not be new password.</b><br><br><b>Minimum password length should be 6 digits.</b><br><br><b>Maximum password length should be 12 digits.</b>
              </p>
              </div>
            
        </form>

 
         
        </tbody>
      </table>
    </div>
  </div>
</div>
</section>



 <!-- footer -->
<?php 

include('footer.php');

?>
  <!-- / footer -->
</section>
<!--main content end-->

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
<!-- morris JavaScript -->  
<script>
    $(document).ready(function() {
        //BOX BUTTON SHOW AND CLOSE
       jQuery('.small-graph-box').hover(function() {
          jQuery(this).find('.box-button').fadeIn('fast');
       }, function() {
          jQuery(this).find('.box-button').fadeOut('fast');
       });
       jQuery('.small-graph-box .box-close').click(function() {
          jQuery(this).closest('.small-graph-box').fadeOut(200);
          return false;
       });
       
        //CHARTS
        function gd(year, day, month) {
            return new Date(year, month - 1, day).getTime();
        }
        
        graphArea2 = Morris.Area({
            element: 'hero-area',
            padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
            data: [
                {period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
                {period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
                {period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
                {period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
                {period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
                {period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
                {period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
                {period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
                {period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
            
            ],
            lineColors:['#eb6f6f','#926383','#eb6f6f'],
            xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
            pointSize: 2,
            hideHover: 'auto',
            resize: true
        });
        
       
    });
    </script>
<!-- calendar -->
    <script type="text/javascript" src="js/monthly.js"></script>
    <script type="text/javascript">
        $(window).load( function() {

            $('#mycalendar').monthly({
                mode: 'event',
                
            });

            $('#mycalendar2').monthly({
                mode: 'picker',
                target: '#mytarget',
                setWidth: '250px',
                startHidden: true,
                showTrigger: '#mytarget',
                stylePast: true,
                disablePast: true
            });

        switch(window.location.protocol) {
        case 'http:':
        case 'https:':
        // running on a server, should be good.
        break;
        case 'file:':
        alert('Just a heads-up, events will not work when run locally.');
        }

        });
    </script>
    <!-- //calendar -->

</body>
</html>