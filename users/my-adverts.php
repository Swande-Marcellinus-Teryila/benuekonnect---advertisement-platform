<?php session_start();
         include('../includes/autoloader.php');
    
        $auth = new Auth();
        $auth->checkLogin('user');
        $result = $auth->userInfo('id',$_SESSION['user']);
        foreach($result as $user) { 

         try{$referals = $auth->displayAllSpecificWithOrder('referrals','referral_id',$user['id'],'date_clicked','DESC');}catch(Exception $e){

         }
       
        $total_products =  $auth->getTotalSpicific('products','postal_id',$user['id']);
		$total_referrals = $auth->getTotalSpicific('referrals','referral_code',
						$user['referral_code']);
		$total_services =  $auth->getTotalSpicific('service_categories','user_id',$user['id']);
        
    
        ?>
     
        
        <!DOCTYPE html>
       <html lang="en">

       <head>
              <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <meta name="description" content="">
              <meta name="author" content="">
              <title>customer dashboard | Benuekonnect</title>
              <link rel="shortcut icon" href="../images/icons/bk.png" type="image/png">
              <link href="../css/bootstrap.min.css" rel="stylesheet">
              <link href="../css/font-awesome.min.css" rel="stylesheet">
              <link href="../css/prettyPhoto.css" rel="stylesheet">
              <link href="../css/price-range.css" rel="stylesheet">
              <link href="../css/animate.css" rel="stylesheet">
              <link href="../css/main.css" rel="stylesheet">
              <link href="../css/responsive.css" rel="stylesheet">
              <link href="../css/custom.css" rel="stylesheet">
              <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
              <link rel="shortcut icon" href="images/ico/favicon.ico">
              <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
              <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
              <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
              <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
       </head>
       <!--/head-->
<?php include('includes/header.php') ?>
    
	<section>
		<div class="container">
			<div class="row">
				<?php include_once('includes/leftbar.php');?>
				<div class="category-tab shop-details-tab"><!--category-tab-->
				<?Php include_once('includes/user-tabs.php');?>
						<div class="tab-content">
							
							<div class="tab-pane fade  active in" id="products_table" >
								<div class="col-sm-12">
									<div style="overflow: auto;">
									   <div id="showMessage"></div>
				                    <table class="table table-hover table-bordered">
				                        <thead>
				                            <tr>
				                           
				                                <th>S/N</th>
				                                <th>Category</th>
				                                <th>Product Name</th>
				                                <th>Price</th>
				                                <th>Photo</th>
				                                <th>date</th>
				                                <th>Status</th>
				                                <th>Action</th>
				                            </tr>
				                        </thead>
				                        <tbody>
				                           
				                            <tr>
				                            	<?php  try{ $products = $auth->displayAllSpecificWithOrder('products','postal_id',$user['id'],'date_uploaded','DESC');?>
				                                 <?php $i=0; foreach($products as $data){ $i=$i+1; ?>
				                                <td> &nbsp; &nbsp;<?php echo $i ?></td>
				                                <td><?php try{$sub = $auth->displayField('category','category','id',$data['category_id']);
				                                echo $sub;}Catch(Exception  $e){
				                                    
				                                }?>
				                                    
				                                </td>
				                               
				                                <td><?=$data['product_name']?></td>
				                                 
				                                <td>&#x20A6; <?= number_format($data['selling_price'])?></td>
				                                <td><img src="../images/product-details/<?=$data['photo']?>" class="img-circle" style="width:75px;height:80px;"></td>
				                                <td><?= $auth->get_time_ago($data['date_uploaded']); ?></td>
				                                <td><?php if($data['status']=='0'){
				                                    echo'<i class="text text-danger">pending</i>';
				                                }else{ echo'<i class="text text-success">approved</i>';
				                                        }?>
				                                    
				                                </td>
				                                <td> 
				                                   


				<a href="#" onclick="edit(<?Php echo htmlentities($data['id'])?>)"><i class="fa fa-edit btn btn-primary" title="Edit Record">Edit </i>  </a>



				&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
				<button  onclick="deleteRecord(<?Php echo htmlentities($data['id'])?>)" class="btn btn-danger"><i class="fa fa-trash" title="Delete data"> </i>Delete </button>
				                                </td>

				                               
				                            </tr>
				                            
				                            <?php }}catch(Exception $e){
				                            	echo '<P class="usernotify">Hi '.$user['full_name'].' you have not uploaded products yet!</p>';
				                            }?>
				                        </tbody>
				                    </table>
				                </div>
								</div>
							</div>
							
							<div class="tab-pane fade" id="referral_tab" >
								<?Php 
								try{
								 $referrals = $auth->displayAllSpecificWithOrder('referrals','referral_code',$user['referral_code'],'date_clicked','DESC');
								
							
								foreach($referrals as $ref){ 
									
										$refusers = $auth->displayAllSpecific('users','id', $ref['referral_id']);
										foreach ($refusers as $refuser) {
										
										?>
										<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo">
												
												<img class="img-circle" src="profile_picture/<?=$refuser['photo'] ?>"  alt="" style="height: 100px; width:95px" />
												
												<div class="text text-warning "><br> <?=$refuser['full_name']?><br>
												 <i class="fa fa-clock-o"></i>
												  <?=$auth->get_time_ago($ref['date_clicked']);?></i>
												<!--button type="button" class="btn btn-default add-to-cart"><i class="fa fa-user"></i>view profile</button-->
												</div>
											</div>
										</div>
									</div>
								</div><?php
								}
								} 
								}catch(Exception $e){

								}
									
							 ?>
							</div>
						</div>
					</div><!--/category-tab-->
				</div>
			</div>
		</div>
	</section>
	<?php include('includes/footer.php'); ?>
	<script src="../js/custom/userdashboardindex.js"></script>
		<?php } ?>

	
	