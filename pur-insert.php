<?php
include('config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
	$buyername = $_POST['buyername'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$pincode = $_POST['pincode'];
	$purproductname = $_POST['purproductname'];	
$sql = "INSERT INTO `purchase` (`buyername`, `address`, `city`, `state`, `pincode`, `purproductname`) VALUES ('$buyername', '$address', '$city', '$state', '$pincode', '$purproductname')" ;
$rs = mysqli_query($dbh, $sql);
if($rs)
{
	echo '<script type="text/javascript"> alert("Records Inserted Successfully!"); 	window.location = "purchase.php"; </script>';
}
}
else
{
	echo "Are you a genuine visitor?";
}	
?>
<br/>