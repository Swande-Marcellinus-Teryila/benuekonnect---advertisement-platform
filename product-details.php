 <?Php
	$prod_id = '';
	$user = '';
	$products = array();
	require_once('includes/autoloader.php');
	$crud = new Crud();
	try {
		$categories = $crud->displayAll('category');
		if (isset($_GET['prod_id'])) {
			$prod_id = $_GET['prod_id'];
			$products = $crud->displayAllSpecific('products', 'id', $prod_id);
		}
		foreach ($products as $product) {
			$users = $crud->displayAllSpecific2('users', 'id', 'status', $product['postal_id'], '1');


			foreach ($users as $user) {
				/* when its the owner replying */
				if(isset($_GET['user_id'])){

try{ 
	$crud->updateSingleSpecific2('comments','mark_as_read','user_id','product_id',$user['id'],$prod_id,'1');
				}
					catch(Exception $e){
						
					};
				}



	?>

 			<!DOCTYPE html>
 			<html lang="en">

 			<head>
 				<meta charset="utf-8">
 				<meta name="viewport" content="width=device-width, initial-scale=1.0">
 				<meta name="description" content="">
 				<meta name="author" content="">
 				<title>Product details| Benuekonnect</title>
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
 				<center><span class="category-title">Details</span></center>
 				<br><div class="container">
 					<div class="row">
 						<div class="col-md-12">
	 								<figure>
 									
 										<img src="users/profile_picture/<?= $user['photo'] ?>" class="img-circle img-responsive" style="max-height:150px; max-width:150px;">
 										<b>Seller: </b><span style="font-size:23px; padding-left:20px;" class="username"><?= $user['full_name'] ?></span>
 								</figure>
 								</div>
 							</div>
 						</div>
 								<div class="container">
 									<div class="col-md- 4 product-info well">
 										<table border="0" style="width: 100%;" >
 											<tr>
 												<td>
 													<img src="images/product-details/<?= $product['photo'] ?>" style="width:80px; height:80px" alt=" ">
 												</td>
 												<td><img src="images/product-details/<?= $product['photo2'] ?>" alt=" " style="width:80px; height:80px"></td>
 												<td><img src="images/product-details/<?= $product['photo3'] ?>" style="width:80px; height:80px" alt="  "></td>
 											</tr>
 										</table>
 										
 										<p><?= ($product['product_name']); ?></p>
 										<p>N<?=number_format($product['selling_price'])?></p>
 										<br><br>
 										<p class="text-blue"><b>Location:</b> <?= $product['location'];?></p><br><br>
 										<p>
 												
 												<strong class="btn btn-primary"><b>Product description</b></strong>
 												<div class="col-md-12 alert alert-warning">

 												<p><b class="text-black"><?= ($product['description']); ?></b></P><br>
 											</div>
 								<p><a href="tel:<?= $user['phone'] ?>" class="text-blue"><img src="images/icons/phone.png" class="contact-icon"> <b>Contact:</b> <?= $user['phone'] ?></a></p><br>

 										<p>
 											<a href="#leavemsg" class="btn btn-primary"> Message Seller</a>
 										</p><br>


 										<p> <a href="mailto:<?= $user['email'] ?>" class="text-blue">
 											<img src="images/icons/blue_email.png" class="contact-icon"><b>Email: </b><?= $user['email'] ?></a>
 										</p><br>

 										
 										<p><b><i class="fa fa-map-marker"></i> Address: </b><?= $user['address'] ?>
 										</p>

 									</div>
 									<div class="col-md-4">
 										<?Php include("includes/notifications.php");?>
 										<?Php include("includes/warninginfo2.php");?>
 										<?php include("includes/share.php");?>
 							</div>
 						</div>
 					</div>
 				</div>
 			</section>
 			<section>
 				<div class="container">
 					<div class="row">
 						<div class="col-sm-2">&nbsp;</div>
 						<div class="col-md-8"  style="padding:8px">
 				<div class="response-area" id="comments" on>

 				</div>
 				<!--/Repaly Box-->
 				<!--/Response-area-->
 				<div class="replay-box">
 					<form>
 						<div class="row">
 						
 							<div class="col-sm-4">
 								

 								<div class="blank-arrow">
 									<label>Your Name</label>
 								</div>
 								<span id="leavemsg">*</span>
 								<input type="text" placeholder="write your name..." required="required" name="fullname" id="fullname" value="<?php if(isset($_GET['user_id'])){
 									echo $user['full_name'];
 								} ?>">
 								<input type="hidden" id="product_id" value="<?= $prod_id ?>">
 								<input type="hidden" id="user_id" value="<?=$user['id']; ?>">
 								<input type="hidden" id="user_chat_status" value="<?php if(isset($_GET['user_id'])){
 									echo $user['id'];
 								} ?>">
 								

 							</div>
 							<div class="col-sm-8">
 								<div class="blank-arrow">
 									<label>Message</label>
 								</div>
 								<textarea rows="4" id="comment" class="required"></textarea>

 					</form>
 					<a class="btn btn-primary" onclick="sendProductComment()"><i class="fa fa-save"></i> send</a>
 				</div>
 			</div>	
 		</div>


 			</section>
 			<?php include('includes/footer.php'); ?>
 <?php }
		}
	} catch (Exception $e) {
	} ?>
 <script>
 	setInterval(function() {
 		let prod_id = "<?php echo $prod_id; ?>";
 		$.post('includes/requests/comments.php', {
 				product_id: prod_id

 			},
 			function(data, status) {
 				$("#comments").html(data);
 			})
 	}, 500);
 </script>


 

 <script>
 	let status = 0;
 	$("#comment").keypress(function(){
let product_id = "<?php echo $prod_id; ?>";
let user_id = "<?php echo $user['id']; ?>";
 status=1;
 		
 		$.post('includes/requests/chat-typing-checker.php', {
 				status:status,
 				product_id:product_id,
 				user_id:user_id

 			},
 			function(data, status) {

 				$("#chatstatus").html(data);
 			});


 }); 
 </script>

  <script>
 	 status = 0;
 	$("#comment").mouseleave(function(){
 		
 		let product_id = "<?php echo $prod_id; ?>";
let user_id = "<?php echo $user['id']; ?>";
 status=0;
 		
 		$.post('includes/requests/chat-typing-checker.php', {
 				status:status,
 				product_id:product_id,
 				user_id:user_id

 			},
 			function(data, status) {

 				$("#chatstatus").html(data);
 			});


 }); 
 </script>

  




 <script src="js/custom/prod-details.js"></script>