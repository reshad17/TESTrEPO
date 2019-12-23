<?php
// Initialize the session
require_once "../conn.php";
session_start();


// Check if the user is already logged in, if yes then redirect him to welcome page
if($_SESSION["loggedin"] != true){

  header('location:../login.php');
}
?>


<!DOCTYPE html>
<html>
<head>
	 <title>98-2000 Uttara Batch</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	  <style>
    #blink{
      font-size: 30px;
      font-weight: bold;
      font-family: sans-serif;
      color: #1c87c9;
      transition:0.4s;
      text-align: center;
      padding-left: 30px;
    }
   </style>
	

     

</head>

	<body style="margin-top: 70px; margin-left: 150px; width: 70%; background-color: #D6D6D6">

 <?php
	$email=$_SESSION['email'];
	if(isset($_GET['event_id'])){
		$id=$_GET['event_id'];
		


		 $query="SELECT * FROM add_event WHERE event_number='$id'";
	    
	    $getResult=mysqli_query($con,$query);
	}

	if($getResult){
	    while($row=mysqli_fetch_array($getResult)){
	        $event_name=$row['event_name'];
	        $amount=$row['event_amount'];
	        $image=$row['image'];
	        $event_details=$row['event_details'];
	        $event_location=$row['event_address'];

	    }
	}


	$query="SELECT * FROM add_info WHERE email='$email'";
	$data=mysqli_query($con,$query);


	if($data){

	    while($row=mysqli_fetch_array($data)){
	        $address=$row['address'];
	        $email=$row['email'];

	        

	      

	    }
	}

?>

<div class="container" style="">
	<div class="row">
		<div class="col-md-2" style=""></div>
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-4" style="">
					<img src="../admin/uploads/aamarpay.png" class="card-img-top" height="50px" width="100px" style="border-radius: 10px">
				</div>
				<div class="col-md-8"b style="text-align: right; padding-right: 127px; padding-top: 13px;margin-bottom: 24px;"><b>contact us: 01738851110</b></div>
			</div>
		</div>
		<div class="col-md-2" style=""></div>
	</div>

	<div class="row">
		<div class="col-md-2" style=""></div>
		<div class="col-md-8">
			<div class="row" style="">
				<div class="col-md-6" style="">
					<form method="post" action="confirm.php"  onsubmit="return validateForm()" enctype="multipart/form-data">	
				<table  style="background-color: lavender; border-radius: 10px; width: 100%">
					
				<input type="hidden" name="image" value="<?php echo $image;?>">
				<tr>
					<img src="../admin/uploads/<?php echo $image;?>" class="card-img-top" height="30%" width="30%" style="border-radius: 10px">
				</tr>
				<tr>
					<td><input type="hidden" name="event_location" value="<?php echo $event_location;?>"></td>
				</tr>
				
				<tr>
					<td>Event Name:</td>
					<td><?php echo $event_name;?></td>
				</tr>
				<tr>
				
					<td><input type="hidden" name="event_details" value="<?php echo $event_details;?>"></td>
				</tr>
				<tr>
					<td>Event Amount</td>
					<td><?php echo $amount;?></td>
				</tr>
				<tr>
					 <input type="hidden" value="aamarpay" name="store_id" class="form-control">
					 <input type="hidden" value="<?php echo $id;?>" name="event_id" class="form-control">
					 <input type="hidden" name="amount" value="<?php echo $amount;?>">

			        <input type="hidden" value="<?php echo rand(000000,999999); ?>" name="tran_id" class="form-control">
			        <input type="hidden" value="http://982000uttara.aamarpay.com/event/success.php" name="success_url" class="form-control">
			        <input type="hidden" value="http://982000uttara.aamarpay.com/event/fail.php" name="fail_url" class="form-control">       
			        <input type="hidden" name="cancel_url" value="http://982000uttara.aamarpay.com/event/fail.php" class="form-control">       
			        <input type="hidden" name="currency" value="BDT" class="form-control">
			       	<input type="hidden" value="28c78bb1f45112f5d40b956fe104645a" name="signature_key" class="form-control">       
			        <input type="hidden" name="desc" class="form-control" value="9800 Batch Donation">        
			        <input type="hidden" name="cus_name" class="form-control" value="<?php echo $_SESSION['username'];?>">       
			        <input type="hidden" name="cus_email" class="form-control" value="<?php echo $email;?>">        
			        <input type="hidden" name="cus_add1" class="form-control" value="<?php echo $address;?>">
			        <input type="hidden" name="cus_city" value="Dhaka" class="form-control">        
			        <input type="hidden" name="cus_state" value="Dhaka" class="form-control">       
			        <input type="hidden" name="cus_postcode" value="1212" class="form-control">       
			        <input type="hidden" name="cus_country" value="Bangladesh" class="form-control">
			        <input type="hidden" name="opt_a" value="<?php echo $event_name;?>" class="form-control">        
			        <input type="hidden" name="cus_phone" value="<?php echo $_SESSION['phone'];?>" class="form-control">
			        	</tr>
				</table>

					
					 <center><input type="submit" class="btn btn-success" type="submit" value="Pay Now" name="done" id="submit"></center>
					
				
			</form>

				</div>
				<div class="col-md-4" style="margin-left: -11px;background-color: pink; height: 160px; border-radius: 15px;">
					<label>Note:</label><p readonly=""><b>***Payment gateway charges will add to total event amount you pay.<b></p>
				</div>
			</div>
		</div>
		<div class="col-md-2" style=""></div>
	</div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="row">
			<div class="col-md-6" style="padding-left: 13px; padding-top: 24px;">
				<p><span style="font-size: 15px;">Payment Powered by</span></p>
			</div>
			<div class="col-md-6" style="margin-left: 171px; margin-top: -51px;">
				<img src="../admin/uploads/aamarpay.png" class="card-img-top" height="50px" width="100px" alt="..."/>
			</div>
			</div>
		</div>	
		<div class="col-md-2"></div>
	</div>
</div>










<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
      var blink = document.getElementById('blink');
      setInterval(function() {
         blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
      }, 1000); 
    </script>
</html>