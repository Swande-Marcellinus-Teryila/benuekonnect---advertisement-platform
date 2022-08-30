        <?php session_start();
         include('../includes/autoloader.php');
         $msg="";
         $error ="";
        $auth = new Auth();
        $auth->checkLogin('adminlogins');
        $result = $auth->userInfo('id',$_SESSION['adminlogins']);
        foreach ($result as $admin) { 
try{
if(isset($_POST['approve_all'])){
            $auth->updateAll('products','status','1');
             $auth->updateAll('job','status','1');
              $auth->updateAll('skills','status','1');
               $auth->updateAll('services','status','1');
                $auth->updateAll('vacancy','status','1');
                $msg = "All ads approved";
            
        
    }}catch(Exception $e){
        $error = "Please try again, something went wrong";
            
        } ?>
     
        <?php include('includes/dashboard-header.php');?>
        <?php include('includes/leftbar.php'); ?>
                      <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <!-- task, page, download counter  start -->
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                  <?php include("../includes/returnmsg.php"); ?>
                                                    <div class="card-footer bg-c-purple">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0">

                                                    <form method="post">
                                                        <input type="submit" class="btn btn-danger" name="approve_all" value="Approve All Posts">
                                                    </form>
                                                    

                                                                    </p>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                
                                                            </div>
                                                        </div>
            
                                                    </div>
                                                </div>
                                            </div>
                                             
                                           
                                             <div class="col-xl-3 col-md-6">
                                               
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