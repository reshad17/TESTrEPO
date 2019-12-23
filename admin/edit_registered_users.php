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
$page="edit_event";
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
     Edit Event
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

if(isset($_GET['editid'])){
    $id=base64_decode($_GET['editid']);

    $query="SELECT * FROM add_event WHERE id='$id'";
    $getResult=mysqli_query($con,$query);

}
if($getResult){
    while($row=mysqli_fetch_array($getResult)){
        $event_name=$row['event_name'];
        $event_details=$row['event_details'];
        $image=$row['image'];
        $date=$row['date'];
        $e_time=$row['e_time'];

  

    }
}

if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['update'])) {

    $event_name=$_POST['event_name'];
    // $image=$_POST['image'];
    $date=$_POST['date'];
    $event_details=$_POST['event_details'];
    $e_time=$_POST['e_time'];

        $image = $_FILES['image']['name'];

    $status = 1;
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $arr = explode(".", $_FILES['image']['name']);
    $file_ext=strtolower(end($arr));
    $extensions= array("jpg", "jpeg", "png", "gif");

    if (!empty($_FILES['image']['name'])) {
        if(in_array($file_ext,$extensions)=== false){
            $fileErr =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $status = 0;
        }
    }

      // Check if file already exists
        /*if (file_exists("uploads/".$image)) {
            $fileErr = "Sorry, file already exists.";
            $status = 0;
        }*/

    if ($status==1){
        if (empty($_FILES['image']['name'])) {
            $image = $result['image'];
            
        }
        else{ $image = rand().$image;}
        if (!empty($_FILES['image']['name'])) {
           
            @unlink("uploads/".$image);
            move_uploaded_file($file_tmp,"uploads/".$image);
        }
  

    if (empty($event_name) || empty($image) || empty($date)){
         
    }else{
        $query="update add_event set event_name='$event_name',event_details='$event_details',image='$image',date='$date',e_time='$e_time',status='1' where id='$id'";
        $result=mysqli_query($con,$query);
        if ($result) {
             $msg = "<div style='margin-top: 20px'class='alert alert-success'>
                <strong>Event updated successfully</strong>
             </div>";
     echo $msg;

        }else{
             $msg = "<div style='margin-top: 20px'class='alert alert-danger'>
                <strong>Something went wrong</strong>
             </div>";
     echo $msg;

        }
    }
    
    # code...
}
}


?>





   <?php





 


?>


         <form method="post" action="" enctype="multipart/form-data">

            <div class="card">
                <div class="card-header bg-dark">
                    <h1 class="text-white text-center">  </h1>
                </div>
                <br>

                <label> Event Name </label>
                <input type="text" name="event_name" class="form-control" value="<?php echo $event_name; ?>" required>
                <br>
                <label> Event Details </label>
                <input type="text" name="event_details" class="form-control" value="<?php echo $event_details; ?>" required>
                <br>

                <label> Image </label>
                <input type="file" name="image" class="form-control" required>
                <br>
                <img src="uploads/<?php echo $image;?>" height="100px" width="100px">
                <br>
                <br>
                <label> Date </label>
                <input type="date" name="date" class="form-control" value="<?php echo $date ?>" required>
                <br>
                <label> Time </label>
               
                <input type="time" name="e_time" class="form-control" value="<?php echo date("H:i", strtotime($e_time))  ?>" required>
                <br>

                <input type="hidden" name="id" value="<?php echo $id;?>">

               
                 

                <button class="btn btn-success" type="submit" name="update" > Update </button>
              
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
