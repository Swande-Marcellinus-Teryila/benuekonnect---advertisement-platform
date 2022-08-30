<?php $limit = 50;
					 		$idcounter=0;
						try { $total_products = $crud->getTotal('products');
							if (isset($_GET['getlm'])) {
								$limit=$_GET['getlm'];
								if($total_products-$limit>50){
									$limit+=50;
								}else{
									$limit+=$total_products%$limit;
								}
							}

							$latestProducts = $crud->displayAllSpecificWithOrderWithLimit2('products', 'status', 'user_approval_status', '1', '1', 'date_uploaded', 'DESC', $limit);
							
							foreach ($latestProducts as $lproduct) {
								$idcounter++;
							
						?>	
 							<div class="mob-adverts" id="id<?=$idcounter?>">
 								<span class="text-blue"><i class="fa fa-clock-o"></i> <?= $crud->get_time_ago($lproduct['date_uploaded']); ?>
 									<span class="location-icon"><?= $lproduct['location']; ?></span>
 								</span>
 								<table cellspacing="0" border="10px" class="category_table" width="100">
 									<tr>
 										<td rowspan="3" width="30%"><img src="images/product-details/<?= $lproduct['photo'] ?>" id="big_td_img"></td>
 										<td><?= substr($lproduct['product_name'],0,11); ?></td>
 										<td class="advert_td check-it-btn">
 											<a href="product-details.php?prod_id=<?= $lproduct['id'] ?>">
 												<img src="images/icons/check it out.png">
 											</a>
 										</td>
 									</tr>
 									<tr>
 										<td>N<?= number_format($lproduct['selling_price']); ?></td>
 										<td>
 											<a href="tel:<?= $crud->displayField('users', 'phone', 'id', $lproduct['postal_id']); ?>" style="color:blue">Contact <img src="images/icons/phone.png" class="img-circle" style="width:16px; height: 18px;"></a>
 										</td>
 									</tr>
 									<tr>
 										<td><?= $lproduct['product_state'] ?></td>
 										<td class="save-ad-btn">
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
 								</table>
 								<br>
 						<?php }}catch(Exception $e) {
									echo '<br><p class="text-blue">No product avaliable</p>';
								} ?>
