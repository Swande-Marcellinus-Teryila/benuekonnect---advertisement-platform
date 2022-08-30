  <?php session_start();
       include('../includes/autoloader.php');


       $auth = new Auth();
       $auth->checkLogin('user');
       $result = $auth->userInfo('id', $_SESSION['user']);
       foreach ($result as $user) {

              try {  
                     $referals = $auth->displayAllSpecificWithOrder('referrals', 'referral_id', $user['id'], 'date_clicked', 'DESC');
              } catch (Exception $e) {
              }

              $total_products =  $auth->getTotalSpicific('products', 'postal_id', $user['id']);
              $total_referrals = $auth->getTotalSpicific(
                     'referrals',
                     'referral_code',
                     $user['referral_code']
              );
              $total_services =  $auth->getTotalSpicific('service_categories', 'user_id', $user['id']);
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
                <link rel="shortcut icon" href="../images/ico/favicon.ico">
                <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
                <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
                <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
                <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
         </head>
         <!--/head-->
         <?php include('includes/header.php') ?>
        <section>
                      <br>
<table cellpadding="0" border="0" style="width:100%" class="table">
                       <tr>
                              <td style="width:40%">&nbsp;</td>
                              <td style="width:50%"><span class="category-title text-blue">Dashboard
                                     </span>
                              </td>
                              <td style="width:10%;" class="msg-logout-icon" id="showheader2">
                                </td>   

                       </tr>
                </table>
         </section>
                <section>
                <table border="0" cellspacing="0" style="width:100%" class="table">
                       <tr>
                              <td style="width:30%"><b class="text-green">
                                   <i class="fa fa-users fa-3x"></i><br>
                              Referrals:  </b>
                                   <br><br><b class="category-title"><?= $total_referrals ?></b></td>
                              <td style="width:45%">

                                     <img src="profile_picture/<?= $user['photo'] ?>" class="img-circle img-responsive profile_picture" >
                                     <a href="edit-info.php" class="text-black" style="float:right">

                                            <img src="../images/icons/edit profile section.png" class="edit-profile-icon">
                                     </a><br>
                                     <div class="username"><br>Welcome&nbsp;<span class="username"><?= $user['full_name'] ?>

                                     </div>

                              </td>

                              <td style="width:20%;">&nbsp;

                              </td>
                       </tr>
                </table>

                <table border="0" cellspacing="0" style="width:100%" class="table">
                       <tr>
                              <td style="width:14%">&nbsp;</td>
                              <td style="width:30%">
                                     <a href="myadverts.php">
                                            <img src="../images/icons/my-adverts-section.png" class="myadvert-icon">
                                     </a>
                              </td>

                              <td style="width:30%;">
                                     <a href="saved-adverts.php">
                                            <img src="../images/icons/saved ads section1.png" class="myadvert-icon">
                                     </a>
                              </td>
                              <td style="width:16%;"> &nbsp;
                              </td>

                       </tr>

                </table><br>
                <div class="container edit-info">
                       <div class="row">
                              <div class="col-sm-6">

                                     </P>
                                     <ul>
                                            <li></li>

                                     </ul>

                                     <p><a href="post-product.php"><img src="../images/icons/bullet.png" class="custom-bullet">&nbsp;&nbsp;<b class="text-blue">Advertise your product for</b> &nbsp;<img src="../images/icons/free.png" style="width:40px; height:25px">
                                            </a></p><br>
                                     <p><a href="payment.php"><img src="../images/icons/bullet.png" class="custom-bullet">&nbsp;&nbsp;<b class="text-blue">Advertise Jobs, Service & skills</b> &nbsp;<img src="../images/icons/click-here.png" style="width:45px; height:35px"></a></p>


                              </div>
                          
                              <div class="col-sm-8"><br>
                                     <?php include('includes/notification.php'); ?>
                                     <?php include('includes/warninginfo2.php'); ?>
                                     <?php include('includes/share.php'); ?>

                              </div>
                       </div>
                </div>
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
         <?Php include('includes/footer.php') ?>

         <script src="../js/custom/my-adverts.js"></script>
  <?php } ?>