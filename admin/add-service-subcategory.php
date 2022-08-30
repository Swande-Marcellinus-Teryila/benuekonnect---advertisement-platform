    <?php session_start();
         include('../includes/autoloader.php');
         $msg = '';
         $error = '';
      try{   
        $auth = new Auth();
        $auth->checkLogin('adminlogins');
       $result = $auth->userInfo('id',$_SESSION['adminlogins']);
        $products = $auth->displayAll('products');
       $categories = $auth->displayAll('service_categories');

        if($_SERVER['REQUEST_METHOD']=='POST'){
          $msg = $auth->insertServiceSubcategory($_POST);
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
                                                        <h5 class="alert alert-success k">Add Service Subcategory</h5>
                                                        <?php if($msg){?> <br><br>
                                                            <div class="alert alert-success fa fa-check"> <?=$msg?></div>
                                                        <?php } if($error){?><br><br>
                                                            <div class="alert alert-danger" id="danger_alert"><i class="fa fa-close"></i> <?=$error?></div>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="card-block">
                                                        <form class="form-material" method="post" id="addcategory" enctype="multipart/form-data">
                                                             <div class="form-group form-success">

                                                                <select class="form-group form-control"  required="required" name="category_id">
                                                                    <option value="...">-Select Category</option>
                                                                    <?php foreach ($categories as $category) {?>
                                                                        <option value="<?=$category['id']?>">
                                                                            <?=$category['service_category']?></option>
                                                                       
                                                                    <?php }?>
                                                                    <label class="float-label">main category</label>
                                                                </select>
                                                                
                                                            </div>
                                                         
                                                            <div class="form-group form-success">
                                                                <input type="text" name="subcategory" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">subcategory Name</label>
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
  <script>
      
    $("#showsubcategory").hide();
    
      $.post('requests/check-service-subcategory.php',{showcategory:'showcategory'

        },function(data,status){
            $("#category").html(data);
         
        });    

   $("#category").change(function(){
        let category_id =  $("#category").val();
        $.post('requests/check-service-subcategory.php',{check_subcategory:category_id

        },function(data,status){

            if(data=='true'){
                $("#showsubcategory").show(500);
                    $.post('requests/check-service-subcategory.php',{mysubcategory:category_id, category_id:category_id
                    
        },function(data,status){
            $("#showsubcategory").append(data);
        });

            }else{
                $("#showsubcategory").hide(500);
            }
        });
      }); 
   $("#submit").click(function(){
    setTimeout(function() {
     $("#addproduct").submit();
    }, 500);
   });
   
        $("#danger_alert").click(function(){
            $("#danger_alert").hide(1000);
        });

  </script>

<?php }?>