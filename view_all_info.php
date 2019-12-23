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
$page="view_info";
include('header.php');
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
     <b>View All User Information</b>
    </div>
    <div>
      <table id="example" class="table table-striped table-bordered">
        <tbody>
            <?php

 include 'conn.php';
 $email=$_SESSION['email'];
 $q = "SELECT * FROM add_info WHERE email='$email'";

 $query = mysqli_query($con,$q);
 
 while($res = mysqli_fetch_array($query)){

    
 ?>
      <tr>
        <th style="color:black">Organization Name</th>
        <td style="width: 50%;color:black"><?php echo $res['org']; ?></td>
      </tr>

      <tr>
        <th style="color:black">User Name</th>
        <td style="color:black"><?php echo $res['name']; ?></td>
      </tr>

      <tr>
        <th style="color:black">Organization Address</th>
        <td style="color:black"><?php echo $res['address']; ?></td>
      </tr>

      <tr>
        <th style="color:black">Age</th>
        <td style="color:black"><?php echo $res['age']; ?></td>
      </tr>

      <tr>
        <th style="color:black">Residential Address</th>
        <td style="color:black"><?php echo $res['residential_address']; ?></td>
      </tr>

      <tr>
        <th style="color:black">Blood Group</th>
        <td style="color:black"><?php echo $res['blood_group']; ?></td>
      </tr>

      <tr>
        <th style="color:black">Date of Birth</th>
        <td style="color:black"><?php echo $res['dob']; ?></td>
      </tr>

      <tr>
        <th style="color:black">Maritial Status</th>
        <td style="color:black"><?php echo $res['maritial_status']; ?></td>
      </tr>

      <tr>
        <th style="color:black">School Name</th>
        <td style="color:black"><?php echo $res['school']; ?></td>
      </tr>

      <tr>
        <th style="color:black">SSC Roll</th>
        <td style="color:black"><?php echo $res['ssc_roll']; ?></td>
      </tr>

      <tr>
        <th style="color:black">College Name</th>
        <td style="color:black"><?php echo $res['college']; ?></td>
      </tr>

      <tr>
        <th style="color:black">HSC Roll</th>
        <td style="color:black"><?php echo $res['hsc_roll']; ?></td>
      </tr>

      <tr>
        <th style="color:black">Email</th>
        <td style="color:black"><?php echo $res['email']; ?></td>
      </tr>
     
    </tbody>

    <?php }?>
  
  </table>
        
      
    </div>
  </div>
</div>
        </div>
        <div class="col-md-2"></div>
</section>

<?php 

include('footer.php');


?>

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
