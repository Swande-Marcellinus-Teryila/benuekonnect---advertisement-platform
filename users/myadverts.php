<?php session_start();
$msg ="";
$error = "";
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
$total_services =  $auth->getTotalSpicific('service_categories', 'user_id', $user['id']);


?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>My Adverts | Benuekonnect</title>
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
<?php include('includes/header.php'); ?>
<section>
<br>
<table cellpadding="0" border="0" style="width:100%" class="table">
<tr>
<td style="width:40%">&nbsp;</td>
<td style="width:50%"><span class="category-title text-blue">My&nbsp;Adverts
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
<td style="width:30%">&nbsp;</td>
<td style="width:45%">

 <img src="profile_picture/<?= $user['photo'] ?>" class="img-circle img-responsive profile_picture" >
<div class="username">Welcome&nbsp;<span class="username"><?= $user['full_name'] ?></span>

</div>

</td>

<td style="width:20%;">&nbsp;

</td>
</tr>
</table>
</div>

<div class="container">
<div class="row">
<div class="col-sm-12 mobcat">

<div class="mob-adverts-users">


<?php try {
$productss = $auth->displayAllSpecificWithOrder('products', 'postal_id', $user['id'], 'date_uploaded', 'DESC');

foreach ($productss as $product) {

?>

<div class="mob-adverts" id="id<?= $category['id'] ?>">
<span class="text-blue"><i class="fa fa-clock-o"></i> <?=$auth->get_time_ago($product['date_uploaded']);?>
<span class="location-icon"><?= $product['location'] ?></span>
</span>
<table cellspacing="0" border="10px" class="category_table" width="100">

<tr>
<td rowspan="3" width="30%"><img src="../images/product-details/<?= $product['photo'] ?>" id="big_td_img">
<td>
<?= $product['product_name']; ?>

</td>
<td class="advert_td check-it-btn">
<a href="../product-details.php?prod_id=<?= $product['id'] ?>">
<img src="../images/icons/check it out.png">
</a>
</td>
</tr>
<tr>
<td>N<?= number_format($product['selling_price']); ?></td>
<td>
<a href="tel:<?=$auth->displayField('users','phone','id',$product['postal_id']);?>" style="color:blue">Contact <img src="../images/icons/phone.png" class="img-circle" style="width:16px; height: 18px;"></a>
</td>
</tr>
<tr>
<td><?=$product['product_state']?></td>
<td class="save-ad-btn">
<?php if(!isset($_SESSION['user'])){?>
<a href="save-ad.php?ad_id=<?=$product['id']?> && ad_type=products">
<img src="../images/icons/save this ad.png">
</a>
<?Php }else{?>

<a href="#" onclick="saveAd('<?=$product['id']?>','products','<?php echo $_SESSION["user"]; ?>')" >
<img src="../images/icons/save this ad.png">
</a>
<?php }?>
</td>
</tr>

</table>
<table cellspacing="0" border="0"  width="100%" class="category_table" style="padding: 0px; border-color:white">
<tr>
<td  colspan="2" >
<a href="#" onclick="deleteRecord(<?=$product['id']?>)"> 
<img src="../images/icons/delete section.png"  style="height:35px">
</a>
</td>
<td>


</td>

<td>
<?php if($product['user_approval_status']=='0'){?>
<a href="#" onclick="activate('1',<?=$product['id']?>)"> 
<img src="../images/icons/activate section.png" class="activate-section-icon" style="height:35px">
</a>
<?Php }else{?>
<a href="#"  onclick="deactivate('0',<?=$product['id']?>)"> 
<img src="../images/icons/deactivate section.png" class="activate-section-icon"   style="height:35px">
</a> <?php } ?>
<p id="showMessage"></p>
</td>


</tr>




</table><br><br>
<?php }
} catch (Exception $e) {
echo "";
} ?>




