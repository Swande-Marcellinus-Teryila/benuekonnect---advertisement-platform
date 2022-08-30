  <?php session_start();
         include('../includes/autoloader.php');
       $error = "";
       $msg = "";
        $auth = new Auth();
        $auth->checkLogin('user');
        $result = $auth->userInfo('id',$_SESSION['user']);
        foreach($result as $user) { 

         if(isset($_POST['change_email'])){ 
              if(password_verify($_POST['current_pswd'], $user['password'])){
             try{
              $auth->updateSingleSpecific('users','email','id',$user['id'],$_POST['email']);
              $msg = "Email changed successfully";
       }catch(Exception $e){
              $error =$e->getMessage();
       }
       }else{
              $error = "Invalid password!";
       }
}
       if(isset($_POST['change_address'])){
             try{
              $auth->updateSingleSpecific('users','address','id',$user['id'],$_POST['address']);
              $msg = "Address updated successfully";
       }catch(Exception $e){
              $error =$e->getMessage();
       }

       }
              if(isset($_POST['upload'])){
             try{
              $msg = $auth->updatePhoto('users','photo','id',$_FILES,$user['id'],'profile_picture/');
             
       }catch(Exception $e){
              $error =$e->getMessage();
       }

       }elseif(isset($_POST['change_phone'])){
             try{
              $auth->updateSingleSpecific('users','phone','id',$user['id'],$_POST['phone']);
              $msg= "Phone number is changed successfully";
       }catch(Exception $e){
              $error =$e->getMessage();
       }
       }
       elseif(isset($_POST['change_name'])){
             try{
              $auth->updateSingleSpecific('users','full_name','id',$user['id'],$_POST['name']);
              $msg= "Your name is changed successfully";
       }catch(Exception $e){
              $error =$e->getMessage();
       }
       } elseif(isset($_POST['change_password'])){
              
             try{
              if($_POST['new_pswd']!=$_POST['confirmation_pswd']){
                     throw new Exception("confirmatioin password did not match");
                     
              }else{
              if(password_verify($_POST['current_pswd'], $user['password'])){
             $auth->updateSingleSpecific('users','password','id',$user['id'],password_hash($_POST['new_pswd'], PASSWORD_DEFAULT));
             $msg = "Password updated successfully";
      }else{
              $error ="Invalid password!";
       }
}
       }catch(Exception $e){
              $error = $e->getMessage();
       }
       }

       
        ?>
       <!DOCTYPE html>
         <html lang="en">

         <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="description" content="">
                <meta name="author" content="">
                <title>Edit profile| Benuekonnect</title>
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
       <link rel="shortcut icon" href="../images/icons/bk.png" type="image/png">
                <link rel="shortcut icon" href="images/ico/favicon.ico">
                <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
                <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
                <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
                <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
         </head>
         <!--/head-->
        <?php include('includes/header.php');?>
                  <section>
                      <br>
<table cellpadding="0" border="0" style="width:100%" class="table">
                       <tr>
                              <td style="width:40%">&nbsp;</td>
                              <td style="width:50%"><span class="category-title text-blue">Edit&nbsp;Profile
                                     </span>
                              </td>
                              <td style="width:10%;" class="msg-logout-icon" id="showheader2">
                                </td>   

                       </tr>
                </table>
         </section>
             
         </section>
                <section>
                <table border="0" cellspacing="0" style="width:100%" class="table">
                       <tr>
                              <td style="width:50%"><img src="profile_picture/<?= $user['photo'] ?>" class="img-circle img-responsive" style="max-height:160px; width: 80%;">
                                   <span class="username"><?= $user['full_name']?>
                              <button class="btn btn-primary text" id="showPictureEdit"><i class="fa fa-camera fa-x9"></i><b> Change Photo</b></button></td>
                              <td style="width:15%">
                          
                              </td>

                              <td style="width:15%;">&nbsp;

                              </td>
                       </tr>
                </table>

                              <div class="container edit-info">
                                   <div class="row">
                                          <div class="col-sm-6">
                                             <p style="float:right;"><a href="edit-info.php" class="btn btn-warning">Refresh</a></p>
                                                        <form method="post" enctype="multipart/form-data">
                                                               <input type="hidden" name="img" value="<?=$user['photo']?>">
                                                               <p id="showfile">

                                                                      <input type="file" name="photo" required="required"><br>
                                                               <button class="btn btn-default" name="upload" id="upload">Upload</button></p>

                                                        </form>
                                                
                                                 <p><?Php include('includes/returnmsg.php');?></p>
                                                  <p>
                                          <form method="post">
                                          <input type="text" name="name" value="<?=$user['full_name']?>" class="form-control">
                                          <button class="btn btn-primary text" name="change_name"><b>Change Name</b></button>
                                          </form></P>

                                               <p>   <form method="post">
                                          <input type="text" name="email" value="<?=$user['email']?>" class="form-control">
                                          <input type="password" name="current_pswd" value="" class="form-control" placeholder="Current Password" required="required">            
                                          <button class="btn btn-primary text" name="change_email"><b>Change Email</b></button>

                                          </form></P>
                                         
                                            
                                          
                                           <p>  <form method="post">
                                                 <input type="text" name="address" value="<?=$user['address']?>" class="form-control">                                                       
                                                  <button class="btn btn-primary text" name="change_address"><b>Change Address </b></button>
                                           </form>
                                           </p>

                                           <p>  <form method="post">
                                                 <input type="text" name="phone" value="<?=$user['phone']?>" class="form-control">
                                                  <button class="btn btn-primary" name="change_phone"> <b>Change Number</b></button>
                                           </form>
                                           </p>

                                            <form method="post">
                                                 <p id="showpswdmsg"></p>

                                            <input type="password" name="current_pswd" value="" class="form-control" placeholder="Current Password">
                                          <input type="password" name="new_pswd" value="" placeholder="New Password" class="form-control" required="required" id="new_pswd">
                                          <input type="password" name="confirmation_pswd" value="" placeholder="Confirm Password" class="form-control" required="required" id="confirmed_pswd">
                                          <center><button class="btn btn-primary" name="change_password" id="change_pswd"><b>Change Password</b></button></center>
                                   </form></p>

                                          </div>
                                   <div class="col-sm-6">
                                     <div class="col-sm-8">
                                     <?php include('includes/notification.php'); ?>
                                     <?php include('includes/warninginfo2.php'); ?>
                                     <?php include('includes/share.php'); ?>

                              </div>
                             </div>
                      </p></div></div>
                             



       <?php include('includes/footer.php'); ?>
<script>
        $("#showfile").hide();
       $("#showPictureEdit").click(function(){
              $("#showfile").show(500);
       });
       /*
$("#change_pswd").prop('disabled',true);
    let confirmed_pswd = $("#confirmed_pswd").val();
       let new_pswd = $("#new_pswd").val();

       $("#confirmed_pswd").input(function(){ 
       if(confirmed_pswd!=$new_pswd){
alert(confirmed_pswd);
          //$("#confirmed_pswd").css("border-color:red"); 
          //$("#change_pswd").prop('disabled',false);   
       }
    
       }); */
      
     
</script></script>
              <?php } ?>

       
       