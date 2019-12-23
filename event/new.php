<?php
require_once "conn.php";
session_start();

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
<!DOCTYPE html>
<html>
<head>
	<title>Badminton</title>
</head>
<body>
	<form>
<table>
	<tr><img src="../admin/uploads/<?php echo $image;?>"></tr>
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

</form>
</table>
</body>
</html>