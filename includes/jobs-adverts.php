<?php 

					 try { $limit = 50;
					 		$idcounter=0;
					 $total_jobs = $crud->getTotal('job');
							if (isset($_GET['getlm'])) {
								$limit=$_GET['getlm'];
								if($total_jobs-$limit>50){
									$limit+=50;
								}else{
									$limit+=$total_jobs%$limit;
								}
							}
						$latestjobs = $crud->displayAllSpecificWithOrderWithLimit('job', 'status', '1', 'date_uploaded', 'DESC', $limit);
						$job = "";
						$photo="";
						foreach ($latestjobs as $ljob) {
							try {
							
								$photo =  $crud->displayField('users', 'photo', 'id', $ljob['postal_id']);
							} catch (Exception $e) {
							echo "";
							}
								try {
							$job = $crud->displayField('job_categories', 'job_category', 'id', $ljob['job_cat_id']); 
								
							} catch (Exception $e) {
							echo "";
							}
					?>
							<div class="mob-adverts" id="id<?=$idcounter?>">
								<span class="text-blue"><i class="fa fa-clock-o"></i> <?=$crud->get_time_ago($ljob['date_uploaded']);?>
								<span class="location-icon"><?= $ljob['location']; ?></span>
							</span>
								<table cellspacing="0" border="10px" class="category_table" width="100">

									<tr>
										<td rowspan="5" width="30%"><img src="users/profile_picture/<?= $photo ?>" id="big_td_img2">
									
										
									</tr>
									<tr>
										<td ><?=$job?></td>
										
									</tr>
									<tr>
										<td  class="advert_td check-it-btn">
											<a href="job-details.php?job_id=<?= $ljob['id'] ?>">
												<b>know More...</b>
											</a>
											</td>
										
									</tr>
									<tr>
										<td>
											<a href="tel:<?=$crud->displayField('users','phone','id',$ljob['postal_id']);?>" style="color:blue">Contact <img src="images/icons/phone.png" class="img-circle" style="width:16px; height: 18px;"></a>
										</td>
										
									</tr><tr>
									<td class="save-ad-btn">
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

								</table><br>
						<?php }
					} catch (Exception $e) {
						echo '<br><p class="text-blue">No job avaliable</p>';
					} ?>