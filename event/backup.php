<?php
require_once "../conn.php";
session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title>98-2000 Uttara Batch</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="js/scripts.js"></script>
	<script src="js/jquery.slimscroll.js"></script>
	<script src="js/jquery.nicescroll.js"></script>
	<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
	<script src="js/jquery.scrollTo.js"></script>

</head>

	<body>

 <?php

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

?>
			
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-2"></div>
				<div class="col-md-8" style="padding-top: 100px; padding-left: 100px; padding-bottom: 50px;">
						<form>		
							<table>
								<img src="../admin/uploads/aamarpay.png">
								<tr><img src="../admin/uploads/<?php echo $image;?>"  class="card-img-top" height="50%" width="50%" ></tr>
								<tr>
									<td>Event Location</td>
									<td><input type="text" name="name" value="<?php echo $event_location;?>"></td>
								</tr>
								
								<tr>
									<td>Event Name</td>
									<td><input type="text" name="name" value="<?php echo $event_name;?>"></td>
								</tr>
								<tr>
									<td>Event Details</td>
									<td><input type="text" name="name" value="<?php echo $event_details;?>"></td>
								</tr>
								<tr>
									<td>Event Amount</td>
									<td><input type="text" name="name" value="<?php echo $amount;?>" readonly=""></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="submit" name=""></td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>







