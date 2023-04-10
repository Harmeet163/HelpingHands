<?php
include('config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$address = $_POST['address'];
	$state = $_POST['state'];
	$city = $_POST['city'];
	$pincode = $_POST['pincode'];
	$productname = $_POST['productname'];
	$sold = $_POST['sold'];
	$image = $_FILES["image"]["name"];
move_uploaded_file($_FILES["image"]["tmp_name"],"admin/Uploads/".$_FILES["image"]["name"]);
$sql = "INSERT INTO `products` (`name`, `address`, `city`, `state`, `pincode`, `sold`, `productname`, `image`) VALUES ('$name', '$address', '$city', '$state', '$pincode', '$sold', '$productname', '$image')" ;
$rs = mysqli_query($dbh, $sql);
if($rs)
{
	echo '<script type="text/javascript"> alert("Records Inserted Successfully!"); 	window.location = "sell.php"; </script>';
}
}
else
{
	echo "Are you a genuine visitor?";
}	?>
<br/>