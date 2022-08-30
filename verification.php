<?Php 
session_start();
$error = '';
$msg ='';
if(isset($_SESSION['otp'])){
require('includes/autoloader.php');
$auth = new Auth();


try {
	if(isset($_POST['resetpswd'])){
	if(($_SESSION['otp_time']-time())<=0){
		session_unset();
		session_destroy();
	}
	if(session_status()!==PHP_SESSION_ACTIVE){
		throw new Exception("Invalid Code");
	}else{
		if($_SESSION['otp']!=$_POST['otp']){
			throw new Exception("Invalid Code");
			
		}
	 		if($_POST['password']!==$_POST['confirmed_pswd']){
	 			throw new Exception("Password did not match, Please confirm password!");
	 			
	 		}

	$auth->updateSingleSpecific('users','password','email',$_SESSION['otp_email'],password_hash($_POST['confirmed_pswd'], PASSWORD_DEFAULT));
             $msg = "Password updated successfully";
  $auth->validateLogin($_POST);
		}
	}
}
 catch (Exception $e) {
  $error = $e->getMessage();
}
  
 ?>
<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>account verification | Benuekonnect</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/prettyPhoto.css" rel="stylesheet">
		<link href="css/price-range.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
		<link href="css/custom.css" rel="stylesheet">
		<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
		<link rel="shortcut icon" href="images/ico/favicon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	</head>
	<!--/head-->
<?php include('includes/header.php') ?>
	<section style="margin-top:20px; margin-bottom: 20px;"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-md-1 "> &nbsp;</div>
				<div class="col-md-9">
					<center>
						 <figure>
                	<img src="images/icons/verify-password.jpg" class="forgot-password-icon" >
             </figure>
           </center>
            <div class="">
            	<div class="alert alert-success">A verification code has been sent to your email</div>
                <?php  include('includes/returnmsg.php');?>
               
                <form  method="post" action="">
               			<input type="number" name="otp"  class="fs" placeholder="Enter Verificatiion code" >
               			<input type="hidden" name="email" value="<?=$_SESSION['otp_email']?>">
                 			<input type="password" name="password" class="fs" placeholder="New Password" >
               				<input type="password" name="confirmed_pswd"  class="fs" placeholder="Confirm Password" >
               			<button name="resetpswd" class="btn btn-primary">RESET PASSWORD</button>
             
                </form>
            </div>   
				</div>
			
				</div>
			</div>
	</section>
	<br><br>
<?php include('includes/footer.php'); 
}?>