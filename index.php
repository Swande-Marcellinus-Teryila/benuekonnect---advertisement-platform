
 <?Php

	session_start();
	$msg = '';
	$error = '';
	require_once('includes/autoloader.php');
	$crud = new Crud();
	$categories = $crud->displayAll('category');


	?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<meta name="description" content="">
 	<meta name="author" content="">
 	<title>Home | Benuekonnect</title>
    <link rel="shortcut icon" href="images/icons/bk.png" type="image/png">
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
 <p>
	 <center><a href="#"><img src="images/icons/buyandsellanything.png" class="buyandsellimg"></a></center></p>
 <?php include('includes/searchform.php'); ?>
 <br>
 <span class="text-blue">
 	<center>For People in Benue State Only</center>
 </span>
  <br>
 <section>
 	<div class="container">
 		<div class="row">
 			<div class="col-sm-12 padding-right">
 				<div class="col-sm-12 mobcat" id="id<?= $category['category_id'] ?>">
 					<p><center><a href="login.php"><img src="images/icons/place ads.png" class="place-ads-img"></a></center></p>
 					<span class="btn btn-primary text-white-a">ADVERTS</span><br>
 					<table cellspacing="0" border="10px" class="category_table">
 						<tr>
 							<?php $categories = $crud->displayAllSpecific('category','status','1');
								$checker = 1;
								foreach ($categories as $category) { ?>
 								<td id="main">
 									<center>
 										<span class="cat_name">
 											<a href="product-category.php?cat_id=<?= $category['id'] ?>&& cat_name=<?= $category['category'] ?>"><?= $category['category']; ?>&nbsp;</a></span>
 									</center>
 									<a href="product-category.php?cat_id=<?= $category['id'] ?>&& cat_name=<?= $category['category'] ?>">
 										<img src="images/icons/<?= $category['photo'] ?>" alt="">
 									</a>
 								</td>
 							<?php
									if ($checker == 3) {
										echo '</tr>';
										$checker = 0;
										echo '<tr>';
									}
									$checker += 1;
								} ?>
 						</tr>
 						<tr>
 							<td id="main">
 								<center>
 									<span class="cat_name">
 										<a href="services.php">Services</a></span>
 								</center>
 								<a href="services.php">
 									<img src="images/icons/service_cat_icon.png" alt="">
 								</a>
 							</td>
 							<td  id="main">
 								<center>
 									<span class="cat_name">
 										<a href="#">&nbsp;&nbsp;&nbsp;&nbsp;Vacancies&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
 								</center>
 								<a href="#">
 									<img src="images/icons/vacancy_cat_icon.png" alt="">
 								</a>
 							</td>
 							<td id="main">
 								<center>
 									<span class="cat_name">
 										<a href="jobs.php" ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jobs&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
 								</center>
 								<a href="jobs.php">
 									<img src="images/icons/jobs-cat-icon.jpg" alt="">
 								</a>
 							</td>

                   
 						</tr>
                  <tr>
                     <td id="main">
                        <center>
                           <span class="cat_name">
                              <a href="skills.php" ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Skills&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
                        </center>
                        <a href="skills.php">
                           <img src="images/icons/skills_cat_icon.png" alt="">
                        </a>
                     </td>
                  </tr>
 					</table>
 				</div>
 			</div>
 		</div>
 	</div><br>
 </section>
 <section>
 	<?php include('includes/warninginfo.php'); ?>
 	<p><br>
 		<center> <a href="login.php"><img src="images/icons/advert-something-now.png" class="advert-something-img"></a>
 		</center><br><br>
 	</p>
 </section>
 <section>
 	<div class="container">
 		<div class="row">
 			<div class="col-sm-12 padding-right">
 				<div class="col-sm-12 mobcat">
 					<span class="btn btn-primary  text-white-a">Latest Adverts</span>
 						<?php include('includes/product-adverts.php');?>
 							</div>
 				</div>
 			</div>
 		</div>
</section>
 <?php if($total_products>$limit){?>
 <p>
 	<center><a href="index.php?getlm=<?=$limit?>#id<?=$idcounter?>"><img src="images/icons/see-more-ads.png" class="see-more-ads"></a></center>
 </p>
<?php } ?>
 <br><br>

 <section>
   <div class="container">
      <div class="row">
         <div class="col-sm-12 padding-right">
            <div class="col-sm-12 mobcat">
               <span class="btn btn-primary text-white-a">Latest Services</span>
               <?Php include("includes/services-adverts-index.php");?>
            
                     </div>
            </div>
         </div>
      </div>
</section>
<p> <?php if($total_services>$limit){?>
   <center><a href="services.php?getlm=<?=$limit?>#id<?=$idcounter?>"><img src="images/icons/see-more-ads.png" class="see-more-ads"></a></center>
 </p> <?php } ?>
 <br><br>

 <section>
   <div class="container">
      <div class="row">
         <div class="col-sm-12 padding-right">
            <div class="col-sm-12 mobcat">
               <span class="btn btn-primary text-white-a">Latest skills</span>
               <?php include("includes/skills-adverts-index.php") ?>
               
                     </div>
            </div>
         </div>
      </div>
</section>
<p>
   <?php if($total_skills>$limit){?>
   <center><a href="skills.php?getlm=<?=$limit?>#id<?=$idcounter?>"><img src="images/icons/see-more-ads.png" class="see-more-ads"></a></center>
 </p>
<?php }?>
 <br><br>

 <section>
   <div class="container">
      <div class="row">
         <div class="col-sm-12 padding-right">
            <div class="col-sm-12 mobcat">
               <span class="btn btn-primary">Latest jobs</span>
               
                  <?php include("includes/jobs-adverts-index.php");?>
                     </div>
            </div>
         </div>
      </div>
   </div>
</section><p>
   <?php if($total_jobs>$limit){?>
   <center><a href="jobs.php?getlm=<?=$limit?>#id<?=$idcounter?>"><img src="images/icons/see-more-ads.png" class="see-more-ads"></a></center>
 <?php } ?>
 </p>
 <br><br>

<section>


 <section>
   <div class="container">
      <div class="row">
         <div class="col-sm-12 padding-right">
            <div class="col-sm-12 mobcat">
               <span class="btn btn-primary">Latest Vacancies</span>
            <?php include("includes/vacancies-adverts-index.php");?>

                     </div>
            </div>
         </div>
      </div>
   </div>
</section><p>
     <?php if($total_vacancies>$limit){?>
   <center><a href="Vacancys.php?getlm=<?=$limit?>#id<?=$idcounter?>"><img src="images/icons/see-more-ads.png" class="see-more-ads"></a></center>
 </p>
 <?php }?>
 <br><br>



 <?php include('includes/footer.php'); ?>
