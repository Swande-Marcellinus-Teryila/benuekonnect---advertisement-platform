<?Php
session_start();
$msg = '';
$error = '';
require_once('includes/autoloader.php');
$crud = new Crud();
$categories = $crud->displayAll('category');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>skills | Benuekonnect</title>
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
<?php include('includes/secondheader.php'); ?>
<br><br>
<?php include('includes/searchform.php'); ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 padding-right">
				<div class="col-sm-12 mobcat">
					<span class="btn btn-primary text-white-a">Latest skills</span>
					<?php include("includes/skills-adverts.php") ?>
					
							</div>
				</div>
			</div>
		</div>
	</div>
</section>
<p>
	<?php if($total_skills>$limit){?>
 	<center><a href="skills.php?getlm=<?=$limit?>#id<?=$idcounter?>"><img src="images/icons/see-more-ads.png" class="see-more-ads"></a></center>
 </p>
<?php }?>
 <br><br>
<section>
	<?php include('includes/warninginfo.php'); ?>
</section>



<?php include('includes/footer.php'); ?>