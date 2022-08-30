        <?php session_start();
        $msg = '';
         $error = '';
         include('../includes/autoloader.php');
        $auth = new Auth();
        $auth->checkLogin('adminlogins');
         $result = $auth->userInfo('id',$_SESSION['adminlogins']);
        $products = $auth->displayAllWithOrder('products','id','ASC');
        if(isset($_POST['approve_all'])){
            if($auth->updateAll('products','status','1')){
                $msg ="All Ads Approved";
            }else{
                $error="Sorry something went wrong, try again";
            }
        }
       
        foreach ($result as $admin) { ?>
     
        <?php include('includes/dashboard-header.php');?>
        <?php include('includes/leftbar.php'); ?>
                      <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="col-lg-12 col-sm-12 col-md-12">


                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="alert alert-success">View Products</h5>
                                                <h5 class="alert alert-primary">
                                                    <form method="post">
                                                        <input type="submit" class="btn btn-primary" name="approve_all" value="Approve All">
                                                    </form>
                                                    </h5>
                                                <span id="showMessage">&nbsp;
                                                    <?php include("../includes/returnmsg.php"); ?>
                                                </span>
                                                <div class="card-header-right">
                                                    <ul class="list-unstyled card-option">
                                                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                                        <li><i class="fa fa-trash close-card"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-block table-border-style ">
                                                <div class="table-responsive ">
                                                    <table class="table table-hover table-bordered">
                                                        <thead>
                                                            <tr>
                                                                
                                                                <th>S/N</th>
                                                                <th>Category</th>
                                                                <th>Product Name</th>
                                                                <th>Authour</th>
                                                                <th>Price</th>
                                                                <th>Status</th>
                                                                <th><i class="fa fa-money"> </i> Approve Payments</th>
                                                                
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                           
                                                            <tr>
                                                                 <?php $i=1; foreach($products as $data){ ?>
                                                                <td><?=$i ?></td>
                                                                <td><?php try{$sub = $auth->displayField('category','category','id',$data['category_id']);
                                                                echo $sub;}Catch(Exception  $e){
                                                                    
                                                                }?>
                                                                    
                                                                </td>
                                                               
                                                                <td><?=$data['product_name']?></td>
                                                                 <td>
                            <?php try{

                        $userdata = $auth->displayAllSpecific('users','id',$data['postal_id']);

                             if(is_array($userdata)){
                            foreach ($userdata as $user) {
                                                            echo $user['full_name'];
                                                        }
                                        }
                                    }catch(Exception $e){
                                        echo $e->getMessage();
                                    }
                                    ?></td>

                                        <td>&#x20A6; <?= number_format($data['selling_price'])?></td>
                                        <td><?php if($data['status']=='0'){
                                            echo'<i class="text text-danger">unapproved</i>';
                                        }else{ echo'<i class="text text-success">approved</i>';
                                                }?>
                                            
                                        </td>
                                          <td> 
                                            <?php
                                            if($data['sponsored_post_status']==1){
                                             if($data['approved_sponsored_status']=='0'){
                            
                                            echo'<button class="btn btn-success fa fa-check" onclick="approve_payment('.$data['id'].')" >Approve Payment</button>';
                                        }else{ echo'<button class="btn btn-danger" onclick="disapprove_payment('.$data['id'].')">disapprove Payment</button>';
                                                }
                                            }else{
                                                echo ' <i class="fa fa-dot-circle-o text text-danger">Not applied</i>';
                                            }
                                        ?>
                                        

                                        </td>
                                        <td> 
                                            <?php if($data['status']=='0'){
                                            echo'<button class="btn btn-success fa fa-check" onclick="approve('.$data['id'].')" >approve Post</button>';
                                        }else{ echo'<button class="btn btn-danger" onclick="disapprove('.$data['id'].')">disapprove Post</button>';
                                                }?>


                            &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
                            <a href="all-users.php" onclick="edit(<?Php echo htmlentities($data['id'])?>)"><i class="fa fa-edit btn btn-primary" title="Edit Record">Edit </i>  </a>



                            &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
                            <button  onclick="delete(<?Php echo htmlentities($data['id'])?>)" class="btn btn-danger"><i class="fa fa-trash" title="Delete data"> </i> </button>
                                                                </td>

                                                               
                                                            </tr>
                                                            
                                                            <?php $i+=1;}?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Hover table card end -->
                                           
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
    <div class="ie-warning">
        <h1>Warning!!</h1>
        <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
        <div class="iew-container">
            <ul class="iew-download">
                <li>
                    <a href="http://www.google.com/chrome/">
                        <img src="assets/images/browser/chrome.png" alt="Chrome">
                        <div>Chrome</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.mozilla.org/en-US/firefox/new/">
                        <img src="assets/images/browser/firefox.png" alt="Firefox">
                        <div>Firefox</div>
                    </a>
                </li>
                <li>
                    <a href="http://www.opera.com">
                        <img src="assets/images/browser/opera.png" alt="Opera">
                        <div>Opera</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.apple.com/safari/">
                        <img src="assets/images/browser/safari.png" alt="Safari">
                        <div>Safari</div>
                    </a>
                </li>
                <li>
                    <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                        <img src="assets/images/browser/ie.png" alt="">
                        <div>IE (9 & above)</div>
                    </a>
                </li>
            </ul>
        </div>
        <p>Sorry for the inconvenience!</p>
    </div>
    <![endif]-->
    <!-- Warning Section Ends -->
  <?php include_once('includes/admin-footer.php');?>
  <script>
      function approve(id){
        $.post('requests/update-requests.php',{
            approvepost:'approvepost',
            table:'products',
            updatecolumn:'status',
            column_id:'id',
            item:'1', 
            id:id

        },function(data,status){
            $("#showMessage").html(data);
            $("#showMessage").hide(400);
            window.location.assign(window.location.href);

        }); 

      }

      function disapprove(id){
        $.post('requests/update-requests.php',{
            disapprovepost:'approvepost',
            table:'products',
            updatecolumn:'status',
            column_id:'id',
            item:'0', 
            id:id

        },function(data,status){
            $("#showMessage").html(data);
            $("#showMessage").hide(1000);
            window.location.assign(window.location.href);

        }); 

      }

      /* payments */
       function approve_payment(id){
        $.post('requests/update-requests.php',{
            approvepost:'approvepost',
            table:'products',
            updatecolumn:'approved_sponsored_status',
            column_id:'id',
            item:'1', 
            id:id

        },function(data,status){
            $("#showMessage").html(data);
            $("#showMessage").hide(400);
            window.location.assign(window.location.href);

        }); 

      }

      function disapprove_payment(id){
        $.post('requests/update-requests.php',{
            disapprovepost:'approvepost',
            table:'products',
            updatecolumn:'approved_sponsored_status',
            column_id:'id',
            item:'0', 
            id:id

        },function(data,status){
            $("#showMessage").html(data);
            $("#showMessage").hide(1000);
            window.location.assign(window.location.href);

        }); 

      }
  </script>

<?php } ?>