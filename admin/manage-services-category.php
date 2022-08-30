        <?php session_start();
         include('../includes/autoloader.php');
        $auth = new Auth();
        $auth->checkLogin('adminlogins');
         $result = $auth->userInfo('id',$_SESSION['adminlogins']);
        $categorys = $auth->displayAllWithOrder('service_categories','service_category','ASC');
       
        foreach ($result as $admin) { 

if(isset($_POST['approve_btn'])){
        try {
            $query = "UPDATE category SET status=? WHERE id=?";
            $data =array('1',$_POST['id']);
            $auth->update($query,$data);
            $msg ="Category published successfully";
        } catch (\Throwable $th) {
            $error = $th->getMessage();
        }
    }

        if(isset($_POST['disapprove_btn'])){
        try {
            $query = "UPDATE category SET status=? where id=?";
            $data =array('0',$_POST['id']);
            $auth->update($query,$data);
            $msg ="Category blocked successfully";
        } catch (\Throwable $th) {
            $error = $th->getMessage();
        }
    }

           if(isset($_POST['delete'])){
        try {
           
            $auth->deleteSpecific('service_categories','id',$_POST['id']);
            $msg= "Deleted successfully";
        } catch (\Throwable $th) {
            $error = $th->getMessage();
        }
    }


            ?>
     
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
                                                <h5 class="alert alert-success">Manage Job Category</h5>
                                                <span id="showMessage">&nbsp;</span>
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
                                                                <th>Category Name</th>
                                                                <th>Date created</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                           
                                                            <tr>
                                                         <?php $i=1; foreach($categorys as $data){ ?>
                                                                <td><?=$i ?></td>
                                                                <td><?=$data['service_category']?>
                                                                    
                                                                </td>
                                                               
                                                        
                                                                 <td>
                                                                    <?= $auth->get_time_ago($data['date_created']);?>
                                                                    </td>



       <td>
                            
                            <a href="edit-services-category.php?cat_id=<?=$data['id']?>"><i class="fa fa-edit btn btn-primary" title="Edit Record">Edit </i> </a>


                            <br><br>
                            
                            <form method="post">
               <input type="submit" value="Delete" name="delete" class="btn btn-danger">
               <input type="hidden" name="id" value="<?=$data['id']?>">
           </form>
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
  

  </script>

<?php } ?>