<?php try {
$limit = 25;
$idcounter=0;
$total_services = $auth->getTotal('services');
if (isset($_GET['getlm'])) {
$limit=$_GET['getlm'];
if($total_services-$limit>25){
$limit+=25;
}else{
$limit+=$total_services%$limit;
}
}
$latestservices = $auth->displayAllSpecificWithOrderWithLimit2('services', 'status','postal_id','1',$user['id'], 'date_uploaded', 'DESC',$limit);

$service = "";
$photo="";
foreach ($latestservices as $lservice) {
try {

$photo =  $auth->displayField('users', 'photo', 'id', $lservice['postal_id']);
} catch (Exception $e) {

}
try {
$service = $auth->displayField('service_categories', 'service_category', 'id', $lservice['service_category_id']); 

} catch (Exception $e) {

}
?>
<div class="mob-adverts" id="id<?=$idcounter?>">
<span class="text-blue"><i class="fa fa-clock-o"></i> <?=$auth->get_time_ago($lservice['date_uploaded']);?>
<span class="location-icon"><?= $lservice['service_location']; ?></span>
</span>
<table cellspacing="0" border="10px" class="category_table" width="100">

<tr>
<td rowspan="5" width="30%"><img src="profile_picture/<?= $photo ?>" id="big_td_img">


</tr>
<tr>
<td><?=$service?></td>

</tr>
<tr>
<td class="advert_td check-it-btn">
<a href="../Service-details.php?service_id=<?= $lservice['id'] ?>">
<b>know More...</b>
</a>
</td>
</tr>
<tr>
<td>
<a href="tel:<?=$auth->displayField('users','phone','id',$lservice['postal_id']);?>" style="color:blue">Contact <img src="../images/icons/phone.png" class="img-circle" style="width:16px; height: 18px;"></a>
</td>

</tr><tr>
<td class="save-ad-btn">
<?php if(!isset($_SESSION['user'])){?>
<a href="save-ad.php?ad_id=<?=$lservice['id']?> && ad_type=services">
<img src="../images/icons/save this ad.png">
</a>
<?Php }else{?>

<a href="#" onclick="saveAd('<?=$lservice['id']?>','services','<?php echo $_SESSION['user']; ?>');" >
<img src="../images/icons/save this ad.png">
</a>
<?php }?>
</td>

</tr>
<tr><td colspan="2" style="height:25px">
<strong class="stage_name"><?=$lservice['stage_name']?></strong></td></tr>   </table><br>





</table>
<table cellspacing="0" border="0"  width="100%" class="category_table" style="padding: 0px; border-color:white">
<tr>
<td style="height: 25px" colspan="2" >
<a href="#" onclick="deleteServiceRecord(<?=$lservice['id']?>)"> 
<img src="../images/icons/delete section.png"  style="height:35px">
</a>
</td>
<td>


</td>

<td>
<?php if($lservice['user_approval_status']=='0'){?>
<a href="#" onclick="activateService('1',<?=$lservice['id']?>)"> 
<img src="../images/icons/activate section.png" class="activate-section-icon" style="height:35px">
</a>
<?Php }else{?>
<a href="#"  onclick="deactivateService('0',<?=$lservice['id']?>)"> 
<img src="../images/icons/deactivate section.png" class="activate-section-icon"   style="height:35px">
</a> <?php } ?>
<p id="showMessage"></p>
</td>


</tr>
</table><br><br>
<?php }} catch (Exception $e) { } ?>






<!---p> for jobs  <p-->

