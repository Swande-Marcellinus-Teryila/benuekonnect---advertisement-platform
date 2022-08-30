<?Php
$prod_id = '';
$products = array();
require_once('includes/autoloader.php'); 
$crud = new Crud();
try{
$categories = $crud->displayAll('category');
if(isset($_GET['prod_id'])){
	$prod_id =$_GET['prod_id'];
  	$products = $crud->displayAllSpecific2('products','id','status',$prod_id,'1');

  }
  foreach($products as $product){
  		$users = $crud->displayAllSpecific2('users','id','status',$product['postal_id'],'0');
  		

  		foreach ($users as $user) {
  			
  			

 ?>
<?php include('includes/header.php') ?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						
							<?php $ids=1; foreach ($categories as $cat) { ?>
								<?php if($cat['subcategory_status']=='1'){?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#id<?=$ids?>">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											<?= $cat['category'];?>
										</a>
									</h4>
								</div>
								<div id="id<?=$ids?>" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											 <?Php try{ $subcategories = $crud->displayAllSpecific2('subcategory','category_id','status',$cat['id'],'1');
          if(is_array($subcategories)){
          foreach ($subcategories as $sub) {?>
        
											<li><a href="products-subcategory.php?subcat_id"><?= $sub['subcategory']?></a></li>
											<?php }}}catch(Exception $e){

											} ?>
										</ul>
									</div>
								</div>
							</div> <?Php }else{?> 
							
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="products-category.php?cat_id=<?=$cat['id']?>"><?= $cat['category']?></a></h4>
								</div>
							</div>
							<?php } $ids+=1;} ?>
						</div><!--/category-products-->
					<div class="brands_products"><!--brands_products-->
							<h2>Service</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<?Php try{ $services = $crud->displayAllSpecific('service_categories','status','1');
          if(is_array($services)){
          foreach ($services as $service) {?>
									<li><a href="#"> <span class="pull-right">..</span><?=$service['service_category']?></a></li>
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
								<p style="color:orange; font-size: 20px"><span><i class="fa fa-money"></i> &#x20A6;<?= number_format($product['selling_price']);?></span></p>
								<img src="images/product-details/<?=$product['photo']?>" alt="" />
								<h3><?=$product['product_name']?></h3>

							</div>
							<?Php  try{ $similar_products = $crud->displayAllSpecific2('products','category_id','status',$product['category_id'],'1');
							if(count($similar_products)>1){?>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								<h3>You may also like</h3>
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
								    	<?php  $j=1;
								    		foreach($similar_products as $sprod) {
								    			if($sprod['id']==$prod_id)
								    				continue;
								    		if($j==1){
								    	?>
								    	<div class="item active"> 
										  <a href=""><img src="images/product-details/<?=$sprod['photo']?>"  style="width:100%; height: 170px;" alt="" ></a>
										 
										</div><?php } ?>
										 
										<div class="item">

										  <a href=""><img src="images/product-details/<?=$sprod['photo']?>"  style="width: auto; height: 170px;" alt="" ></a>
										</div> <?php $j+=1;} ?>	
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>
					

						</div>
						<div class="col-sm-6">
							<div class="product-information"><!--/product-information-->
								<h1>Product: <?=$sprod['product_name']?></h1>
								<p><b>Description:</b><?=$sprod['description'];?></p>
								<h2><b>Seller:</b> <?=$user['full_name']; ?></h2>

									
									<p class="phone"><b><i class="fa fa-phone"></i> Phone No:</b> <?=$user['phone']?></p>
									<p><b><i class="fa fa-map-marker"></i> Location:</b> <?=$user['address']?></p>
									<p><b><i class="fa fa-clock"></i> Posted:</b> <?=$crud->get_time_ago($sprod['date_uploaded']);?></p>
									<p><a class="btn btn-primary" href="#leavemsg">Message Seller</a></p>
								<span>
									<p></p>
									<span><i class="fa fa-money"></i> &#x20A6;<?= number_format($product['selling_price']);?></span>
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
					<?php }}catch(Exception $e){}?>
					<div class="response-area" id="comments">

					</div><!--/Repaly Box-->
					<!--/Response-area-->
					<div class="replay-box">
						<form>
						<div class="row">
							<h2 id="leavemsg" >leave a message</h2>
							<div class="col-sm-4">
								<div id="show" class="text text-danger text-lg"></div>
								
									<div class="blank-arrow">
										<label>Your Name</label>
									</div>
									<span>*</span>
									<input type="text" placeholder="write your name..." required="required" name="fullname" id="fullname">
									<input type="hidden" id="product_id" value="<?=$prod_id?>">
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
	<?php }}?>
	<?php include('includes/footer.php');?>
	<script>
		setInterval(function(){
		let prod_id = "<?php echo $prod_id; ?>";
				$.post('includes/requests/comments.php',{
						id:prod_id
					
			},
				function(data, status){
					$("#comments").html(data);
			})},500);
			
	</script>
	<script src="js/custom/prod-details.js"></script>
	<?php }catch(Exception $e){
		echo $e;
}?>
