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
$page="ongoing_event_detals";
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
     <b>Event Details</b>
    </div>
    <div>
      <table id="example" class="table table-striped table-bordered">
        <tbody>
            <?php

 include 'conn.php';
 $email=$_SESSION['email'];

 if(isset($_GET['viewid'])){
    $id=base64_decode($_GET['viewid']);
 $q = "SELECT * FROM add_event where id='$id'";

 $query = mysqli_query($con,$q);

}
 
 while($res = mysqli_fetch_array($query)){

    
 ?>
      <tr>
        <th style="color:black">Event Name</th>
        <td style="width: 50%; color: black"><?php echo $res['event_name']; ?></td>
      </tr>

      <tr class="bg-dark text-white">
        <th style="color:black">Event Address</th>
        <td style="color:black"><?php echo $res['event_address']; ?></td>
      </tr>


      <tr>
        <th style="color:black">Evenet Details</th>
        <td><textarea style="color:black" readonly=""><?php echo $res['event_details']; ?></textarea></td>
      </tr>

      <tr>
        <th style="color:black">Evenet Amount</th>
        <td style="color:black"><?php echo $res['event_amount']; ?></td>
      </tr>

      <tr>
        <th style="color:black">Image</th>
        <td style="color:black"><img src="admin/uploads/<?php echo $res['image']?>"  class="card-img-top" height="100px" width="100px" alt="..."/></td>
      </tr>

      <tr>
        <th style="color:black">Date</th>
        <td style="color:black"><?php echo $res['date']; ?></td>
      </tr>

      <tr>
        <th style="color:black">Time</th>
        <td style="color:black"><?php echo $res['e_time']; ?></td>
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
