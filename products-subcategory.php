<?Php 

$msg = '';
$error = '';
if(isset($_GET['subcat_id']))
{ $subcat_id =$_GET['subcat_id'];
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
		<title>product subcategory | Benuekonnect</title>
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
<?php include('includes/searchform.php'); ?>
	<section>
		<div class="container">
			<div class="row">
			<?php include_once('includes/leftbar.php'); ?>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Category</h2>
					<?php  try{ 
						$latestProducts = $crud->displayAllSpecificWithOrder('products','subcategory_id',$subcat_id,'date_uploaded','DESC'); 
					foreach ($latestProducts as $lproduct) {
					?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img  src="images/product-details/<?=$lproduct['photo']?>"  alt=""  style="width:auto; height:150px;" />
										<p><?=$lproduct['product_name']?></p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-money"></i><span>&#x20A6;<?= number_format($lproduct['selling_price']);?></span> <br>
                  <span style="color:gray;font-size:15px;"></span></a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2><span>&#x20A6;<?= number_format($lproduct['selling_price']);?></span> <br>
                  </h2>
											<p><?=$lproduct['product_name']?></p>
											<a href="product-details.php?prod_id=<?=$lproduct['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Buy</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
									<li> <span> <a href="#"><i class="fa fa-clock-o"></i><?=$crud->get_time_ago($lproduct['date_uploaded']); ?></a>
										<a href="product-details.php?prod_id=<?=$lproduct['id']?>"><i class="fa fa-shopping-cart"></i>Buy</a>
										<a href="#" style="color:lightseagreen;"><i class="fa fa-dot-circle-o" ></i>.sponsored.</a> </span></li>
									</ul>
								</div>
							</div>
						</div>
					<?php }}catch(Exception $e){
						echo 'products are not uploaded for this category yet';
					}?>
						
						</div>
					</div><!--features_items-->
				
			</div>
		</div>
	</section>

	
	<?php include('includes/footer.php'); ?>
	<?Php }else{
		echo 'sorry products not found for this category';
	}?>

	