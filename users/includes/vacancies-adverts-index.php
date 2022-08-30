	<?php 

					 try { $limit = 25;
					 		$idcounter=0;
					 $total_vacancies = $auth->getTotal('vacancy');
							if (isset($_GET['getlm'])) {
								$limit=$_GET['getlm'];
								if($total_vacancies-$limit>25){
									$limit+=25;
								}else{
									$limit+=$total_vacancies%$limit;
								}
							}
						$latestVacancys = $auth->displayAllSpecificWithOrderWithLimit('vacancy', 'status', '1', 'date_uploaded', 'DESC', $limit);
						$Vacancy = "";
						$photo="";
						foreach ($latestVacancys as $lvacancy) {
							try {
							
								$photo =  $auth->displayField('users', 'photo', 'id', $lvacancy['user_id']);
							} catch (Exception $e) {
							
							}
								try {
							$Vacancy = $auth->displayField('vacancy_category', 'vacancy_category', 'id', $lvacancy['vacancy']); 
								
							} catch (Exception $e) {
							
							}
					?>
							<div class="mob-adverts" id="id<?=$idcounter?>">
								<span class="text-blue"><i class="fa fa-clock-o"></i> <?=$auth->get_time_ago($lvacancy['date_uploaded']);?>
								<span class="location-icon"><?= $lvacancy['location']; ?></span>
							</span>
								<table cellspacing="0" border="10px" class="category_table" width="100">

									<tr>
										<td rowspan="5" width="30%"><img src="profile_picture/<?= $photo ?>" id="big_td_img">
									
										
									</tr>
									<tr>
										<td><?=$Vacancy?></td>
										
									</tr>
									<tr>
										<td class="advert_td check-it-btn">
											<a href="../vacancy-details.php?vacancy_id=<?= $lvacancy['id'] ?>">
												<b>know More...</b>
											</a>
											</td>
										
									</tr>
									<tr>
										<td>
											<a href="tel:<?=$auth->displayField('users','phone','id',$lvacancy['user_id']);?>" style="color:blue">Contact <img src="../images/icons/phone.png" class="img-circle" style="width:16px; height: 18px;"></a>
										</td>
										
									</tr><tr>
									<td class="save-ad-btn">
 											<?php if(!isset($_SESSION['user'])){?>
 												<a href="save-ad.php?ad_id=<?=$lvacancy['id']?> && ad_type=vacancy">
 												<img src="../images/icons/save this ad.png">
 											</a>
 											<?Php }else{?>

 											<a href="#" onclick="saveAd('<?=$lvacancy['id']?>','vacancy','<?php echo $_SESSION['user']; ?>');" >
 												<img src="../images/icons/save this ad.png">
 											</a>
 										<?php }?>
</td>
										
									</tr>
									<tr><td colspan="2" style="height:25px">
										<strong class="stage_name"><?=$lvacancy['stage_name']?></strong></td></tr>	</table><br>

								</table><br>
						<?php }
					} catch (Exception $e) {
						echo "<br><br>Vacancies are currently not availiable";
					} ?>