<?php 
try { $limit = 50;
$idcounter=0;
$total_products = $auth->getTotal('job');
if (isset($_GET['getlm'])) {
$limit=$_GET['getlm'];
if($total_products-$limit>50){
$limit+=50;
}else{
$limit+=$total_products%$limit;
}
}
$latestjobs = $auth->displayAllSpecificWithOrderWithLimit2('job', 'status','postal_id', '1',$user['id'],'date_uploaded', 'DESC', $limit);
$job = "";
$photo="";
foreach ($latestjobs as $ljob) {
try {

$photo =  $auth->displayField('users', 'photo', 'id', $ljob['postal_id']);
} catch (Exception $e) {

}
try {
$job = $auth->displayField('job_categories', 'job_category', 'id', $ljob['job_cat_id']); 

} catch (Exception $e) {

}
?>
<div class="mob-adverts" id="id<?=$idcounter?>">
<span class="text-blue"><i class="fa fa-clock-o"></i> <?=$auth->get_time_ago($ljob['date_uploaded']);?>
<span class="location-icon"><?= $ljob['location']; ?></span>
</span>
<table cellspacing="0" border="10px" class="category_table" width="100">

<tr>
<td rowspan="5" width="30%"><img src="profile_picture/<?= $photo ?>" id="big_td_img">


</tr>
<tr>
<td><?=$job?></td>

</tr>
<tr>
<td class="advert_td check-it-btn">
<a href="../job-details.php?job_id=<?= $ljob['id'] ?>">
<b>know More...</b>
</a>
</td>

</tr>
<tr>
<td>
<a href="tel:<?=$auth->displayField('users','phone','id',$ljob['postal_id']);?>" style="color:blue">Contact <img src="../images/icons/phone.png" class="img-circle" style="width:16px; height: 18px;"></a>
</td>

</tr><tr>
<td class="save-ad-btn">
<?php if(!isset($_SESSION['user'])){?>
<a href="save-ad.php?ad_id=<?=$ljob['id']?> && ad_type=job">
<img src="../images/icons/save this ad.png">
</a>
<?Php }else{?>

<a href="#" onclick="saveAd('<?=$ljob['id']?>','job','<?php echo $_SESSION['user']; ?>');" >
<img src="../images/icons/save this ad.png">
</a>
<?php }?>
</td>

</tr>
<tr><td colspan="2" style="height:25px">
<strong class="stage_name"><?=$ljob['stage_name']?></strong></td></tr>       </table><br>

</table>
<table cellspacing="0" border="0"  width="100%" class="category_table" style="padding: 0px; border-color:white">
<tr>
<td  colspan="2" >
<a href="#" onclick="deleteJobRecord(<?=$ljob['id']?>)"> 
<img src="../images/icons/delete section.png"  style="height:35px">
</a>
</td>
<td>


</td>

<td>
<?php if($ljob['user_approval_status']=='0'){?>
<a href="#" onclick="activateJob('1',<?=$ljob['id']?>)"> 
<img src="../images/icons/activate section.png" class="activate-section-icon" style="height:35px">
</a>
<?Php }else{?>
<a href="#"  onclick="deactivateJob('0',<?=$ljob['id']?>)"> 
<img src="../images/icons/deactivate section.png" class="activate-section-icon"   style="height:35px">
</a> <?php } ?>
<p id="showMessage"></p>
</td>


</tr>
</table><br><br>


<?php }
} catch (Exception $e) {

} ?>


<!--p> For skills</p-->

