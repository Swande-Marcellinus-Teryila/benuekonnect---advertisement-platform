<?php 

session_start();
include('../../includes/autoloader.php');
$error = '';
$msg ='';
 $auth = new Auth();
try {
if(isset($_SESSION['user'])){
  if(isset($_POST['saveAdinsession'])){
$ad_id = $_POST['ad_id'];
$ad_type =$_POST['ad_type'];
$user_id =$_POST['user_id'];

$total_saved_ads = $auth->getTotalSpicific('saved_adverts','user_id',$user_id);
if($total_saved_ads>=20){
throw new Exception("oops!, Adverts saving limit reached, you can only save up to 20 adverts");

}

if($ad_type='products'){
  if($auth->exist2('saved_adverts','user_id','ad_id',$user_id,$ad_id)){
    throw new Exception("oops! You have saved this advert already");
    
  }
}

if($ad_type='services'){
  if($auth->exist2('saved_adverts','user_id','ad_id',$user_id,$ad_id)){
    throw new Exception("oops! You have saved this advert already");
    
  }
}

if($ad_type='job'){
  if($auth->exist2('saved_adverts','user_id','ad_id',$user_id,$ad_id)){
    throw new Exception("oops! You have saved this advert already");
    
  }
}

if($ad_type='skills'){
  if($auth->exist2('saved_adverts','user_id','ad_id',$user_id,$ad_id)){
    throw new Exception("oops! You have saved this advert already");
    
  }
}


if($ad_type='vacancy'){
  if($auth->exist2('saved_adverts','user_id','ad_id',$user_id,$ad_id)){
    throw new Exception("oops! You have saved this advert already");
    
  }
}

if($auth->insertSavedAd($user_id,$ad_type,$ad_id)){
    echo 'Ad saved successfully';
  }else{
       echo '<script>alert("Something went wrong,advert not saved!");</script>';
  }
}

}else{
if(isset($_POST['saveAd'])){

  
  $email = $_POST['email'];
  $password = $_POST['password'];
  $ad_id = $_GET['ad_id'];
  $ad_type =$_GET['ad_type'];
  $refurl = $_POST['httpback'];
 
  if($auth->is_AuthenticatedUser($email,$password)){
    $user_id = $auth->displayFieldOr('users','id','email','phone',$email,$email);


$total_saved_ads = $auth->getTotalSpicific('saved_adverts','user_id',$user_id);
if($total_saved_ads>=20){
throw new Exception("oops!, Adverts saving limit reached, you can only save up to 20 adverts");

}

if($ad_type='products'){
  if($auth->exist2('saved_adverts','user_id','ad_id',$user_id,$ad_id)){
    throw new Exception("oops! You have saved this advert already");
    
  }
}

if($ad_type='services'){
  if($auth->exist2('saved_adverts','user_id','ad_id',$user_id,$ad_id)){
    throw new Exception("oops! You have saved this advert already");
    
  }
}

if($ad_type='job'){
  if($auth->exist2('saved_adverts','user_id','ad_id',$user_id,$ad_id)){
    throw new Exception("oops! You have saved this advert already");
    
  }
}

if($ad_type='skills'){
  if($auth->exist2('saved_adverts','user_id','ad_id',$user_id,$ad_id)){
    throw new Exception("oops! You have saved this advert already");
    
  }
}


if($ad_type='vacancy'){
  if($auth->exist2('saved_adverts','user_id','ad_id',$user_id,$ad_id)){
    throw new Exception("oops! You have saved this advert already");
    
  }
}

    if($auth->insertSavedAd($user_id,$ad_type,$ad_id)){
     $_SESSION['user'] = $user_id;

    echo '<script>alert("Ad saved successfully");
     window.location.assign("'.$refurl.'");
    </script>
   ';

  }else{
      echo '<script>alert("something went wrong, Ad not saved");</script>';
  }
}else{
    echo '<script>alert("Invalid Details");</script>';
  }
  
}}
} catch (Exception $e) {
 echo '<script>alert("Something went wrong,advert not saved!");</script>';
}
