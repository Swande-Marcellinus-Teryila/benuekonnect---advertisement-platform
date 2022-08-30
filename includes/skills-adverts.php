<?php try {
						 $limit = 50;
					 		$idcounter=0;
					 $total_skills= $crud->getTotal('skills');
							if (isset($_GET['getlm'])) {
								$limit=$_GET['getlm'];
								if($total_products-$limit>50){
									$limit+=50;
								}else{
									$limit+=$total_products%$limit;
								}
							}
						$latestskills = $crud->displayAllSpecificWithOrderWithLimit('skills', 'status', '1', 'date', 'DESC',$limit);
						
						$skill = "";
						$photo="";
						foreach ($latestskills as $lskill) {
							try {
							
								$photo =  $crud->displayField('users', 'photo', 'id', $lskill['user_id']);
							} catch (Exception $e) {
							
							}
								
					?>
							<div class="mob-adverts" id="id<?=$idcounter?>">
								<span class="text-blue"><i class="fa fa-clock-o"></i> <?=$crud->get_time_ago($lskill['date']);?>
								<span class="location-icon"><?= $lskill['location']; ?></span>
							</span>
								<table cellspacing="0" border="10px" class="category_table" width="100">

									<tr>
										<td rowspan="5" width="30%"><img src="users/profile_picture/<?= $photo ?>" id="big_td_img2">
									
										
									</tr>
									<tr>
										<td><?=$lskill['skill']?></td>
										
									</tr>
									<tr>
										<td class="advert_td check-it-btn">
											<a href="skill-details.php?skill_id=<?= $lskill['id'] ?>">
												<b>know More...</b>
											</a>
											</td>
										
									</tr>

										<tr>
										<td>
											<a href="tel:<?=$crud->displayField('users','phone','id',$lskill['user_id']);?>" style="color:blue">Contact <img src="images/icons/phone.png" class="img-circle" style="width:16px; height: 18px;"></a>
										</td>
										
									</tr>
									<tr>
												<td  class="save-ad-btn">
 											<?php if(!isset($_SESSION['user'])){?>
 												<a href="save-ad.php?ad_id=<?=$lskill['id']?> && ad_type=skills">
 												<img src="images/icons/save this ad.png">
 											</a>
 											<?Php }else{?>

 											<a href="#" onclick="saveAd('<?=$lskill['id']?>','skills','<?php echo $_SESSION['user']; ?>');" >
 												<img src="images/icons/save this ad.png">
 											</a>
 										<?php }?>
</td>
										
									</tr>
									<tr><td colspan="2" >
										<strong class="stage_name"><?=$lskill['stage_name']?></strong></td></tr>	</table><br>
						<?php }
					} catch (Exception $e) {
						echo '<br><p class="text-blue">No skill avaliable</p>';
					} ?>