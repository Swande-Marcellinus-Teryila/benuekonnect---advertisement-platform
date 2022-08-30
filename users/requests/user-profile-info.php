 <img src="profile_picture/<?=$user['photo']?>" class="img-circle img-responsive" style="max-height:160px;">
                                                 <span style="color:white; float: right;text-shadow:4px 2px black; font-size: 25px; font-width:450px"><?=$user['full_name']?></span>
                                                 <button class="btn btn-primary" id="showPictureEdit"><i class="fa fa-edit fa-x9"></i> Edit profile picture</button>
                                                        <form method="post" enctype="multipart/form-data">
                                                               <input type="hidden" name="img" value="<?=$user['photo']?>">
                                                               <p id="showfile"><input type="file" name="photo" required="required"><br>
                                                               <button class="btn btn-default" name="upload" id="upload">Upload</button></p>

                                                        </form>
                                                 </span>
                                                 <p><?Php include('includes/returnmsg.php');?>
                                                  <form method="post">
                                          <input type="text" name="email" value="<?=$user['email']?>" class="form-control">
                                          <input type="password" name="current_pswd" value="" class="form-control" placeholder="Current Password" required="required">            
                                          <button class="btn btn-primary" name="change_email">Change Email</button>

                                          </form></P>
                                            
                                          
                                           <p>  <form method="post">
                                                 <input type="text" name="address" value="<?=$user['address']?>" class="form-control">                                                       
                                                  <button class="btn btn-primary" name="change_address">Change Address</button>
                                           </form>
                                           </p>
                                           <p>  <form method="post">
                                                 <input type="text" name="phone" value="<?=$user['phone']?>" class="form-control">
                                                  <button class="btn btn-primary" name="change_phone">Change Number</button>
                                           </form>
                                           </p>
                                           <p>  <form method="post">
                                            <input type="password" name="current_pswd" value="" class="form-control" placeholder="Current Password">
                                          <input type="password" name="new_pswd" value="" placeholder="New Password" class="form-control" required="required">
                                          <center> <button class="btn btn-primary" name="change_password">Change Password</button></center>
                                   </form></p>