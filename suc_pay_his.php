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
$page="suc_pay_his";
include('header.php');


?>

<?php 

include('sidebar.php');

?>

<?php
if($_SERVER['REQUEST_METHOD']=="POST"){

  $pg_service_charge_bdt=$_POST['pg_service_charge_bdt'];
  $pay_status=$_POST['pay_status'];
  $pg_txnid=$_POST['pg_txnid'];
  $amount=$_POST['amount'];
  $mer_txnid=$_POST['mer_txnid'];
  $merchant_id=$_POST['merchant_id'];
  $store_id=$_POST['store_id'];
  $currency=$_POST['currency'];
  $currency_merchant=$_POST['currency_merchant'];
  $convertion_rate=$_POST['convertion_rate'];
  $store_amount=$_POST['store_amount'];
  $pay_time=$_POST['pay_time'];
  $bank_txn=$_POST['bank_txn'];
  $card_number=$_POST['card_number'];
  $card_holder=$_POST['card_holder'];
  $card_type=$_POST['card_type'];
  $opt_a=$_POST['opt_a'];
  $opt_b=$_POST['opt_b'];
  $opt_c=$_POST['opt_c'];
  $opt_d=$_POST['opt_d'];
  $ip_address=$_POST['ip_address'];
  $reason=$_POST['reason'];
  $other_currency=$_POST['other_currency'];
  $success_url=$_POST['success_url'];
  $fail_url=$_POST['fail_url'];
  $pg_service_charge_bdt=$_POST['pg_service_charge_bdt'];
  $pg_service_charge_usd=$_POST['pg_service_charge_usd'];
  $pg_card_bank_name=$_POST['pg_card_bank_name'];
  $pg_card_bank_country=$_POST['pg_card_bank_country'];
  $pg_error_code_details=$_POST['pg_error_code_details'];

$help_fund = '200';
$self_fund = $amount-$help_fund;
$email=$_SESSION['email'];
$query = "insert into add_fund(amount,help_fund,self_fund,email,date) values ('$amount','$help_fund','$self_fund','$email','$pay_time')";

$result=mysqli_query($con,$query);

if ($result) {
    echo "<script>alert('Payment successfully done');          
        window.location='success.php';
        </script>";
}

}

?>


<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
      <div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     <b>Successful Payment</b>
    </div>
    <div>

       <table id="example" class="display nowrap" style="width:100%">
        <thead>
    <tr class="bg-dark text-white text-center">
      
        <th style="text-align: center;"> ID </th>
        <th style="text-align: center;"> Amount </th>
        <th style="text-align: center;"> Help Fund </th>
        <th style="text-align: center;"> Self Fund </th>
        <th style="text-align: center;"> Email </th>
        <th style="text-align: center;"> Date </th>
        
    </tr>
    </thead>

    <?php

 include 'conn.php';
 $email=$_SESSION['email'];
 $q = "SELECT * FROM add_fund WHERE email='$email'";

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
            <?php echo $res['amount'];  ?>
        </td>
        <td>
            <?php echo $res['help_fund'];  ?>
        </td>
        <td>
            <?php echo $res['self_fund'];  ?>
        </td>
         <td>
            <?php echo $res['email'];  ?>
        </td>
         <td>
            <?php echo $res['date'];  ?>
        </td>
      
        
         
       
    </tr>
    <?php }?>

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
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );

</script>
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
