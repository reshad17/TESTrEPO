
<?php  
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$first_number = $_POST['first_number'];
	$last_number = $_POST['last_number'];

echo "$first_number";
echo "$last_number";


}


?>




<form action="" method="post">
  <label>First Number</label>
    <input type="text" name="first_number" required="">
    <br>
    <br>

  <label>Last Number</label>  
    <input type="text" name="last_number" required="">
    <br>


    <input type="button" name="submit" value="Submit">
</form>


<!-- <?php

foreach (range('1', '10') as $result) {
    echo $result;
}

?> -->



