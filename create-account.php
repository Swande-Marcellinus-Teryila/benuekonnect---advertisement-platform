<?php 
$error="";
$msg = "";
require_once('includes/autoloader.php');
                $crud = new Crud();
if($_SERVER['REQUEST_METHOD']=='POST'){
                
               try{
               	$crud->insertUser($_POST, $_FILES);
               	$msg="Registeration Successfull";
               }catch(Exception $e){
               	$error=$e->getMessage();                
               }
           }


               ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>create account | Benuekonnect</title>
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
<section>
	<div class="container" style="margin-bottom: 10px;">
		<div class="col-md-3">&nbsp;</div>
		<div class="col-md-6">
			 <center><span class="category-title">Create Account</span></center>
			<form><br>
				<h4><label>Please select account type</label><h4>
				<?php include("includes/returnmsg.php");?>
				<select id="usertype">
					<option>-Account Type-</option>
					<option value="individual">Individual</option>
					<option value="company">Company</option>
				</select>
			</form>
			<div>
				
			</div>
			<div class="col-md-3">&nbsp;</div>
		</div>
</section>

<section>
	<div class="container">
		<div id="individual">
			<div class="col-md-12 "><br>

				<div class="sform" style="width:100%">
					<p class="alert alert-danger"><i class="fa fa-user"></i> Personal Information.</p>
					<form id="individualform" method="post" action="" enctype="multipart/form-data" class="fs">
						<Input class="fs" type="hidden" name="account_type" value="1" class="fs">
						<Input class="fs" type="text" placeholder="Full Name*" required="required" name="fullname" class="fs" value="<?=$crud->showInput('fullname')?>">
						<label><i class="fa fa-calendar-o"></i> Date of Birth*</label>
						<Input class="fs" type="date" placeholder="date of birth*" required="required" name="dob" class="fs" value="<?=$crud->showInput('dob')?>">
						<label><i class="fa fa-user"></i>Sex*</label>
						<select name="sex" class="fs">
							<option>-Sex-</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
						<label><i class="fa fa-camera"></i> Photo*</label>
						<Input class="fs" type="file" name="photo" class="fs" required="required">
						<Input class="fs" type="text" placeholder="Phone*" required="required" name="phone" value="<?=$crud->showInput('phone')?>">
						<Input class="fs" type="email" placeholder="Email " name="email" value="<?=$crud->showInput('email')?>">
						<Input class="fs" type="hidden" name="status" value="0">
						<label>Address *</label>
						<textarea placeholder="Address" name="address" cols="16 ts" required="" value="<?=$crud->showInput('address')?>"></textarea>
						<label><i class="fa fa-map-marker"></i>Location*</label>
						<select class="fs" name="town" required="">
							<option value="...">Location</option>
							<option value="Ado">Ado</option>
							<option value="Agatu">Agatu</option>
							<option value="Apa">Apa</option>
							<option value="Buruku">Buruku</option>
							<option value="Gboko">Gboko</option>
							<option value="Guma">Guma</option>
							<option value="Gwer-East">Gwer-East</option>
							<option value="Gwer-West">Gwer-West</option>
							<option value="Katsina-Ala">Katsina-Ala</option>
							<option value="Konshisha">Konshisha</option>
							<option value="Kwande">Kwande</option>
							<option value="Logo">Logo</option>
							<option value="Makurdi">Makurdi</option>
							<option value="Obi">Obi</option>
							<option value="Ogbadibo">Ogbadibo</option>
							<option value="Ohimini">Ohimini</option>
							<option value="Oju">Oju</option>
							<option value="Okpokwu">Okpokwu</option>
							<option value="Otukpo">Otukpo</option>
							<option value="Tarka">Tarka</option>
							<option value="Ukum">Ukum</option>
							<option value="Ushongo">Ushongo</option>
							<option value="Vandeikya">Vandeikya</option>
						</select>
						<textarea placeholder="Business Description *" name="description" cols="16 ts"></textarea>
						<input class="fs" type="hidden" name="ref" value="
									<?php if (isset($_GET['ref'])) {
										echo $_GET['ref'];
									} ?>">

						<!--input type="password" placeholder="Confirm password"-->
						<label><i class="fa fa-key"></i></label>
						<Input class="fs" type="password" placeholder="Password *" name="password">
						<Input class="fs" type="password" placeholder="Confirm Password *" name="confirm_password">
						<p class="text-red"><input type="checkbox" name="agree"> By clicking Submit you agree  to our terms and conditions</p>
						

					</form>
					<button class="btn btn-primary" id="individualsubmitbtn">Submit</button>
				</div>

			</div>
		</div>

		<div id="company">
			<div class="col-md-12"><br>
				<div class="sform" style="width:100%">
					<p class="alert alert-danger"><i class="fa fa-user"></i> Company Information</p>
					<form id="companyform" method="post" enctype="multipart/form-data" action="" class="fs">
						<Input class="fs" type="hidden" name="account_type" value="2">
						<Input class="fs" type="text" placeholder="Company Name*" required="required" name="fullname"value="<?=$crud->showInput('fullname')?>">
						<label><i class="fa fa-camera"></i> Logo</label>
						<Input class="fs" type="file" name="photo" required="" placeholder="Logo">
						<Input class="fs" type="hidden" name="status" value="1">
						<label><i class="fa fa-phone"></i> Contact Info*</label>
						<Input class="fs" type="email" placeholder="Email*"  name="email" required="" value="<?=$crud->showInput('email')?>">
						<Input class="fs" type="text" placeholder="Phone *" required="required" name="phone"  value="<?=$crud->showInput('phone')?>">
						<textarea placeholder="Address*" name="address" cols="16 ts"  value="<?=$crud->showInput('address')?>"></textarea>
						<label> <i class="fa fa-map-marker"></i>  Location*</label>
						<select class="fs" name="town">
							<option value="...">Location</option>
							<option value="Ado">Ado</option>
							<option value="Agatu">Agatu</option>
							<option value="Apa">Apa</option>
							<option value="Buruku">Buruku</option>
							<option value="Gboko">Gboko</option>
							<option value="Guma">Guma</option>
							<option value="Gwer-East">Gwer-East</option>
							<option value="Gwer-West">Gwer-West</option>
							<option value="Katsina-Ala">Katsina-Ala</option>
							<option value="Konshisha">Konshisha</option>
							<option value="Kwande">Kwande</option>
							<option value="Logo">Logo</option>
							<option value="Makurdi">Makurdi</option>
							<option value="Obi">Obi</option>
							<option value="Ogbadibo">Ogbadibo</option>
							<option value="Ohimini">Ohimini</option>
							<option value="Oju">Oju</option>
							<option value="Okpokwu">Okpokwu</option>
							<option value="Otukpo">Otukpo</option>
							<option value="Tarka">Tarka</option>
							<option value="Ukum">Ukum</option>
							<option value="Ushongo">Ushongo</option>
							<option value="Vandeikya">Vandeikya</option>
						</select>

						<textarea placeholder="Business Description*" name="description" cols="16 ts" value="<?=$crud->showInput('description')?>"></textarea>
						<!--input type="password" placeholder="Confirm password"-->
						<label><i class="fa fa-key"></i></label>
						<input class="fs" type="hidden" name="ref" value="
									<?php if (isset($_GET['ref'])) {
										echo $_GET['ref'];
									} ?>">
						<Input class="fs" type="password" placeholder="Password*" name="password">
						<Input class="fs" type="password" placeholder="Confirm Password *" name="confirm_password">

						<p class="text-red"><input type="checkbox" name="agree"> By clicking Submit you agree  to our terms and conditions</p>
						
						<button class="btn btn-primary" id="companysubmitbtn">Submit</button>

					</form>
				</div>

			</div>
		</div>
</section><br><br>
<!--/#cart_items-->


<?php include("includes/footer.php"); ?>
<script src="js/custom/createaccountjs.js"></script>