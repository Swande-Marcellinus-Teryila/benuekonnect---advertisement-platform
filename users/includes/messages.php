<?php
session_start();
  $msg ="";
  $error = "";
    include('../../includes/autoloader.php');
   

    $auth = new Auth();
    $auth->checkLogin('user');
    $result = $auth->userInfo('id', $_SESSION['user']);
    foreach ($result as $user) {
       $distinctmsg = $auth->displayDistinctMessages($user['id']);
       $arrproductmsg= array();
       $arrservicemsg = array();
       $arrjobmsg = array();
       $arrskillmsg = array();
       $arrvacancymsg = array();
       //$chat_activity_status = $auth->displayfield('comments','chat_activity','product_id','97');



    ?>
 
            
       
               
                      

                      <?php foreach ($distinctmsg as $msg) {
                    


                      if(!empty($msg['product_id'])){
                if(!in_array($msg['product_id'], $arrproductmsg)){
               array_push($arrproductmsg, $msg['product_id']);


                            ?>



                        <div class="col-lg-12 col-md-12 msg-container "> 
                            <a href="../product-details.php?prod_id=<?=$msg['product_id'];?>&&user_id=<?=$user['id']?>#comment">
                                <?php $totalMsg = $auth->getTotalSpicificUreadMsg('comments','user_id','mark_as_read','product_id',$user['id'],'2',$msg['product_id']); ?>
                     <div class="alert alert-success msg-area"> 

                      
                      <?php

                       $chat_activity_status = $auth->displayfield('comments','chat_activity','product_id',$msg['product_id']);

                        if($chat_activity_status==1){
                            echo 'Typing...';
                        }else{?>
                            <span class="messeger-name"><?=$msg['full_name']?>:</span>  
                            <?php echo substr($msg['comment'],0,18);
                        
                       ?>  
                            &nbsp;...&nbsp;&nbsp;&nbsp;&nbsp;
                                   <i><?=$auth->get_time_ago2(($msg['date_commented'])); }?></i>

                
                            <?php  
                            if($totalMsg>0){
                                echo '<button class="msg-not-btn">'.$totalMsg.'</button>';
                            }

                                ?>

             </div>
                     </a>
                     </div>
       <?php }} ?>





                            

               
                          <?Php   if(!empty($msg['service_id'])){
                                      if(!in_array($msg['service_id'], $arrservicemsg)){
                                          array_push($arrservicemsg, $msg['service_id']);


                            ?> <div class="col-lg-12 col-md-12 msg-container "> 
                            <a href="../Service-details.php?service_id=<?=$msg['service_id'];?>&&user_id=<?=$user['id']?>#comment">
                                <?php $totalMsg = $auth->getTotalSpicificUreadMsg('comments','user_id','mark_as_read','service_id',$user['id'],'2',$msg['service_id']); ?>
                     <div class="alert alert-success msg-area"> 

                        <?php

                       $chat_activity_status = $auth->displayfield('comments','chat_activity','service_id',$msg['service_id']);

                        if($chat_activity_status==1){
                            echo 'Typing...';
                        }else{?>
                            <span class="messeger-name"><?=$msg['full_name']?>:</span>  
                            <?php echo substr($msg['comment'],0,18);
                        
                       ?>  
                            &nbsp;...&nbsp;&nbsp;&nbsp;&nbsp;
                                   <i><?=$auth->get_time_ago2(($msg['date_commented'])); }?></i>

                
                            <?php  
                            if($totalMsg>0){
                                echo '<button class="msg-not-btn">'.$totalMsg.'</button>';
                            }

                                ?>
                            
                            

                     </div>
                     </a>
                     </div>
       <?php }}?>



  


               
                          <?Php   if(!empty($msg['job_id'])){
                                      if(!in_array($msg['job_id'], $arrjobmsg)){
                                          array_push($arrjobmsg, $msg['job_id']);


                            ?>
                            <div class=" col-md-12 msg-container "> 
    <a href="../job-details.php?job_id=<?=$msg['job_id'];?>&&user_id=<?=$user['id']?>#comment">
                                <?php $totalMsg = $auth->getTotalSpicificUreadMsg('comments','user_id','mark_as_read','job_id',$user['id'],'2',$msg['job_id']); ?>
                     <div class="alert alert-success msg-area">

                          <?php

                       $chat_activity_status = $auth->displayfield('comments','chat_activity','job_id',$msg['job_id']);

                        if($chat_activity_status==1){
                            echo 'Typing...';
                        }else{?>
                            <span class="messeger-name"><?=$msg['full_name']?>:</span>  
                            <?php echo substr($msg['comment'],0,18);
                        
                       ?>  
                            &nbsp;...&nbsp;&nbsp;&nbsp;&nbsp;
                                   <i><?=$auth->get_time_ago2(($msg['date_commented'])); }?></i>

                
                            <?php  
                            if($totalMsg>0){
                                echo '<button class="msg-not-btn">'.$totalMsg.'</button>';
                            }

                                ?>
                            
                            

                     </div>
                     </a></div>
       <?php }}?>



      
                            
               
                          <?Php   if(!empty($msg['vacancy_id'])){
                                      if(!in_array($msg['vacancy_id'], $arrvacancymsg)){
                                          array_push($arrvacancymsg, $msg['vacancy_id']);


                            ?> <div class=" col-md-12 msg-container "> 

                            <a href="../vacancy-details.php?vacancy_id=<?=$msg['vacancy_id'];?>&&user_id=<?=$user['id']?>#comment">
                                <?php $totalMsg = $auth->getTotalSpicificUreadMsg('comments','user_id','mark_as_read','vacancy_id',$user['id'],'2',$msg['vacancy_id']); ?>
                     <div class="alert alert-success msg-area"> 
 <?php $chat_activity_status = $auth->displayfield('comments','chat_activity','vacancy_id',$msg['vacancy_id']);

                        if($chat_activity_status==1){
                            echo 'Typing...';
                        }else{?>
                            <span class="messeger-name"><?=$msg['full_name']?>:</span>  
                            <?php echo substr($msg['comment'],0,18);
                        
                       ?>  
                            &nbsp;...&nbsp;&nbsp;&nbsp;&nbsp;
                                   <i><?=$auth->get_time_ago2(($msg['date_commented'])); }?></i>

                
                            <?php  
                            if($totalMsg>0){
                                echo '<button class="msg-not-btn">'.$totalMsg.'</button>';
                            }

                                ?>
                            
                            

                     </div>
                     </a></div>
       <?php }}?> 





                             
               
                          <?Php   if(!empty($msg['skill_id'])){
                                      if(!in_array($msg['skill_id'], $arrskillmsg)){
                                          array_push($arrskillmsg, $msg['skill_id']);


                            ?>
                            <div class=" col-md-12 msg-container "> 

                            <a href="../skill-details.php?skill_id=<?=$msg['skill_id'];?>&&user_id=<?=$user['id']?>#comment">
                                <?php $totalMsg = $auth->getTotalSpicificUreadMsg('comments','user_id','mark_as_read','skill_id',$user['id'],'2',$msg['skill_id']); ?>
                     <div class="alert alert-success msg-area"> 

                     <?php

                       $chat_activity_status = $auth->displayfield('comments','chat_activity','skill_id',$msg['skill_id']);

                        if($chat_activity_status==1){
                            echo 'Typing...';
                        }else{?>
                            <span class="messeger-name"><?=$msg['full_name']?>:</span>  
                            <?php echo substr($msg['comment'],0,18);
                        
                       ?>  
                            &nbsp;...&nbsp;&nbsp;&nbsp;&nbsp;
                                   <i><?=$auth->get_time_ago2(($msg['date_commented'])); }?></i>

                
                            <?php  
                            if($totalMsg>0){
                                echo '<button class="msg-not-btn">'.$totalMsg.'</button>';
                            }

                                ?>
                            
                            

                     </div>
                     </a></div>
       <?php }}?>



                                  

<?php }}?>
                        
                    
  
    <br>

