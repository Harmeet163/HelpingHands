<?php
session_start();
include('config.php');
error_reporting(0);
if(isset($_POST['reg']))
  {
$name=$_POST['name'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql="INSERT INTO users_info(name,mobile,email,password) VALUES(:name,:mobile,:email,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{$msg=" Registration Submitted successfully";
} else { $error=" Something went wrong. Please try again";
}} ?>
<html lang="en">
<?php require_once('inc/header_links.php') ?>
<body style="background: #E8E8E8">
	<?php require_once('inc/header.php') ?>
	<br>
  <br><br><br><br>
<div class="login-form">
	<form method="post" enctype="multipart/form-data">
	<h1>Register</h1>
    <div class="content">
		<?php if($error){?><div class="errorWrap"><strong>ERROR </strong>:<?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div class="succWrap"><strong>SUCCESS </strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
			<div class="input-field">
				<input type="text" class="form-control" name="name" placeholder="Full Name" required="required">
			</div>
			<div class="input-field">
				<input type="text" class="form-control" name="mobile" placeholder="Mobile Number" maxlength="10" required="required">
			</div>
			<div class="input-field">
				<input type="email" class="form-control" name="email" id="emailid" onBlur="checkAvailability()" placeholder="Email Address" required="required">
				<span id="user-availability-status" style="font-size:12px;"></span>
			</div>
			<div class="input-field">
				<input type="password" class="form-control" name="password" placeholder="Password" required="required">
			</div>
			<div class="input-field">
				<input type="submit" value="Sign Up" name="reg" class="btn btn-primary btn-block" style="color:#091E3E;">
			</div>
		</div>
	</form>
	</div>
<?php include('inc/footer.php') ?>
</body>
</html>