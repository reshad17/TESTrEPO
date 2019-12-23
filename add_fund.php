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
$page="add_fund";
include('header.php');


?>
<?php 

include('sidebar.php');

?>

<section id="main-content" class="">
    <section class="wrapper">
        <div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     <b>Add Fund</b>
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

    $email=$_SESSION['email'];
    $q = "SELECT * FROM add_info WHERE email='$email'";

    $getResult=mysqli_query($con,$q);
    if($getResult){
    while($row=mysqli_fetch_array($getResult)){
        $email=$row['email'];
        $org=$row['org'];
        $address=$row['address'];
        $dob=$row['dob'];
        $school=$row['school'];
        $ssc_roll=$row['ssc_roll'];
        $college=$row['college'];
        $hsc_roll=$row['hsc_roll'];
        $id=$row['id'];

    }
}
  
    ?>


   <form method="post" action="confirm.php" name="myForm" onsubmit="return validateForm()" enctype="multipart/form-data">

      <div class="card">
          <div class="card-header bg-dark">
              <h1 class="text-white text-center">  </h1>
          </div>
          <br>
          <div class="col-md-12">
            <div class="col-md-5">
              <label>Enter Amount</label>
          <input type="text" name="amount" class="form-control" required="" value="200">
          
          <br>

          <input type="hidden" value="aamarpay" name="store_id" class="form-control">

        <input type="hidden" value="<?php echo rand(000000,999999); ?>" name="tran_id" class="form-control">
        


        <input type="hidden" value="http://982000uttara.aamarpay.com/success.php" name="success_url" class="form-control">
        


        <input type="hidden" value="http://982000uttara.aamarpay.com/fail.php" name="fail_url" class="form-control">
        

        
        <input type="hidden" name="cancel_url" value="http://982000uttara.aamarpay.com/fail.php" class="form-control">
        


        
        <input type="hidden" name="currency" value="BDT" class="form-control">
        


        <input type="hidden" value="28c78bb1f45112f5d40b956fe104645a" name="signature_key" class="form-control">


        
        <input type="hidden" name="desc" class="form-control" value="9800 Batch Donation">
        

        
        <input type="hidden" name="cus_name" class="form-control" value="<?php echo $_SESSION['username'];?>">
        

        
        <input type="hidden" name="cus_email" class="form-control" value="<?php echo $email;?>">
        

        
        <input type="hidden" name="cus_add1" class="form-control" value="<?php echo $address;?>">
        

        <!-- <label> Customer Add 2 </label>
          <input type="text" name="cus_add2" class="form-control">
        <br> -->

        
        <input type="hidden" name="cus_city" value="Dhaka" class="form-control">
        

        
        <input type="hidden" name="cus_state" value="Dhaka" class="form-control">
        

        
        <input type="hidden" name="cus_postcode" value="1212" class="form-control">
        

       
        <input type="hidden" name="cus_country" value="Bangladesh" class="form-control">
        

        
        <input type="hidden" name="cus_phone" value="<?php echo $_SESSION['phone'];?>" class="form-control">
       
        

          <input type="submit" class="btn btn-success" type="submit" value="Pay Now" name="done" id="submit"> 
            </div>
            <div class="col-md-2">
              
            </div>
            <div class="col-md-5" style="background-color: pink; padding: 20px; border-radius: 10px;">
              <label>Note:</label>
              <p readonly="">
 <b>Amount should be greater than BDT 200 or equivalent to BDT 200.<b><br><br> <b>BDT 200 will be deposited in the Help Fund and the remaining amount will be deposited in the Self Fund from the amount.<b><br><br><b>***Payment gateway charges will add to total amount you pay.<b>
              </p>
            </div>

          </div>

          
              
              </div>
            </form>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<section>
<?php 

@include('footer.php');

?>
</section>
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


<script>
    
function validateForm() {
  var x = document.forms["myForm"]["amount"].value;
  if (x < 200) {
    alert("Amount must be Equivalent to BDT 200 or Greater than BDT 200");
    return false;
  }
}

</script>



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
