<?php
session_start();
include('config.php');
error_reporting(0);
if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql ="SELECT email, password FROM users_info WHERE email=:email and password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['user']=$_POST['email'];
$_SESSION['name']=$results->name;
$currentpage=$_SERVER['REQUEST_URI'];
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
} else{
  echo "<script>alert('Invalid Email address Or Password');</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once('inc/header_links.php') ?>

<body style="background: #E8E8E8">
	<?php require_once('inc/header.php') ?>
	<br>
  <br><br><br><br>

	<div class="login-form">
  <form method="post">
    <h1>Login</h1>
    <div class="content">
      <div class="input-field">
        <input type="email" name="email" placeholder="Email" autocomplete="nope">
      </div>
      <div class="input-field">
        <input type="password" name="password" placeholder="Password" autocomplete="new-password">
      </div>
    </div>
    <div class="action">
			<button type="submit" name="login" value="Login">Sign in</button>
      <button formaction="registration.php">Register</button>
    </div>
  </form>
</div>
	<?php include('inc/footer.php') ?>
</body>
</html>
