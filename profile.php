<?php 
session_start();
include('config.php'); 
error_reporting(0);

if(isset($_POST['ssubmit']) && !empty($_POST) )
{
$name=$_POST['name'];
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

$sql="INSERT INTO products(name,productname,sold,image1,image2,image3,image4,address,city,state,pincode,productdes) VALUES(:name,:productname,:sold,:image1,:image2,:image3,:image4,:address,:city,:state,:pincode,:productdes)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
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
{
$msg=" Sell Product/Courses Submitted successfully";
}
else
{
$error=" Something went wrong. Please try again";
}
header( "refresh:3;url=product.php" );
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include('inc/header_links.php') ?>
<style>
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
    	font-size: 16px;
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
      padding: 0px 0px 50px 0px;
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
    <?php if (isset($_SESSION['user'])) { ?>
			  <div class="container mt-5">    
    <div class="row d-flex justify-content-center">
        <?php
          $email=$_SESSION['user'];
          $sql ="SELECT * FROM users_info WHERE email=:email ";
          $query= $dbh -> prepare($sql);
          $query-> bindParam(':email', $email, PDO::PARAM_STR);
          $query-> execute();
          $results=$query->fetchAll(PDO::FETCH_OBJ);
          if($query->rowCount() > 0)
          { foreach($results as $result)
            ?>
        <div class="col-md-7">            
            <div class="card p-3 py-4">                
                <div class="text-center">
                    <img src="img/Img.png" width="100" class="rounded-circle">
                </div>                
                <div class="text-center mt-3">
                    <span>Your Contributions are</span></br></br>
                    <span class="bg-secondary p-2 px-4 rounded text-white"><img src="img/coin.png" width="20px">&nbsp;&nbsp;&nbsp;<?php echo htmlentities($result->contributions); ?></span></br></br>
                    <h5 class="mt-2 mb-0"><?php echo htmlentities($result->name); ?></h5>                
                    <div class="px-4 mt-1">
                        <p class="fonts">Your Contact Number : <?php echo htmlentities($result->mobile); ?></p>
                        <p class="fonts">Your Email Id : <?php echo htmlentities($result->email); ?></p>
                        <p class="fonts">Last Login Time : <?php echo htmlentities($result->last_login_time	); ?></p>                    
                    </div></br>
                    <button class="btn btn-outline-primary px-4" onclick="location.href = 'index.php';" >Back To Home</button>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
            <?php
        } else { ?>
          <span class="contact100-form-title">You have Not Logged in please Login and then fill Sell form <br> <a href="login.php">Login</a></span>
        <?php }  ?>
		</div>
	</div>
    <?php include('inc/footer.php') ?>
</body>
</html>