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
             if($_SERVER['REQUEST_METHOD']=='POST'){
          $msg = $auth->insertProduct($_POST, $_FILES);
        }
            
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
                                                        <h5 class="alert alert-success">POST A PRODUCT</h5>
                                                        <?php if($msg){?> <br><br>
                                                            <div class="alert alert-success fa fa-check"> <?=$msg?></div>
                                                        <?php } if($error){?><br><br>
                                                            <div class="alert alert-danger" id="danger_alert"><i class="fa fa-close"></i> <?=$error?></div>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="card-block">
                                                        <form class="form-material" method="post" id="addproduct" enctype="multipart/form-data">
                                                            <div class="form-group form-success">
                                                                <select class="form-group form-control" id="category" required="required" name="category_id">
                                                                <option>-Select Category-</option>
                                                                </select>
                                                                
                                                            </div>
                                                             <div class="form-group form-success" id="subcategory">
                                                                <select class="form-group form-control" id="selectsubcategory" name="subcategory_id"> 
                                                                <option>-Select Sub-Category-</option>
                                                                </select>
                                                                
                                                            </div>
                                                            <div class="form-group form-success">
                                                                <input type="text" name="product_name" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Product Name</label>
                                                            </div>
                                                            <div class="form-group form-success">
                                                               <textarea class="form-control" name="description" required="required"></textarea>
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Product Description</label>
                                                            </div>
                                                            <div class="form-group form-success" title="">
                                                                <input type="hidden" name="postal_id" value="<?=$admin['id']?>">
                                                                <input type="number" name="original_price" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Original Price(&#x20A6;)</label>
                                                            </div>
                                                            <div class="form-group form-success">
                                                                <input type="number" name="selling_price" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Selling Price(&#x20A6;)</label>
                                                            </div>
                                                            <div class="form-group form-success">product Photo
                                                                <input type="file" name="photo" class="form-control" required="">
                                                                
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

<?php }?>