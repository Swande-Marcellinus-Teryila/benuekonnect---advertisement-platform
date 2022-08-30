<?Php 
session_start();
require('includes/autoloader.php');
$error = '';
$msg ='';

try {
	if(isset($_POST['send_code'])){
		  $auth = new Auth();
		 
		  $email = $auth->isValidEmail($_POST['email']);
		  if($auth->exist('users','email',$email)){

$to = $email;
$code = rand(100000,999999);
$subject = "Benuekonnect account verification";

$message = "
<html>
<body>
<div style='background:#ff00ff; height: 50px;'>
	<center>
		<p >
			<a href='https://benuekonnect.com' style='color:gold; font-size: 26px; text-shadow: 5px 7px 37px blue;'><b>Benuekonnect</b></a>
		</p>
	</center>
	<p>&nbsp;</p>
	<p><h2  style='color:red; text-shadow:1px 2px 2px gray;'>Verification code:</h2><p>
		<p>
			<strong style='font-size: 28px;'>".$code."</strong></p>
			<p>&nbsp;</p>

<P><b><i>This code remains valid for 10 minutes.<br> Please do not disclose it to anyone</i></b></p>
<p><b>Visit Website:</b><a href='https//:benuekonnect.com'>benuekonnect.com</a></p>
</div>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From:<no-reply@benuekonnect.com>' . "\r\n";

if(mail($to,$subject,$message,$headers)){

	$_SESSION['otp_email'] =$email;
	$_SESSION['otp']=$code;
	$_SESSION['otp_time'] = time()+(60*10);
	header("location:verification.php");
}

		  }else{
		  	throw new Exception("Sorry, you have not created an account with us!");
		  	
		  }
	}
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
		<title>Recovery | Benuekonnect</title>
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
                	<img src="images/icons/forgot-password.jpg" class="forgot-password-icon" >
             </figure>
           </center>
            <div class="">
                <?php  include('includes/returnmsg.php');?>
               
                <form  method="post" action="">
                	<p class="text-blue">Enter your email address to Reset Your Password.</p>
               			<input type="email" name="email" placeholder="Email" class="fs" >
               			<button name="send_code" class="butt">Send Code</button>
             
                </form>
            </div>   
				</div>
			
				</div>
			</div>
	</section>
	<br><br>
<?php include('includes/footer.php'); ?>