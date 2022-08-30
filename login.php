<?Php 
session_start();
require('includes/autoloader.php');
$error = '';
$msg ='';

try {
  $auth = new Auth();
  $auth->validateLogin($_POST);
  
} catch (Exception $e) {
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
		<title>Login | Benuekonnect</title>
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
						
            <div class="sform">
                <h4 class="ps">Login</h4>
                <?php  include('includes/returnmsg.php');?>
                <form  method="post" action="">

               			<input type="text" name="email" placeholder="Phone number or Email" class="fs" >
               			<input type="password" name="password" placeholder="Password" class="fs">

                    <button name="post_btn" class="butt">Login</button>
                    		<center><br><a href="recovery.php" class="text-blue">Forgot Your Password?</a></center>
                </form>
            </div>   
				</div>
				<div class="col-sm-2">
						<h2 style="font-size:20px; color:red">Don't have an account?</h2>
						<form>
							<button type="submit" class="btn btn-primary"><a href="create-account.php" class="text-white">Create 	New  Account</a></button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
	</section>
	<br><br>
<?php include('includes/footer.php'); ?>