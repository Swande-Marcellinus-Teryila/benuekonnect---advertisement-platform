<?Php
if(isset($_GET['q'])){
	$query =ucfirst($_GET['q']);
$msg = '';
$error = '';
require_once('includes/autoloader.php');
$crud = new Crud();
include("includes/saveAd.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Search result for <?=$_GET['q']?></title>
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
	<div class="container">
		<div class="row">
			<div class="col-sm-12 padding-right">
				<div class="col-sm-12 mobcat">
					<span class="btn btn-primary category-title text-white-a">Search Result for<br> <?=$query?></span>
					<?php 
						try {
$latestProducts = $crud->displaySearchLeftSpicificWithOrder('products','product_name','user_approval_status',$query,'1','product_name','ASC');
							$location = "";
						foreach ($latestProducts as $lproduct) {
							try {
									$location =  $crud->displayField('users', 'town', 'id', $lproduct['postal_id']);
								} catch (Exception $e) {
									echo "No products have been uploaded yet, be the first to <a href='create-account.php' class='btn btn-primary'>Register </a> and upload your products for free";
								}
						?>					
	<div class="mob-adverts" id="id<?=$idcounter?>">
 								<span class="text-blue"><i class="fa fa-clock-o"></i> <?= $crud->get_time_ago($lproduct['date_uploaded']); ?>
 									<span class="location-icon"><?= $lproduct['location']; ?></span>
 								</span>
 								<table cellspacing="0" border="10px" class="category_table" width="100">
 									<tr>
 										<td rowspan="3" width="30%"><img src="images/product-details/<?= $lproduct['photo'] ?>" style="width:100%; height:105px;">
 										<td style="height: 25px"><?= substr($lproduct['product_name'],0,11); ?></td>
 										<td style="height: 25px" class="advert_td check-it-btn">
 											<a href="product-details.php?prod_id=<?= $lproduct['id'] ?>">
 												<img src="images/icons/check it out.png">
 											</a>
 										</td>
 									</tr>
 									<tr>
 										<td style="height: 25px">N<?= number_format($lproduct['selling_price']); ?></td>
 										<td style="height: 25px">
 											<a href="tel:<?= $crud->displayField('users', 'phone', 'id', $lproduct['postal_id']); ?>" style="color:blue">Contact <img src="images/icons/phone.png" class="img-circle" style="width:16px; height: 18px;"></a>
 										</td>
 									</tr>
 									<tr>
 										<td style="height: 25px"><?= $lproduct['product_state'] ?></td>
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
 						<?php }}catch(Exception $e) {
									
								} ?>









 							<?php 
						try {
$latestcats = $crud->displaySearchLeftWithOrder('service_categories','service_category',$query,'service_category','ASC');

							$location = "";
							$phone = "";

						foreach ($latestcats as $latestcat) {
							if($crud->exist('services','service_category_id',$latestcat['id'])){
								
							$latestservices = $crud->displayAllSpecific2('services','service_category_id','user_approval_status',$latestcat['id'],'1');
							//var_dump($latestservices);
							foreach($latestservices as $lservice){
								try {
							
								$photo =  $crud->displayField('users', 'photo', 'id', $lservice['postal_id']);
								$phone =  $crud->displayField('users', 'phone', 'id', $lservice['postal_id']);
							} catch (Exception $e) {
							
							}
								
							
					?>
							<div class="mob-adverts" id="id<?=$idcounter?>">
								<span class="text-blue"><i class="fa fa-clock-o"></i> <?=$crud->get_time_ago($lservice['date_uploaded']);?>
								<span class="location-icon"><?= $lservice['service_location']; ?></span>
							</span>
								<table cellspacing="0" border="10px" class="category_table" width="100">

									<tr>
										<td rowspan="5" width="30%"><img src="users/profile_picture/<?= $photo ?>" style="width:100%; height:105px;">
									
										
									</tr>
									<tr>
										<td style="height: 25px"><?=$crud->displayField('service_categories','service_category','id',$lservice['service_category_id']); ?></td>
										
									</tr>
									<tr>
										<td style="height: 25px" class="advert_td check-it-btn">
											<a href="Service-details.php?service_id=<?= $lservice['id'] ?>">
												<b>know More...</b>
											</a>
											</td>
									</tr>
									<tr>
										<td style="height: 25px">
											<a href="tel:<?=$phone?>" style="color:blue">Contact <img src="../images/icons/phone.png" class="img-circle" style="width:16px; height: 18px;"></a>
										</td>
										
									</tr>
									<tr>
												<td style="height: 25px" class="save-ad-btn">
 											<?php if(!isset($_SESSION['user'])){?>
 												<a href="save-ad.php?ad_id=<?=$lservice['id']?> && ad_type=services">
 												<img src="images/icons/save this ad.png">
 											</a>
 											<?Php }else{?>

 											<a href="#" onclick="saveAd('<?=$lservice['id']?>','services','<?php echo $_SESSION['user']; ?>');" >
 												<img src="images/icons/save this ad.png">
 											</a>
 										<?php }?>
</td>
										
									</tr>
									<tr><td colspan="2" style="height:25px">
										<strong class="stage_name"><?=$lservice['stage_name']?></strong></td></tr>	</table><br>
						<?php }
					}
				else{
					echo "";
				}
				}} catch (Exception $e) {
					
					} ?>




										<?php 
						try {
$latestcats = $crud->displaySearchLeftWithOrder('job_categories','job_category',$query,'job_category','ASC');

							$location = "";
							$phone = "";

						foreach ($latestcats as $latestcat) {
							if($crud->exist('job','job_cat_id',$latestcat['id'])){
								
							$latestjob = $crud->displayAllSpecific2('job','job_cat_id','user_approval_status',$latestcat['id'],'1');
							//var_dump($latestjob);
							foreach($latestjob as $ljob){
								try {
							
								$photo =  $crud->displayField('users', 'photo', 'id', $ljob['postal_id']);
								$phone =  $crud->displayField('users', 'phone', 'id', $ljob['postal_id']);
							} catch (Exception $e) {
							
							}
								
							
					?>
							<div class="mob-adverts" id="id<?=$idcounter?>">
								<span class="text-blue"><i class="fa fa-clock-o"></i> <?=$crud->get_time_ago($ljob['date_uploaded']);?>
								<span class="location-icon"><?= $ljob['location']; ?></span>
							</span>
								<table cellspacing="0" border="10px" class="category_table" width="100">

									<tr>
										<td rowspan="5" width="30%"><img src="users/profile_picture/<?= $photo ?>" style="width:100%; height:105px;">
									
										
									</tr>
									<tr>
										<td style="height: 25px"><?=$crud->displayField('job_categories','job_category','id',$ljob['job_cat_id']); ?></td>
										
									</tr>
									<tr>
										<td style="height: 25px" class="advert_td check-it-btn">
											<a href="job-details.php?job_id=<?= $ljob['id'] ?>">
												<b>know More...</b>
											</a>
											</td>
									</tr>
									<tr>
										<td style="height: 25px">
											<a href="tel:<?=$phone?>" style="color:blue">Contact <img src="../images/icons/phone.png" class="img-circle" style="width:16px; height: 18px;"></a>
										</td>
										
									</tr>
									<tr>
												<td style="height: 25px" class="save-ad-btn">
 											<?php if(!isset($_SESSION['user'])){?>
 												<a href="save-ad.php?ad_id=<?=$ljob['id']?> && ad_type=job">
 												<img src="images/icons/save this ad.png">
 											</a>
 											<?Php }else{?>

 											<a href="#" onclick="saveAd('<?=$ljob['id']?>','job','<?php echo $_SESSION['user']; ?>');" >
 												<img src="images/icons/save this ad.png">
 											</a>
 										<?php }?>
</td>
										
									</tr>
									<tr><td colspan="2" style="height:25px">
										<strong class="stage_name"><?=$ljob['stage_name']?></strong></td></tr>	</table><br>
						<?php }
					}
				else{
					echo "";
				}
				}} catch (Exception $e) {
					
					} ?>





					 													<?php 
						try {
$latestcats = $crud->displaySearchLeftWithOrder('vacancy_category','vacancy_category',$query,'vacancy_category','ASC');

							$location = "";
							$phone = "";

						foreach ($latestcats as $latestcat) {
							if($crud->exist('vacancy','vacancy',$latestcat['id'])){
								
							$latestvacancy = $crud->displayAllSpecific2('vacancy','vacancy','user_approval_status',$latestcat['id'],'1');
							//var_dump($latestvacancy);
							foreach($latestvacancy as $lvacancy){
								try {
							
								$photo =  $crud->displayField('users', 'photo', 'id', $lvacancy['user_id']);
								$phone =  $crud->displayField('users', 'phone', 'id', $lvacancy['user_id']);
							} catch (Exception $e) {
							
							}
								
							
					?>
							<div class="mob-adverts" id="id<?=$idcounter?>">
								<span class="text-blue"><i class="fa fa-clock-o"></i> <?=$crud->get_time_ago($lvacancy['date_uploaded']);?>
								<span class="location-icon"><?= $lvacancy['location']; ?></span>
							</span>
								<table cellspacing="0" border="10px" class="category_table" width="100">

									<tr>
										<td rowspan="5" width="30%"><img src="users/profile_picture/<?= $photo ?>" style="width:100%; height:105px;">
									
										
									</tr>
									<tr>
										<td style="height: 25px"><?=$crud->displayField('vacancy_category','vacancy_category','id',$lvacancy['vacancy']); ?></td>
										
									</tr>
									<tr>
										<td style="height: 25px" class="advert_td check-it-btn">
											<a href="vacancy-details.php?vacancy_id=<?= $lvacancy['id'] ?>">
												<b>know More...</b>
											</a>
											</td>
									</tr>
									<tr>
										<td style="height: 25px">
											<a href="tel:<?=$phone?>" style="color:blue">Contact <img src="../images/icons/phone.png" class="img-circle" style="width:16px; height: 18px;"></a>
										</td>
										
									</tr>
									<tr>
												<td style="height: 25px" class="save-ad-btn">
 											<?php if(!isset($_SESSION['user'])){?>
 												<a href="save-ad.php?ad_id=<?=$lvacancy['id']?> && ad_type=vacancy">
 												<img src="images/icons/save this ad.png">
 											</a>
 											<?Php }else{?>

 											<a href="#" onclick="saveAd('<?=$lvacancy['id']?>','vacancy','<?php echo $_SESSION['user']; ?>');" >
 												<img src="images/icons/save this ad.png">
 											</a>
 										<?php }?>
</td>
										
									</tr>
									<tr><td colspan="2" style="height:25px">
										<strong class="stage_name"><?=$lvacancy['stage_name']?></strong></td></tr>	</table><br>
						<?php }
					}
				else{
					echo "";
				}
				}} catch (Exception $e) {
					
					} ?>








					 													<?php 
						try {
$latestskill = $crud->displaySearchLeftWithOrder('skills','skill',$query,'skill','ASC');

							$location = "";
							$phone = "";

				
							foreach($latestskill as $lskill){
								try {
							
								$photo =  $crud->displayField('users', 'photo', 'id', $lskill['user_id']);
								$phone =  $crud->displayField('users', 'phone', 'id', $lskill['user_id']);
							} catch (Exception $e) {
							
							}
								
							
					?>
							<div class="mob-adverts" id="id<?=$idcounter?>">
								<span class="text-blue"><i class="fa fa-clock-o"></i> <?=$crud->get_time_ago($lskill['date']);?>
								<span class="location-icon"><?= $lskill['location']; ?></span>
							</span>
								<table cellspacing="0" border="10px" class="category_table" width="100">

									<tr>
										<td rowspan="5" width="30%"><img src="users/profile_picture/<?= $photo ?>" style="width:100%; height:105px;">
									
										
									</tr>
									<tr>
										<td style="height: 25px"><?=$lskill['location']; ?></td>
										
									</tr>
									<tr>
										<td style="height: 25px" class="advert_td check-it-btn">
											<a href="skill-details.php?skill_id=<?= $lskill['id'] ?>">
												<b>know More...</b>
											</a>
											</td>
									</tr>
									<tr>
										<td style="height: 25px">
											<a href="tel:<?=$phone?>" style="color:blue">Contact <img src="../images/icons/phone.png" class="img-circle" style="width:16px; height: 18px;"></a>
										</td>
										
									</tr>
									<tr>
												<td style="height: 25px" class="save-ad-btn">
 											<?php if(!isset($_SESSION['user'])){?>
 												<a href="save-ad.php?ad_id=<?=$lskill['id']?> && ad_type=skill">
 												<img src="images/icons/save this ad.png">
 											</a>
 											<?Php }else{?>

 											<a href="#" onclick="saveAd('<?=$lskill['id']?>','skill','<?php echo $_SESSION['user']; ?>');" >
 												<img src="images/icons/save this ad.png">
 											</a>
 										<?php }?>
</td>
										
									</tr>
									<tr><td colspan="2" style="height:25px">
										<strong class="stage_name"><?=$lskill['stage_name']?></strong></td></tr>	</table><br>
						<?php 
			
				}} catch (Exception $e) {
					
					} ?>



							</div>
				</div>
			</div>
		</div>
	</div>
</section>
 <br><br>
<?php include('includes/footer.php'); ?>
<?php }else{
	header("location:index.php");
} ?>