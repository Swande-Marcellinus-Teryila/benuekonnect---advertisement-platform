     <?php session_start();
         include('../includes/autoloader.php');
         $msg = '';
         $error = '';
      try{   
        $auth = new Auth();
        $auth->checkLogin('adminlogins');
        $result = $auth->userInfo('id',$_SESSION['adminlogins']);
        $products = $auth->displayAll('products');
       $categories = $auth->displayAll('category');

        if($_SERVER['REQUEST_METHOD']=='POST'){
          $msg = $auth->insertServiceCategory($_POST);
        }
       }catch(Exception $e){
        $error = $e->getMessage();

       }

        foreach ($result as $admin) { ?>
     
        <?php include('includes/dashboard-header.php');?>
        <?php include('includes/leftbar.php'); ?>
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <!-- task, page, download counter  start -->
                                          
                                         
                                    
                                         
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="alert alert-success k">Add Services Category</h5>
                                                        <?php if($msg){?> <br><br>
                                                            <div class="alert alert-success fa fa-check"> <?=$msg?></div>
                                                        <?php } if($error){?><br><br>
                                                            <div class="alert alert-danger" id="danger_alert"><i class="fa fa-close"></i> <?=$error?></div>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="card-block">
                                                        <form class="form-material" method="post" id="addcategory" enctype="multipart/form-data">
                                                             
                                                          
                                                            <div class="form-group form-success">
                                                                <input type="text" name="service_category" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Service Category</label>
                                                            </div> 
                                                         
                                                             <button type="submit" class="btn btn-primary" class="form-control" id="submit"> <i class="fa fa-plus"></i> Add</button>

                                                        
                                                        </form>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        
                                           
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
  <?php include_once('includes/admin-footer.php');?>
 

<?php }?>s