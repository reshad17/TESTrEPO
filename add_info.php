<?php
// Initialize the session
require_once "conn.php";
session_start();


// Check if the user is already logged in, if yes then redirect him to welcome page
if($_SESSION["loggedin"] != true){

  header('location:login.php');
}
?>


<!DOCTYPE html>
<?php 
$page="add_info";
include('header.php');


?>
<?php 

include('sidebar.php');

?>

<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">

        <div class="col-md-12"></div>
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     <b>Add Personal Information</b>
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



if(isset($_POST['done']) && $_SERVER['REQUEST_METHOD']=="POST"){

 $org = $_POST['organization_name'];
 $name = $_POST['name'];
 $dob = $_POST['dob'];
 $maritial_status = $_POST['maritial_status'];
 $school = $_POST['school'];
 $college = $_POST['college'];
 $address = $_POST['address'];
 $age = $_POST['age'];
 $residential_address = $_POST['residential_address'];
 $blood_group = $_POST['blood_group'];
 $ssc_roll = $_POST['ssc_roll'];
 $hsc_roll = $_POST['hsc_roll'];
 $email = $_SESSION['email'];


$creator = $_SESSION['username'];

 $q = "SELECT * FROM add_info WHERE email='$email'";
 $query = mysqli_query($con,$q);



 if (mysqli_num_rows($query) > 0 ){
     $msg = "<div style='margin-top: 20px'class='alert alert-danger'>
                <strong>Information already added using this email</strong>
             </div>";
     echo $msg;
 }elseif (empty($org) || empty($name) || empty($dob) || empty($maritial_status) || empty($school) || empty($college) || empty($address) || empty($age) || empty($residential_address) || empty($blood_group) || empty($ssc_roll) || empty($hsc_roll)) {
     $msg = "<div style='margin-top: 20px'class='alert alert-danger'>
                <strong>Field must not be empty</strong>
             </div>";
     echo $msg;

    }else{

      

     $qr = "INSERT INTO add_info(org,name,address,age,residential_address,blood_group,dob,maritial_status,school,ssc_roll,college,hsc_roll,email) VALUES ('$org','$name','$address','$age','$residential_address','$blood_group','$dob','$maritial_status','$school','$ssc_roll','$college','$hsc_roll','$email')";
     $querys = mysqli_query($con,$qr);

         $msg = "<div style='margin-top: 20px'class='alert alert-success'>
                <strong>Information added successfully</strong>
             </div>";
     echo $msg;
 }

    }
 
?>


             <form method="post" action="" enctype="multipart/form-data">

              

                <div class="card">
                    <div class="card-header bg-dark">
                        <h1 class="text-white text-center">  </h1>
                    </div>
                    <br>

                    <div class="col-md-12">
                      <div class="col-md-6">
                        <label> Organization Name </label>
                        <input type="text" name="organization_name" class="form-control" >
                        <br>

                        <label> Name </label>
                        <input type="text" name="name" class="form-control" >
                        <br>

                        <label> Date of Birth </label>
                        <input type="date" name="dob" class="form-control" >
                        <br>

                        <label> Maritial Status </label>
                        <select class="form-control" id="sel1" name="maritial_status">
                          <option>Married</option>
                          <option>Single</option>
                        </select>
                        <br>

                        <label> School Name </label>
                        <input type="text" name="school" class="form-control" >
                        <br>

                        <label> College Name </label>
                        <input type="text" name="college" class="form-control" >
                        <br>

                        
                      </div>



                      <div class="col-md-6">
                         <label> Organization Address </label>
                          <input type="text" name="address" class="form-control" >
                          <br>

                          <label> Age </label>
                        <input type="text" name="age" class="form-control" >
                        <br>

                        <label> Residential Address </label>
                          <input type="text" name="residential_address" class="form-control" >
                          <br>

                          <label> Blood Group </label>
                          <select class="form-control" id="sel1" name="blood_group">
                              <option>A+</option>
                              <option>A-</option>
                              <option>B+</option>
                              <option>B-</option>
                              <option>O+</option>
                              <option>O-</option>
                              <option>AB+</option>
                              <option>AB-</option>
                          </select>
                          <br>

                          <label> SSC Roll </label>
                    <input type="text" name="ssc_roll" class="form-control" >
                    <br>

                    <label> HSC Roll </label>
                    <input type="text" name="hsc_roll" class="form-control" >
                    <br>

                      
                      </div>

                   
                    
                    


                    <button class="btn btn-success" type="submit" name="done" > Submit </button>
                  
                </div>
                </div>



              </div>
           
            </form>     
            </tbody>
          </table>
        </div>
      </div>
    </div>
      </div>
      <div class="col-md-2"></div>

      
</section>
 <!-- footer -->
<?php 

include('footer.php');

?>
  <!-- / footer -->
</section>
<!--main content end-->
</section>

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
