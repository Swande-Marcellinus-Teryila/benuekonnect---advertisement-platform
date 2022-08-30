<?Php
$service_id = '';
require_once('includes/autoloader.php'); 
$crud = new Crud();
try{
$categories = $crud->displayAll('category');
if(isset($_GET['service_id'])){
	$service_id =$_GET['service_id'];
  	$services = $crud->displayAllSpecific2('services','id','status',$service_id,'0');

  
  foreach($services as $service){

  		$users = $crud->displayAllSpecific2('users','id','status',$service['postal_id'],'0');

  		foreach ($users as $user) {

 ?>
<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Service details| Benuekonnect</title>
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
				<div class="col-sm-3">
					<div class="left-sidebar">
					
					<div class="brands_products"><!--brands_products-->
							<h2>Service</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<?Php try{ $services_categories = $crud->displayAllSpecific('service_categories','status','1');
          if(is_array($services)){
          foreach ($services_categories as $service_cat) {?>
									<li><a href="#"> <span class="pull-right">..</span><?=$service_cat['service_category']?></a></li>
											<?php }}}catch(Exception $e){

											} ?>
								</ul>
							</div>
						</div><!--/brands_products-->

						<div class="page-header"><!--warning-->
							<h2 class="text text-primary"><i class="fa fa-warning"></i> Warning</h2>						
				<ul class="list-group">
								<li class="list-group-item text-danger">1. Don not buy or sell Without receipt</li>
								<li class="list-group-item text-danger">2. Always meet in a public place to transact don't go 								to home or workplace to transact</li>
								<li class="list-group-item text-danger">3. Do not pay for anything until what you are buying is in your hands</li>
						</ul>
						
						</div><!--/warning-->
						
						
					</div>
				</div>
			
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-6">
							<div class="view-product"> 
								<p style="color:orange; font-size: 20px"><span><i class="fa fa-money"></i> &#x20A6;<?= number_format($service['price']);?></span></p>
								<img src="images/services/<?=$service['photo']?>" alt="" />
								<h3><?=$service['service']?></h3>

							</div>
							
								
						

						</div>
						<div class="col-sm-6">
							<div class="product-information"><!--/product-information-->
								<img src="users/profile_picture/<?=$user['photo']?>" class=" img-circle" style="height:105px; width:100px;"  alt="" />
								<h2><b>Services provider:</b> <?=$user['full_name']; ?></h2>
								
									<p class="phone"><b><i class="fa fa-phone"></i> Phone No:</b> <?=$user['phone']?></p>
									<p><b><i class="fa fa-map-marker"></i> Location:</b> <?=$user['address']?></p>
								
								<span>
									<p></p>
									<span><i class="fa fa-money"></i> &#x20A6;<?= number_format($service['price']);?></span>
									<!--label>Quantity :</label>
									<input type="text" value="3" />
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button-->
							
									</span>
								
								<!--a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" ></a-->
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
				
					<div class="response-area" id="comments">

					</div><!--/Repaly Box-->
					<!--/Response-area-->
					<div class="replay-box">
						<form>
						<div class="row">
							<h2>leave a message</h2>
							<div class="col-sm-4">
								<div id="show" class="text text-danger text-lg"></div>
								
									<div class="blank-arrow">
										<label>Your Name</label>
									</div>
									<span>*</span>
									<input type="text" placeholder="write your name..." required="required" name="fullname" id="fullname">
									<input type="hidden" id="service_id" value="<?=$service_id?>">
									<div class="blank-arrow">
										<label>Email Address</label>
									</div>
									<span>*</span>
									<input type="email" placeholder="your email address..." name="email" id="email">
							
							</div>
							<div class="col-sm-8">
								<div class="blank-arrow">
										<label>Message</label></div>
									<textarea rows="4" id="comment" class="required"></textarea>

								</form>
								<a class="btn btn-primary" onclick="sendComment()"><i class="fa fa-save"></i> send</a>
							</div>
						
				</div>
			</div>
		</div>
	</section>
<?php }} ?>
	<?php include('includes/footer.php');?>

	<script>
		setInterval(function(){
		let service_id = "<?php echo $service_id; ?>";
				$.post('includes/requests/service-comments.php',{
						id:service_id
					
			},
				function(data, status){
					$("#comments").html(data);
			})},500);
			
	</script>
	<script src="js/custom/service-details.js"></script>
	<?Php }}catch(Exception $e){}?>