<?php try {
$limit = 25;
$idcounter=0;
$total_skills= $auth->getTotal('skills');
if (isset($_GET['getlm'])) {
$limit=$_GET['getlm'];
if($total_products-$limit>25){
$limit+=25;
}else{
$limit+=$total_products%$limit;
}
}
$latestskills = $auth->displayAllSpecificWithOrderWithLimit2('skills', 'status','user_id', '1',$user['id'], 'date', 'DESC',$limit);

$skill = "";
$photo="";
foreach ($latestskills as $lskill) {
try {

$photo =  $auth->displayField('users', 'photo', 'id', $lskill['user_id']);
} catch (Exception $e) {

}

?>
<div class="mob-adverts" id="id<?=$idcounter?>">
<span class="text-blue"><i class="fa fa-clock-o"></i> <?=$auth->get_time_ago($lskill['date']);?>
<span class="location-icon"><?= $lskill['location']; ?></span>
</span>
<table cellspacing="0" border="10px" class="category_table" width="100">

<tr>
<td rowspan="5" width="30%"><img src="profile_picture/<?= $photo ?>" id="big_td_img">


</tr>
<tr>
<td><?=$lskill['skill']?></td>

</tr>
<tr>
<td class="advert_td check-it-btn">
<a href="../skill-details.php?skill_id=<?= $lskill['id'] ?>">
<b>know More...</b>
</a>
</td>

</tr>

<tr>
										<td>
											<a href="tel:<?=$auth->displayField('users','phone','id',$lskill['user_id']);?>" style="color:blue">Contact <img src="images/icons/phone.png" class="img-circle" style="width:16px; height: 18px;"></a>
										</td>
										
									</tr>

<tr>
<td class="save-ad-btn">
<?php if(!isset($_SESSION['user'])){?>
<a href="save-ad.php?ad_id=<?=$lskill['id']?> && ad_type=skills">
<img src="../images/icons/save this ad.png">
</a>
<?Php }else{?>

<a href="#" onclick="saveAd('<?=$lskill['id']?>','skills','<?php echo $_SESSION['user']; ?>');" >
<img src="../images/icons/save this ad.png">
</a>
<?php }?>
</td>

</tr>
<tr><td colspan="2" style="height:25px"> 
<strong class="stage_name"><?=$lskill['stage_name']?></strong></td></tr>     
</table>
<table cellspacing="0" border="0"  width="100%" class="category_table" style="padding: 0px; border-color:white">
<tr>
<td  colspan="2" >
<a href="#" onclick="deleteSkillRecord(<?=$lskill['id']?>)"> 
<img src="../images/icons/delete section.png"  style="height:35px">
</a>
</td>
<td>


</td>

<td">
<?php if($lskill['user_approval_status']=='0'){?>
<a href="#" onclick="activateSkill('1',<?=$lskill['id']?>)"> 
<img src="../images/icons/activate section.png" class="activate-section-icon" style="height:35px">
</a>
<?Php }else{?>
<a href="#"  onclick="deactivateSkill('0',<?=$lskill['id']?>)"> 
<img src="../images/icons/deactivate section.png" class="activate-section-icon"   style="height:35px">
</a> <?php } ?>
<p id="showMessage"></p>
</td>


</tr>
</table><br><br>

<?php }
} catch (Exception $e) {

} ?>


<!--p>for vacancy</p-->



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
$latestVacancys = $auth->displayAllSpecificWithOrderWithLimit2('vacancy', 'status','user_id','1',$user['id'], 'date_uploaded', 'DESC', $limit);
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
<td rowspan="5" width="30%"><img src="profile_picture/<?= $photo ?>"id="big_td_img">


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
<strong class="stage_name"><?=$lvacancy['stage_name']?></strong></td></tr>   </table><br>

</table>

<table cellspacing="0" border="0"  width="100%" class="category_table" style="padding: 0px; border-color:white">
<tr>
<td  colspan="2" >
<a href="#" onclick="deleteVacancyRecord(<?=$lvacancy['id']?>)"> 
<img src="../images/icons/delete section.png"  style="height:35px">
</a>
</td>
<td style="height: 25px">


</td>

<td style="height: 25px">
<?php if($lvacancy['user_approval_status']=='0'){?>
<a href="#" onclick="activateVacancy('1',<?=$lvacancy['id']?>)"> 
<img src="../images/icons/activate section.png" class="activate-section-icon" style="height:35px">
</a>
<?Php }else{?>
<a href="#"  onclick="deactivateVacancy('0',<?=$lvacancy['id']?>)"> 
<img src="../images/icons/deactivate section.png" class="activate-section-icon"   style="height:35px">
</a> <?php } ?>
<p id="showMessage"></p>
</td>


</tr>
</table><br><br>
<?php }
} catch (Exception $e) {

} ?>


</div>
</div>
</div>
</div>
</section>


<script src="../js/custom/my-adverts.js"></script>
<?php include('includes/footer.php'); ?>

<?php } ?>