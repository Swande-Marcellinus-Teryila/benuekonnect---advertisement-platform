	<?php try {
						 $limit = 25;
					 		$idcounter=0;
					 $total_services = $crud->getTotal('services');
							if (isset($_GET['getlm'])) {
								$limit=$_GET['getlm'];
								if($total_services-$limit>25){
									$limit+=25;
								}else{
									$limit+=$total_services%$limit;
								}
							}
						$latestservices = $crud->displayAllSpecificWithOrderWithLimit('services', 'status', '1', 'date_uploaded', 'DESC',$limit);
						
						$service = "";
						$photo="";
						foreach ($latestservices as $lservice) {
							try {
							
								$photo =  $crud->displayField('users', 'photo', 'id', $lservice['postal_id']);
							} catch (Exception $e) {
							
							}
								try {
							$service = $crud->displayField('service_categories', 'service_category', 'id', $lservice['service_category_id']); 
								
							} catch (Exception $e) {
							
							}
					?>
							<div class="mob-adverts" id="id<?=$idcounter?>">
								<span class="text-blue"><i class="fa fa-clock-o"></i><?=$crud->get_time_ago($lservice['date_uploaded']);?>
								<span class="location-icon"><?= $lservice['service_location']; ?></span>
							</span>
								<table cellspacing="0" border="10px" class="category_table" width="100">

									<tr>
										<td rowspan="5" width="30%"><img src="users/profile_picture/<?= $photo ?>" id="big_td_img2">
									
										
									</tr>
									<tr>
										<td><?=$service?></td>
										
									</tr>
									<tr>
										<td  class="advert_td check-it-btn">
											<a href="Service-details.php?service_id=<?= $lservice['id'] ?>">
												<b>know More...</b>
											</a>
											</td>
									</tr>
									<tr>
										<td>
											<a href="tel:<?=$crud->displayField('users','phone','id',$lservice['postal_id']);?>" style="color:blue">Contact <img src="images/icons/phone.png" class="img-circle" style="width:16px; height: 18px;"></a>
										</td>
										
									</tr><tr>
												<td class="save-ad-btn">
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
					} catch (Exception $e) {
						echo '<br><p class="text-blue">No services avaliable</p>';
					} ?>