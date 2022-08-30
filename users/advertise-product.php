 <?php session_start();
        $msg ='';
        $error = '';
         include('../includes/autoloader.php');
try{
        $auth = new Auth();
        $auth->checkLogin('user');
        $result = $auth->userInfo('id',$_SESSION['user']);
        $categories = $auth->displayAll('category');
        if($_SERVER['REQUEST_METHOD']=='POST'){
          $msg=$auth->insertProduct($_POST, $_FILES);
           
        }
       }catch(Exception $e){
        $error= $e->getMessage();
       }
        foreach ($result as $user) { ?>
        <?php include('includes/header.php');?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 padding-right">
                    <!-- beginning of categories -->
                    <div class="features_items">
                        <!--features_items-->
                        <div>
                            <div class="title text-center" style="display: flex;">
                                <div style="width:30%">&nbsp;</div>
                                <div style="background-color:blue; color:white; width:50%; text-align: center; font-size:20px;">Dashboard
                                </div>

                                <div style="width:20%" class="saved-adverts-icon">
                                    <img src="../images/icons/red-msg.jpg">


                                </div>
                            </div><br>
                            <div class="logout-icon"><img src="../images/icons/login.jpg"> <a href="logout.php">Logout
                                    &nbsp;&nbsp;&nbsp;&nbsp;</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="serv">
                    <div class="sform">
                        <h4 class="ps">Looking for a Category?</h4>
                        <p class="note">*Fill the form and click POST when you are done.</p>
                        <?php include('includes/returnmsg.php'); ?>
                          <form class="form-material" method="post" id="addproduct" enctype="multipart/form-data">
                                                            <div class="form-group form-success">
                                                                <select class="form-group form-control" id="category" required="required" name="category_id">
                                                                
                                                                </select>
                                                                
                                                            </div>
                                                             <div class="form-group form-success" id="subcategory">
                                                                <select class="form-group form-control" id="selectsubcategory"  name="subcategory_id">   
                                                                </select>
                                                                
                                                            </div>
                                                            <div class="form-group form-success">
                                                                <label class="float-label">Product Name</label>
                                                                <input type="text" name="product_name" class="form-control" required="" pl>
                                                                <span class="form-bar"></span>
                                                                
                                                            </div>
                                                            <div class="form-group form-success">
                                                                 <label class="float-label">Product Description</label>
                                                               <textarea class="form-control" name="description" required="required"></textarea placeholder="Product Description">
                                                                <span class="form-bar"></span>
                                                               
                                                            </div>
                                                            <div class="form-group form-success" title="">
                                                                 <label class="float-label">Original Price(&#x20A6;)</label>
                                                                <input type="hidden" name="postal_id" value="<?=$user['id']?>">
                                                                <input type="number" name="original_price" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                               
                                                            </div>
                                                            <div class="form-group form-success">
                                                                  <label class="float-label">Selling Price(&#x20A6;)</label>
                                                                <input type="number" name="selling_price" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                              
                                                            </div>
                                                            <div class="form-group form-success">product Photo
                                                                <input type="file" name="photo" class="form-control" required="">
                                                                
                                                            </div>
                                                             <button type="submit" class="btn btn-primary" class="form-control" id="submit"> <i class="fa fa-plus"></i> Add</button>
                                                        
                                                        </form>
                    </div>
                </div>

            </div>
    </section>

    <section style="margin-bottom: 90px; margin-top:15px">
        <div class="share-buttons col-md-12">
            <ul>
                <li>Share BenueKonnect on </li>
                <li> <i class="fa fa-whatsapp"></i>
                    <i class="fa fa-facebook"></i>
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-instagram"></i>
                </li>
            </ul>
        </div>
    </section>
    
<?php include('../includes/footer.php');?>
<script src="../js/custom/addproduct.js"></script>
<?php } ?>
