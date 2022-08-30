
<?php session_start();
           include('../../includes/autoloader.php');


       $auth = new Auth();
       $auth->checkLogin('user');
       $result = $auth->userInfo('id', $_SESSION['user']);
       foreach ($result as $user) {?>
        
                                    <a href="chats.php"><img src="../images/icons/red-msg.png" class="red-msg-icon"> <span style="color:red; text-shadow: 3px 4px 4px black; font-size: 16px;"><b><?php 
                                    $totalMsg = $auth->getTotalSpicific2('comments','user_id','mark_as_read',$user['id'],'2');
                                    if($totalMsg==1){?>
                                        <?=$totalMsg;?>&nbsp;new&nbsp;message&nbsp;
                                          <?php }elseif ($totalMsg>1) {?>
                                          <?=$totalMsg;?>&nbsp;new&nbsp;messages.
                                          <?php }?></b></span></a>
                                     <br>
                                     <a href="logout.php"><img src="../images/icons/logout section.png" class="logout-icon"></a>
                            
                <?php }?>