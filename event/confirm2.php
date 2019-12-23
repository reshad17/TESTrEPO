<?php
require_once "../conn.php";
session_start();
?>


<!DOCTYPE html>
<html>
<head>
	 <title>98-2000 Uttara Batch</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>

	<body>

<?php


	if($_SERVER['REQUEST_METHOD']=="POST"){
	
	$event_name = $_POST['opt_a'];	
	$image = $_POST['image'];
    $cus_email = $_POST['cus_email'];
    $cus_name = $_POST['cus_name'];
    $amount = $_POST['amount'];
    $tax = ($amount*3.25 )/ 100;
    $total_amount = ceil($amount + $tax);


    $_SESSION['total_amount'] = $total_amount;
   
}

	if(isset($_GET['event_id'])){
		$id=$_GET['event_id'];
		    $email=$_SESSION['email'];
		 $query="SELECT * FROM add_event WHERE event_number='$id'";
	    
	    $getResult=mysqli_query($con,$query);
	}




?>
			
<div class="container">
	<div class="row">
		
	<div class="col-md-2"></div>
		<div class="col-md-8" style="padding-top: 100px; border-radius: 10px; padding-left: 80px; padding-bottom: 50px;padding-right: 90px; background-color: navajowhite; margin-top: 60px; margin-bottom: 60px;">
			<div class="row">
			<div class="col-md-8">
				 <form method="post" action="https://sandbox.aamarpay.com/index.php" target="_blank" name="myForm" onsubmit="return validateForm()" enctype="multipart/form-data">		
					<table class="table table-striped">

						<img src="../admin/uploads/aamarpay.png">
						<tr><img src="../admin/uploads/<?php echo $image;?>" class="card-img-top" height="50%" width="50%" ></tr>
						<tr>
		<label> Username</label>
         <input type="text" name="cus_name" class="form-control" value="<?php echo $_SESSION['username'];?>" readonly>
       <br>

        <label> Email</label>
         <input type="text" name="cus_email" class="form-control" value="<?php echo $_SESSION['email'];?>" readonly>
       <br>

        <label> Total Amount With Charge</label>
         <input type="text" value="<?php echo $_SESSION['total_amount'];?>" name="amount" class="form-control" readonly>
         <br>
		 <input type="hidden" value="aamarpay" name="store_id" class="form-control">

        <input type="hidden" value="<?php echo rand(000000,999999); ?>" name="tran_id" class="form-control">
        


        <input type="hidden" value="http://982000uttara.aamarpay.com/suc_event_pay.php" name="success_url" class="form-control">
        


        <input type="hidden" value="http://982000uttara.aamarpay.com/event/fail.php" name="fail_url" class="form-control">
        

        
        <input type="hidden" name="cancel_url" value="http://982000uttara.aamarpay.com/event/fail.php" class="form-control">
        


        
        <input type="hidden" name="currency" value="BDT" class="form-control">
        


        <input type="hidden" value="28c78bb1f45112f5d40b956fe104645a" name="signature_key" class="form-control">


        
        <input type="hidden" name="desc" class="form-control" value="9800 Batch Donation">
        

        
        <input type="hidden" name="cus_name" class="form-control" value="<?php echo $_SESSION['username'];?>">
        

        
        <input type="hidden" name="cus_email" class="form-control" value="<?php echo $_SESSION['email'];?>">
        

        
        <input type="hidden" name="cus_add1" class="form-control" value="<?php echo $address;?>">
        

        <!-- <label> Customer Add 2 </label>
          <input type="text" name="cus_add2" class="form-control">
        <br> -->

        
        <input type="hidden" name="cus_city" value="Dhaka" class="form-control">
        

        
        <input type="hidden" name="cus_state" value="Dhaka" class="form-control">
        

        
        <input type="hidden" name="cus_postcode" value="1212" class="form-control">
        

       
        <input type="hidden" name="cus_country" value="Bangladesh" class="form-control">

        
        <input type="hidden" name="opt_a" value="<?php echo $event_name;?>" class="form-control">
        

        
        <input type="hidden" name="cus_phone" value="<?php echo $_SESSION['phone'];?>" class="form-control">
									<td></td>
								<input type="submit" class="btn btn-success" type="submit" value="Confirm Payment" name="done" id="submit"> 
								</tr>
							</table>
						</form>
					</div>

					<div class="col-md-4">
						 
					</div>
					</div>

					<div class="col-md-2"></div>

					</div>
			
			</div>
		</div>
	</body>
</html>







