    <?php if(isset($_GET['id'])){
        $id = $_GET['id'];
        session_start();
         include('../includes/autoloader.php');
         $msg = '';
         $error = '';
      try{   
        $auth = new Auth();
        $auth->checkLogin('adminlogins');
        $result = $auth->userInfo('id',$_SESSION['adminlogins']);
       

        if(isset($_POST['edit'])){
          $msg = $auth->updateCategory($_POST,$_FILES);
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
                                                        <h5 class="alert alert-success k">Edit Category</h5>
                                                        <?php if($msg){?> <br><br>
                                                            <div class="alert alert-success fa fa-check"> <?=$msg?></div>
                                                        <?php } if($error){?><br><br>
                                                            <div class="alert alert-danger fa fa-close"> <?=$error?></div>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="card-block">
                                                        <form class="form-material" method="post" id="addcategory" enctype="multipart/form-data">
                                                          <?php try{
                                                    $results = $auth->displayAllSpecific('category','id',$id);
                                                                foreach($results as $result){
                                                    ?>

                                                            <div class="form-group form-success">
                                                                <input type="text" name="category" class="form-control" required="" value="<?=$result['category']?>">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Category Name</label>
                                                            </div> 
                                                            <div class="form-group form-success">
                                                                 <label class="">Attach Icon</label>
                                                                <input type="file" name="photo" class="form-control">
                                                                <input type="hidden" name="id" value="<?=$id?>">
                                                                
                                                               
                                                            </div>
                                                         
                                     <button type="submit" class="btn btn-primary" id="submit" name="edit"> <i class="fa fa-plus"></i>Edit</button>

                                                        </form>
                                                    <?php }}catch(Exception $e){
                                                        header('location:index.php');
                                                    }?>
                                                        
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

<?php }}else{
    header("location:index.php");
}?>