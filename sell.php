<?php 
session_start();
include('config.php'); 
error_reporting(0);
if(isset($_POST['ssubmit']) && !empty($_POST) )
{
$name=$_POST['name'];
$sellerid=$_POST['sellerid'];
$cno=$_POST['cno'];
$email=$_POST['email'];
$productname=$_POST['productname'];
$sold=$_POST['sold'];
$image1=$_FILES["img1"]["name"];
$image2=$_FILES["img2"]["name"];
$image3=$_FILES["img3"]["name"];
$image4=$_FILES["img4"]["name"];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$pincode=$_POST['pincode'];
$productdes=$_POST['productdes'];
move_uploaded_file($_FILES["img1"]["tmp_name"],"admin/uploads/".$_FILES["img1"]["name"]);
move_uploaded_file($_FILES["img2"]["tmp_name"],"admin/uploads/".$_FILES["img2"]["name"]);
move_uploaded_file($_FILES["img3"]["tmp_name"],"admin/uploads/".$_FILES["img3"]["name"]);
move_uploaded_file($_FILES["img4"]["tmp_name"],"admin/uploads/".$_FILES["img4"]["name"]);
$sql="INSERT INTO products(name,sellerid,cno,email,productname,sold,image1,image2,image3,image4,address,city,state,pincode,productdes) VALUES(:name,:sellerid,:cno,:email,:productname,:sold,:image1,:image2,:image3,:image4,:address,:city,:state,:pincode,:productdes)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':sellerid',$sellerid,PDO::PARAM_STR);
$query->bindParam(':cno',$cno,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':productname',$productname,PDO::PARAM_STR);
$query->bindParam(':sold',$sold,PDO::PARAM_STR);
$query->bindParam(':image1',$image1,PDO::PARAM_STR);
$query->bindParam(':image2',$image2,PDO::PARAM_STR);
$query->bindParam(':image3',$image3,PDO::PARAM_STR);
$query->bindParam(':image4',$image4,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':state',$state,PDO::PARAM_STR);
$query->bindParam(':pincode',$pincode,PDO::PARAM_STR);
$query->bindParam(':productdes',$productdes,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{ $msg=" Sell Product/Courses Submitted successfully";
} else { $error=" Something went wrong. Please try again"; }
header( "refresh:3;url=product.php" );
} ?>
<!DOCTYPE html>
<html lang="en">
<?php include('inc/header_links.php') ?>
<style>
    /*//////////////////////////////////////////////////////////////////
    [ FONT ]*/
    
    @font-face {
      font-family: Raleway-SemiBold;
      src: url('fonts/raleway/Raleway-SemiBold.ttf'); 
    }
    
    @font-face {
      font-family: Raleway-Bold;
      src: url('fonts/raleway/Raleway-Bold.ttf'); 
    }
    
    @font-face {
      font-family: Raleway-Black;
      src: url('fonts/raleway/Raleway-Black.ttf'); 
    }
    
    a:focus {
    	outline: none !important;
    }
    
    a:hover {
    	text-decoration: none;
    }
    
    /*---------------------------------------------*/
    h1,h2,h3,h4,h5,h6 {
    	margin: 0px;
    }
    
    p {
    	font-family: Raleway-SemiBold;
    	font-size: 14px;
    	line-height: 1.7;
    	color: #666666;
    	margin: 0px;
    }
    
    ul, li {
    	margin: 0px;
    	list-style-type: none;
    }
    
    
    /*---------------------------------------------*/
    input {
    	outline: none;
    	border: none;
    }
    
    textarea {
      outline: none;
      border: none;
    }
    
    textarea:focus, input:focus {
      border-color: transparent !important;
    }
    
    input:focus::-webkit-input-placeholder { color:transparent; }
    input:focus:-moz-placeholder { color:transparent; }
    input:focus::-moz-placeholder { color:transparent; }
    input:focus:-ms-input-placeholder { color:transparent; }
    
    textarea:focus::-webkit-input-placeholder { color:transparent; }
    textarea:focus:-moz-placeholder { color:transparent; }
    textarea:focus::-moz-placeholder { color:transparent; }
    textarea:focus:-ms-input-placeholder { color:transparent; }
    
    input::-webkit-input-placeholder { color: #adadad;}
    input:-moz-placeholder { color: #adadad;}
    input::-moz-placeholder { color: #adadad;}
    input:-ms-input-placeholder { color: #adadad;}
    
    textarea::-webkit-input-placeholder { color: #adadad;}
    textarea:-moz-placeholder { color: #adadad;}
    textarea::-moz-placeholder { color: #adadad;}
    textarea:-ms-input-placeholder { color: #adadad;}
    
    label {
      display: block;
      margin: 0;
    }
    
    /*---------------------------------------------*/
    button {
    	outline: none !important;
    	border: none;
    	background: transparent;
    }
    
    button:hover {
    	cursor: pointer;
    }
    
    iframe {
    	border: none !important;
    }
    
    /*//////////////////////////////////////////////////////////////////
    [ utility ]*/
    
    
    
    
    /*//////////////////////////////////////////////////////////////////
    [ Contact ]*/
    
    .container-contact100 {
      width: 100%;  
      min-height: 100vh;
      display: -webkit-box;
      display: -webkit-flex;
      display: -moz-box;
      display: -ms-flexbox;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      padding: 50px;
      background: rgb(167, 163, 163);
      /* background: -webkit-linear-gradient(45deg, #c77ff2, #e8519e); */
      /* background: -o-linear-gradient(45deg, #c77ff2, #e8519e); */
      /* background: -moz-linear-gradient(45deg, #c77ff2, #e8519e); */
      /* background: linear-gradient(45deg, #c77ff2, #e8519e); */
    
    }
    
    .wrap-contact100 {
      width: 790px;
      background: #fff;
      border-radius: 10px;
      padding: 55px 95px 68px 95px;
    }
    
    
    /*==================================================================
    [ Form ]*/
    
    .contact100-form {
      width: 100%;
      display: -webkit-box;
      display: -webkit-flex;
      display: -moz-box;
      display: -ms-flexbox;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }
    
    .contact100-form-title {
      width: 100%;
      display: block;
      font-family: Raleway-Black;
      font-size: 30px;
      color: #333333;
      line-height: 1.2;
      text-align: center;
      padding-bottom: 45px;
    }
    
    
    
    /*------------------------------------------------------------------
    [ Input ]*/
    
    .wrap-input100 {
      width: 100%;
      position: relative;
      border: 1px solid #e6e6e6;
      border-radius: 10px;
      margin-bottom: 34px
    }
    
    .rs1.wrap-input100 {
      width: calc((100% - 40px) / 2);
    }
    
    
    .label-input100 {
      font-family: Raleway-SemiBold;
      font-size: 17px;
      color: #555555;
      line-height: 1.5;
      text-transform: uppercase;
      width: 100%;
    
      padding-bottom: 11px;
    }
    
    .input100 {
      display: block;
      width: 100%;
      background: transparent;
      font-family: Raleway-SemiBold;
      font-size: 16px;
      color: #333333;
      line-height: 1.2;
      padding: 0 25px;
    }
    
    input.input100 {
      height: 55px;
    }
    
    textarea.input100 {
      min-height: 162px;
      padding-top: 19px;
      padding-bottom: 15px;
    }
    
    /*---------------------------------------------*/
    
    .focus-input100 {
      position: absolute;
      display: block;
      width: calc(100% + 2px);
      height: calc(100% + 2px);
      top: -1px;
      left: -1px;
      pointer-events: none;
      border: 1px solid;
      border-color: #000000;
      border-radius: 10px;
    
      visibility: hidden;
      opacity: 0;
    
      -webkit-transition: all 0.4s;
      -o-transition: all 0.4s;
      -moz-transition: all 0.4s;
      transition: all 0.4s;
    
      -webkit-transform: scaleX(1.1) scaleY(1.3);
      -moz-transform: scaleX(1.1) scaleY(1.3);
      -ms-transform: scaleX(1.1) scaleY(1.3);
      -o-transform: scaleX(1.1) scaleY(1.3);
      transform: scaleX(1.1) scaleY(1.3);
    }
    
    .input100:focus + .focus-input100 {
      visibility: visible;
      opacity: 1;
    
      -webkit-transform: scale(1);
      -moz-transform: scale(1);
      -ms-transform: scale(1);
      -o-transform: scale(1);
      transform: scale(1);
    }
    
    
    
    /*------------------------------------------------------------------
    [ Button ]*/
    .container-contact100-form-btn {
      width: 100%;
      display: -webkit-box;
      display: -webkit-flex;
      display: -moz-box;
      display: -ms-flexbox;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      margin-top: -4px;
    }
    
    .contact100-form-btn {
      font-family: Raleway-Bold;
      font-size: 16px;
      color: #fff;
      line-height: 1.2;
    
      display: -webkit-box;
      display: -webkit-flex;
      display: -moz-box;
      display: -ms-flexbox;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 0 20px;
      min-width: 150px;
      height: 55px;
      border-radius: 27px;
      background: #000000;
      position: relative;
      z-index: 1;
    
      -webkit-transition: all 0.4s;
      -o-transition: all 0.4s;
      -moz-transition: all 0.4s;
      transition: all 0.4s;
    }
    
    .contact100-form-btn::before {
      content: "";
      display: block;
      position: absolute;
      z-index: -1;
      border-radius: 27px;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      background: #333333;
      opacity: 1;
      -webkit-transition: all 0.4s;
      -o-transition: all 0.4s;
      -moz-transition: all 0.4s;
      transition: all 0.4s;
    }
    
    .contact100-form-btn:hover:before {
      opacity: 0;
    }
    
    .contact100-form-btn i {
      -webkit-transition: all 0.4s;
      -o-transition: all 0.4s;
      -moz-transition: all 0.4s;
      transition: all 0.4s;
    }
    .contact100-form-btn:hover i {
      -webkit-transform: translateX(10px);
      -moz-transform: translateX(10px);
      -ms-transform: translateX(10px);
      -o-transform: translateX(10px);
      transform: translateX(10px);
    }
    
    
    /*------------------------------------------------------------------
    [ Responsive ]*/
    
    @media (max-width: 768px) {
      .wrap-contact100 {
        padding: 55px 45px 68px 45px;
      }
    }
    
    @media (max-width: 576px) {
      .wrap-contact100 {
        padding: 55px 15px 68px 15px;
      }
  
      .rs1.wrap-input100 {
        width: 100%;
      }
  
    }
    
    
    /*------------------------------------------------------------------
    [ Alert validate ]*/
    
    .validate-input {
      position: relative;
    }
    
    .alert-validate .focus-input100 {
      box-shadow: 0 5px 20px 0px rgba(250, 66, 81, 0.1);
      -moz-box-shadow: 0 5px 20px 0px rgba(250, 66, 81, 0.1);
      -webkit-box-shadow: 0 5px 20px 0px rgba(250, 66, 81, 0.1);
      -o-box-shadow: 0 5px 20px 0px rgba(250, 66, 81, 0.1);
      -ms-box-shadow: 0 5px 20px 0px rgba(250, 66, 81, 0.1);
    }
    
    .alert-validate::before {
      content: "";
      display: -webkit-box;
      display: -webkit-flex;
      display: -moz-box;
      display: -ms-flexbox;
      display: flex;
      align-items: center;
      position: absolute;
      width: calc(100% + 2px);
      height: calc(100% + 2px);
      background-color: transparent;
      border: 1px solid #fa4251;
      border-radius: 2px;
      top: -1px;
      left: -1px;
      pointer-events: none;
    }
    
    .btn-hide-validate {
      font-family: Material-Design-Iconic-Font;
      font-size: 18px;
      color: #fa4251;
      cursor: pointer;
      display: -webkit-box;
      display: -webkit-flex;
      display: -moz-box;
      display: -ms-flexbox;
      display: flex;
      align-items: center;
      justify-content: center;
      position: absolute;
      height: 100%;
      top: 0px;
      right: -28px;
    }
    
    .rs1-alert-validate.alert-validate::before {
      background-color: #fff;
    }
    
    .true-validate::after {
      content: "\f26b";
      font-family: Material-Design-Iconic-Font;
      font-size: 18px;
      color: #00ad5f;
    
      display: -webkit-box;
      display: -webkit-flex;
      display: -moz-box;
      display: -ms-flexbox;
      display: flex;
      align-items: center;
      justify-content: center;
      position: absolute;
      height: 100%;
      top: 0px;
      right: -28px;
    }
    
    /*---------------------------------------------*/
    @media (max-width: 576px) {
      .btn-hide-validate {
        right: 10px;
      }
      .true-validate::after {
        right: 10px;
      }
    }
</style>
<body>
    <?php include('inc/header.php') ?>
    <br>
    <br><br><br>
	<div class="container-contact100">
		<div class="wrap-contact100">
    <?php
          if (isset($_SESSION['user'])) {
            $email=$_SESSION['user'];
            $sql ="SELECT * FROM users_info WHERE email=:email ";
            $query= $dbh -> prepare($sql);
            $query-> bindParam(':email', $email, PDO::PARAM_STR);
            $query-> execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            if($query->rowCount() > 0)
            { foreach($results as $result)
              ?>
			<form method="post" class="contact100-form validate-form" enctype="multipart/form-data">                
				<span class="contact100-form-title">
					Sell Product/Courses
				</span>
				<?php if($error){?><div class="errorWrap"><strong>ERROR </strong>:<?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div class="succWrap"><strong>SUCCESS </strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <br><br>
				<label class="label-input100" >Name of Seller: *</label>
				<div class="wrap-input100 validate-input">
					<input class="input100" type="text" name="name" readonly value="<?php echo htmlentities($result->name); ?>">
					<span class="focus-input100"></span>
				</div>
        <input type="hidden" name="sellerid" hidden value="<?php echo htmlentities($result->id); ?>">
				<label class="label-input100" >Contact Number: *</label>
				<div class="wrap-input100 validate-input">
					<input class="input100" type="number" name="cno" required placeholder="Your Contact Number" onKeyPress="if(this.value.length==10) return false;">
					<span class="focus-input100"></span>
				</div>
				<label class="label-input100" >Email: *</label>
				<div class="wrap-input100 validate-input">
					<input class="input100" type="email" name="email" readonly value="<?php echo htmlentities($result->email); ?>">
					<span class="focus-input100"></span>
				</div>
				<label class="label-input100" >Address: *</label>
				<div class="wrap-input100 validate-input">
					<textarea class="input100" name="address" required placeholder="Address..."></textarea>
					<span class="focus-input100"></span>
				</div>
                <label class="label-input100" >City: *</label>
				<div class="wrap-input100 validate-input">
					<input class="input100" type="text" name="state" required placeholder="Your City">
					<span class="focus-input100"></span>
				</div>
                <label class="label-input100" >State: *</label>
				<div class="wrap-input100 validate-input">
					<input class="input100" type="text" name="city" required placeholder="Your State">
					<span class="focus-input100"></span>
				</div>
				<label class="label-input100" >PINcode: </label>
				<div class="wrap-input100">
					<input class="input100" type="number" name="pincode" required placeholder="Eg. 000 000" onKeyPress="if(this.value.length==6) return false;">
					<span class="focus-input100"></span>
				</div>
                <label class="label-input100" >Product Name: *</label>
				<div class="wrap-input100 validate-input">
					<input class="input100" type="text" name="productname" required placeholder="Your Product Name">
					<span class="focus-input100"></span>
				</div>
                <label class="label-input100" >Selling Price: *</label>
				<div class="wrap-input100 validate-input">
					<input class="input100" type="number" name="sold" required placeholder="Product Selling Price">
					<span class="focus-input100"></span>
				</div>
                <label class="label-input100" >Description: *</label>
				<div class="wrap-input100 validate-input">
					<textarea class="input100" name="productdes" required placeholder="Description About this Product"></textarea>
					<span class="focus-input100"></span>
				</div>
                <label class="label-input100">Product Images: *</label>
				<div class="wrap-input100 validate-input">
          <p class="px-2">Image 1 :</p>
					<input class="px-2 pb-2" type="file" name="img1" required>
				</div>
				<div class="wrap-input100 validate-input">
          <p class="px-2">Image 2 :</p>
					<input class="px-2 pb-2" type="file" name="img2" required>
				</div>
				<div class="wrap-input100 validate-input">
          <p class="px-2">Image 3 :</p>
					<input class="px-2 pb-2" type="file" name="img3" required>
				</div>
				<div class="wrap-input100 validate-input">
          <p class="px-2">Image 4 :</p>
					<input class="px-2 pb-2" type="file" name="img4" required>
				</div>
				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" type="submit" name="ssubmit">Submit</button>
				</div>
            </form>
            <?php }
        } else { ?>
          <span class="contact100-form-title">You have Not Logged in please Login and then fill Sell form <br> <a href="login.php">Login</a></span>
        <?php }  ?>
		</div>
	</div>
    <?php include('inc/footer.php') ?>
</body>
</html>