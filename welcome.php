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
$page="welcome";
include('header.php');

?>
<!--sidebar start-->

<?php 

include('sidebar.php');

?>

<?php
  $email = $_SESSION['email'];
  

  $q = "select sum(amount) as t_amount,sum(help_fund) as t_help_fund,sum(self_fund) as t_self_fund from add_fund where email='$email'";

  $getResult=mysqli_query($con,$q);


if($getResult){
    while($row=mysqli_fetch_array($getResult)){
        $total_amount=$row['t_amount'];
        $total_help_fund=$row['t_help_fund'];
        $total_self_fund=$row['t_self_fund'];
    }
}

 

?>

<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
      <!-- new start -->

  <!-- //market-->
    <div class="market-updates">
      <div class="col-md-4 market-update-gd">
        <div class="market-update-block clr-block-2">
          <div class="col-md-2 market-update-right">
          
          </div>
           <div class="col-md-10 market-update-left">
           <h5>Total Amount</h5>
          <h4>BDT <?php echo number_format($total_amount,2)?></h4>
          <p></p>
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>
      <div class="col-md-4 market-update-gd">
        <div class="market-update-block clr-block-1">
          <div class="col-md-2 market-update-right">
          
          </div>
          <div class="col-md-10 market-update-left">
          <h5>Total Help Fund Amount</h5>
            <h4>BDT <?php echo number_format($total_help_fund,2)?></h4>
            <p></p>
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>
      <div class="col-md-4 market-update-gd">
        <div class="market-update-block clr-block-3">
          <div class="col-md-2 market-update-right">
            
          </div>
          <div class="col-md-10 market-update-left">
            <h5>Total Self Fund Amount</h5>
            <h4>BDT <?php echo number_format($total_self_fund,2)?></h4>
            <p></p>
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>
       <div class="clearfix"> </div>
    </div>


<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     <b>On Going Events</b>
    </div>
    <div>
      
        <tbody>

 <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr class="bg-dark text-white text-center">
                <th style="text-align: center;">Id</th>
                <th style="text-align: center;">Event Name</th>
                
                <th style="text-align: center;">Event Amount</th>
                <th style="text-align: center;">Image</th>
                <th style="text-align: center;">Date</th>
                <th style="text-align: center;">Time</th>
                <th style="text-align: center;">Event URL</th>
                <th style="text-align: center;">Event Details</th>

              
              
           
            </tr>
        </thead>

    <?php

 include 'conn.php';
 
 $q = "SELECT * FROM add_event where status=1 order by id DESC";

 $query = mysqli_query($con,$q);
$i=0;

 while($res = mysqli_fetch_array($query)){
    $i++;
    
 ?>


    <tr class="text-center">
        <td>
            <?php echo $i;  ?>
        </td>
        <td>
            <?php echo $res['event_name'];  ?>
        </td>
        
        <td>
          <?php echo $res['event_amount'];  ?>  
        </td>

        <td><img src="admin/uploads/<?php echo $res['image']?>"  class="card-img-top" height="100px" width="100px" alt="..."/></td>
       
        <td>
            <?php echo $res['date'];  ?>
        </td>
        <td>
            <?php echo $res['e_time'];  ?>
        </td>


          <td>
            <a target="_blank" href="<?php echo $res['event_url']; ?>" class="btn btn-success" >Event URL</a> 
        </td>

        <td>
            <a href="event_details.php?viewid=<?php echo base64_encode($res['id']); ?>" class="btn btn-primary" >Details</a> 
        </td>

      




        

        
    </tr>
     <?php } ?>

            </table>   
        </tbody>
     
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
