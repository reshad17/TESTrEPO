

<?php  
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
	$first_number = $_POST['first_number'];
	$middle_number = $_POST['middle_number'];
	$last_number = $_POST['last_number'];

if ($first_number <= $middle_number) {
	if ($first_number <= $last_number) {
		echo $first_number;
		}else{
			echo $last_number;
	}

	}
if ($middle_number <= $last_number) {
	if ($middle_number <= $first_number) {
		echo $middle_number;
		}else{
			echo $first_number;
}

	}

}


?>



<!DOCTYPE html>
<html>
<head>
	<title>new</title>
</head>
<body>
<form action="" method="POST">
  <label>First Number</label>
    <input type="text" name="first_number">
    <br>
    <br>

  <label>Middle Number</label>  
    <input type="text" name="middle_number">
    <br>

  <label>Last Number</label>  
    <input type="text" name="last_number">
    <br>


    <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>