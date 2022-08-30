<?php session_start();
include('../includes/autoloader.php');

$auth = new Auth();
$auth->checkLogin('user');
$result = $auth->userInfo('id',$_SESSION['user']);
foreach($result as $user) { 

try{$referals = $auth->displayAllSpecificWithOrder('referrals','referral_id',$user['id'],'date_clicked','DESC');}catch(Exception $e){

}

$total_saved_adverts =  $auth->getTotalSpicific('saved_adverts','postal_id',$user['id']);
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
<title>My saved Advert | Benuekonnect</title>
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
<br>
<table cellpadding="0" border="0" style="width:100%" class="table">
<tr>
<td style="width:40%">&nbsp;</td>
<td style="width:50%"><span class="category-title text-blue">Saved&nbsp;Adverts
</span>
</td>
<td style="width:10%;" class="msg-logout-icon" id="showheader2">
</td>   

</tr>
</table>
</section>
<table border="0" cellspacing="0" style="width:100%" class="table">
<tr>
<td style="width:30%">&nbsp;</td>
<td style="width:45%">

 <img src="profile_picture/<?= $user['photo'] ?>" class="img-circle img-responsive profile_picture" >
<a href="edit-info.php" class="text-black" style="float:right">

<img src="../images/icons/edit profile section.png" class="edit-profile-icon">
</a><br>
<div class="username"><br>
       Welcome&nbsp;<span class="username"><?= $user['full_name'] ?></span>

</div>

</td>

<td style="width:20%;">&nbsp;

</td>
</tr>
</table>


<div class="container">
<div class="row">
<div class="col-md-12 col-lg-12">
<div class="col-sm-12 mobcat">
<div class="mob-adverts-users">
<?php try{

$latestsaved_adverts = $auth->displayAllSpecificWithOrder2('saved_adverts','user_id','ad_type',$user['id'],'products','date_saved','DESC');
foreach ($latestsaved_adverts as $savedproducts) {
if($auth->exist('products','id',$savedproducts['ad_id'])){

$products = $auth->displayAllSpecific('products','id',$savedproducts['ad_id']);
foreach ($products as $product) {?>



<div class="mob-adverts" id="id<?= $category['id'] ?>">
<span class="text-blue"><i class="fa fa-clock-o"></i> <?=$auth->get_time_ago($product['date_uploaded']);?>
<span class="location-icon"><?= $product['location'] ?></span>
</span>
<table cellspacing="0" border="10px" class="category_table" width="100">

<tr>
<td rowspan="3" width="30%">
<img src="../images/product-details/<?= $product['photo'] ?>" id="big_td_img"></td>
<td  style="height: 25px">
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
<td  class="save-ad-btn">
Saved
</td>
</tr>

</table>
<table cellspacing="0" border="0"  width="100%" class="category_table" style="padding: 0px; border-color:white">
<tr>
<td colspan="2" >
<a href="#" onclick="deleteRecord(<?=$savedproducts['id']?>)"> 
<img src="../images/icons/delete section.png"  style="height:35px">
</a>
</td>
<td>


</td>

<td>

</td>


</tr>




</table><br><br>
<?php }
}
}
} catch (Exception $e) {
echo "";
} ?>


</div>
</div>




<!-- for services-->
<div class="mob-adverts-users">
<?php try{
$phone ='';
$latestsaved_adverts = $auth->displayAllSpecificWithOrder2('saved_adverts','user_id','ad_type',$user['id'],'services','date_saved','DESC');
foreach ($latestsaved_adverts as $saved_services) {
       /* checking wether the advert still exist */
if($auth->exist('services','id',$saved_services['ad_id'])){

$services = $auth->displayAllSpecific('services','id',$saved_services['ad_id']);
foreach ($services as $lservice) { 
try { $photo =  $auth->displayField('users', 'photo', 'id', $lservice['postal_id']);
$phone =  $auth->displayField('users', 'phone', 'id', $lservice['postal_id']);
} catch (Exception $e) {            }

try {
$service = $auth->displayField('service_categories', 'service_category', 'id', $lservice['service_category_id']); 
} catch (Exception $e) {}
?>



<div class="mob-adverts" id="id<?=$idcounter?>">
<span class="text-blue"><i class="fa fa-clock-o"></i> <?=$auth->get_time_ago($lservice['date_uploaded']);?>
<span class="location-icon"><?= $lservice['service_location']; ?></span>
</span>
<table cellspacing="0" border="10px" class="category_table" width="100">

<tr>
<td rowspan="5" width="30%"><img src="profile_picture/<?=$photo ?>" 
       id="big_td_img"></td>
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
<td >
<a href="tel:<?=$phone;?>" style="color:blue">Contact <img src="../images/icons/phone.png" class="img-circle" style="width:16px; height: 18px;"></a>
</td>

</tr>

<tr>
<td class="save-ad-btn">
Saved
</td>

</tr>



<tr><td colspan="2" style="height:25px" >
<strong class="stage_name"><?=$lservice['stage_name']?></strong></td></tr>   </table><br>





<table cellspacing="0" border="0"  width="100%" class="category_table" style="padding: 0px; border-color:white">
<tr>
<td  colspan="2" >
<a href="#" onclick="deleteRecord(<?=$saved_services['id']?>)"> 
<img src="../images/icons/delete section.png"  style="height:35px">
</a>
</td>
<td></td>
<td></td>
</tr>
</table>
<br><br>
<?php }
}}} catch (Exception $e) {
echo "";
} ?>


</div>


<!-- for job-->
<div class="mob-adverts-users">
<?php try{
$phone = '';
$latestsaved_adverts = $auth->displayAllSpecificWithOrder2('saved_adverts','user_id','ad_type',$user['id'],'job','date_saved','DESC');
foreach ($latestsaved_adverts as $saved_job) {

if($auth->exist('job','id',$saved_job['ad_id'])){

$jobs = $auth->displayAllSpecific('job','id',$saved_job['ad_id']);
foreach ($jobs as $sjob) { 
try { $photo =  $auth->displayField('users', 'photo', 'id', $sjob['postal_id']);
$phone =  $auth->displayField('users', 'phone', 'id', $sjob['postal_id']);

} catch (Exception $e) {            }

try {
$job = $auth->displayField('job_categories', 'job_category', 'id', $sjob['job_cat_id']); 
} catch (Exception $e) {}
?>



<div class="mob-adverts" id="id<?=$idcounter?>">
<span class="text-blue"><i class="fa fa-clock-o"></i> <?=$auth->get_time_ago($sjob['date_uploaded']);?>
<span class="location-icon"><?= $sjob['location']; ?></span>
</span>
<table cellspacing="0" border="10px" class="category_table" width="100">

<tr>
<td rowspan="5" width="30%">
       <img src="profile_picture/<?=$photo?>" id="big_td_img"></td>
</tr>
<tr>
<td><?=$job?></td>

</tr>

<tr>
<td  class="advert_td check-it-btn">
<a href="../Service-details.php?service_id=<?= $sjob['id'] ?>">
<b>know More...</b>
</a>
</td>
</tr>
<tr>
<td>
<a href="tel:<?=$phone; ?>" style="color:blue">Contact <img src="../images/icons/phone.png" class="img-circle" style="width:16px; height: 18px;"></a>
</td>

</tr>

<tr>
<td class="save-ad-btn">
Saved
</td>

</tr>



<tr><td colspan="2" style="height:25px">
<strong class="stage_name"><?=$sjob['stage_name']?></strong></td></tr>   </table><br>





<table cellspacing="0" border="0"  width="100%" class="category_table" style="padding: 0px; border-color:white">
<tr>
<td  colspan="2" >
<a href="#" onclick="deleteRecord(<?=$saved_job['id']?>)"> 
<img src="../images/icons/delete section.png"  style="height:35px">
</a>
</td>
<td></td>
<td></td>
</tr>
</table>
<br><br>
<?php }
}}
} catch (Exception $e) {
echo "";
} ?>


</div>                                                        

<!-- for services-->
<div class="mob-adverts-users">
<?php try{

$latestsaved_adverts = $auth->displayAllSpecificWithOrder2('saved_adverts','user_id','ad_type',$user['id'],'skills','date_saved','DESC');
foreach ($latestsaved_adverts as $saved_skills) {
if($auth->exist('skills','id',$saved_skills['ad_id'])){
$skills = $auth->displayAllSpecific('skills','id',$saved_skills['ad_id']);
foreach ($skills as $skill) { 
try { $photo =  $auth->displayField('users', 'photo', 'id', $skill['user_id']);
$phone =  $auth->displayField('users', 'phone', 'id', $skill['user_id']);
} catch (Exception $e) {            }

?>



<div class="mob-adverts" id="id<?=$idcounter?>">
<span class="text-blue"><i class="fa fa-clock-o"></i> <?=$auth->get_time_ago($skill['date']);?>
<span class="location-icon"><?= $skill['location']; ?></span>
</span>
<table cellspacing="0" border="10px" class="category_table" width="100">

<tr>
<td rowspan="5" width="30%">
       <img src="profile_picture/<?=$photo; ?>" id="big_td_img">
</td>
</tr>
<tr>
<td><?=$skill['skill']?></td>

</tr>

<tr>
<td class="advert_td check-it-btn">
<a href="../skill-details.php?skill_id=<?= $skill['id'] ?>">
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
<td>
<a href="tel:<?=$phone;?>" style="color:blue">Contact <img src="../images/icons/phone.png" class="img-circle" style="width:16px; height: 18px;"></a>
</td>

</tr>

<tr>
<td class="save-ad-btn">
Saved
</td>

</tr>



<tr><td colspan="2" style="height:25px">
<strong class="stage_name"><?=$skill['stage_name']?>
       
</strong>
</td>
</tr>
</table><br>





<table cellspacing="0" border="0"  width="100%" class="category_table" style="padding: 0px; border-color:white">
<tr>
<td colspan="2" >
<a href="#" onclick="deleteRecord(<?=$saved_skills['id']?>)"> 
<img src="../images/icons/delete section.png"  style="height:35px">
</a>
</td>
<td></td>
<td></td>
</tr>
</table>
<br><br>
<?php }
}}
} catch (Exception $e) {
echo "";
} ?>



<!--p>for vacancy</p-->
<div class="mob-adverts-users">
<?php try{
$phone ='';
$latestsaved_adverts = $auth->displayAllSpecificWithOrder2('saved_adverts','user_id','ad_type',$user['id'],'vacancy','date_saved','DESC');
foreach ($latestsaved_adverts as $saved_vacancy) {

if($auth->exist('vacancy','id',$saved_vacancy['ad_id'])){

$vacancies = $auth->displayAllSpecific('vacancy','id',$saved_vacancy['ad_id']);
foreach ($vacancies as $svacancy) { 
try { 
       $photo =  $auth->displayField('users', 'photo', 'id', $svacancy['user_id']);
       $phone =  $auth->displayField('users', 'phone', 'id', $svacancy['user_id']);
} catch (Exception $e) {            }

try {
$vacancy = $auth->displayField('vacancy_category', 'vacancy_category', 'id', $svacancy['vacancy']); 
} catch (Exception $e) {}
?>

<div class="mob-adverts" id="id<?=$idcounter?>">
<span class="text-blue"><i class="fa fa-clock-o"></i> <?=$auth->get_time_ago($svacancy['date_uploaded']);?>
<span class="location-icon"><?= $svacancy['location']; ?></span>
</span>
<table cellspacing="0" border="10px" class="category_table" width="100">

<tr>
<td rowspan="5" width="30%">
       <img src="profile_picture/<?=$photo; ?>" id="big_td_img"></td>
</tr>
<tr>
<td><?=$vacancy?></td>

</tr>

<tr>
<td class="advert_td check-it-btn">
<a href="../vacancy-details.php?vacancy_id=<?= $svacancy['id'] ?>">
<b>know More...</b>
</a>
</td>
</tr>
<tr>
<td>
<a href="tel:<?=$phone?>" style="color:blue">Contact <img src="../images/icons/phone.png" class="img-circle" style="width:16px; height: 18px;"></a>
</td>

</tr>

<tr>
<td  class="save-ad-btn">
Saved
</td>

</tr>



<tr><td colspan="2" style="height:25px">
<strong class="stage_name"><?=$svacancy['stage_name']?></strong></td></tr>   </table><br>





<table cellspacing="0" border="0"  width="100%" class="category_table" style="padding: 0px; border-color:white">
<tr>
<td colspan="2" >
<a href="#" onclick="deleteRecord(<?=$saved_vacancy['id']?>)"> 
<img src="../images/icons/delete section.png"  style="height:35px">
</a>
</td>
<td></td>
<td></td>
</tr>
</table>
<br><br>
<?php 
}
}}
}catch (Exception $e) {

} ?>


</div>      
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<script src="../js/custom/delete-savedad.js"></script>
<div class="col-md-12">

<?php include('includes/footer.php'); ?>
</div>

<?php } ?>       



