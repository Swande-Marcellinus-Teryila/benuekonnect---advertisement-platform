<?Php

$msg = '';
$error = '';


if (isset($_GET['cat_id'])) {
	try {
	
	$cat_id = $_GET['cat_id'];
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
		<title>product category| Benuekonnect</title>
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
	<center><span class="category-title"><?= $_GET['cat_name'] ?></span></center>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 padding-right">

					<div class="mob-adverts" id="id<?= $category['category_id'] ?>"><br>				
						<?php try {
							$products = $crud->displayAllSpecificWithOrder('products', 'category_id', $cat_id, 'date_uploaded', 'DESC');
							foreach ($products as $product) {
								$location = "";
								try {
									$location =  $crud->displayField('users', 'town', 'id', $product['postal_id']);
								} catch (Exception $e) {
									echo "no products have been uploaded yet, be the first to <a href='create-account.php' class='btn btn-primary'>Register </a> and upload your products for free";
								}?>
							<div class="mob-adverts" id="id<?= $category['id'] ?>">
								<span class="text-blue"><i class="fa fa-clock-o"></i> <?=$crud->get_time_ago($product['date_uploaded']);?>
								<span class="location-icon"><?= $location; ?></span>
							</span>
								<table cellspacing="0" border="10px" class="category_table" width="100">

									<tr>
										<td rowspan="3" width="30%"><img src="images/product-details/<?= $product['photo'] ?>" id="big_td_img">
										<td><?=  substr($product['product_name'],0,11); ?></td>
										<td class="advert_td check-it-btn">
											<a href="product-details.php?prod_id=<?= $product['id'] ?>">
												<img src="images/icons/check it out.png">
											</a>
										</td>
									</tr>
									<tr>
										<td>N<?= number_format($product['selling_price']); ?></td>
										<td style="height: 25px">
											<a href="tel:<?=$crud->displayField('users','phone','id',$product['postal_id']);?>" style="color:blue">Contact <img src="images/icons/phone.png" class="img-circle" style="width:16px; height: 18px;"></a>
										</td>
									</tr>
									<tr>
										<td><?=$product['product_state']?></td>
											<td style="height: 25px" class="save-ad-btn">
 											<?php if(!isset($_SESSION['user'])){?>
 												<a href="save-ad.php?ad_id=<?=$lproduct['id']?> && ad_type=products">
 												<img src="images/icons/save this ad.png">
 											</a>
 											<?Php }else{?>

 											<a href="#" onclick="saveAd('<?=$lproduct['id']?>','products','<?php echo $_SESSION['user']; ?>');" >
 												<img src="images/icons/save this ad.png">
 											</a>
 										<?php }?>
</td>
 		
									</tr>

								</table><br>
						<?php }
					} catch (Exception $e) {
						echo '<P class="text-black">Sorry, products have not been uploaded for this category</p>';
					} ?>

	</section>

<?php include('includes/footer.php');
}catch(Exception $e){
	echo"";
}

} else {
	header("location:index.php");
}
 ?>