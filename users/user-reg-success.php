<?php

if($_SERVER['REQUEST_METHOD']=='POST'){

?>
<?Php  include('includes/header.php');?>
 

  

  <!-- why us section -->

  <section class="why_us_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
      </div>
      <div class="row">
        <div class="col-md-4 col-sm-3 col-lg-3">
          
        </div>
        <div class="col-md-6">
          <div class="box ">
            <div class="img-box">
            </div>
            <div class="detail-box ">
              <div class="alert alert-success">
                <?php 
                require_once('../includes/autoloader.php');
                $crud = new Crud();
               try{$crud->insertUser($_POST, $_FILES)?>
            <?php echo 'Congratulations,'.ucfirst($_POST['surname']).' your registration is successfully'; ?>
          </div>
            <div class="login">
              <a href="#" class="btn btn-default  btn-xs " data-toggle="modal"  data-target="#myModal">login</a>
    &nbsp;  &nbsp;  &nbsp;  &nbsp;  

             <?Php }catch(Exception $e){?>
              <div class="alert alert-danger"> 
                <?php echo $e->getMessage();?>
              </div> <?php }?>


             
          </div>
          </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="box ">
            <div class="img-box">
              <img src="images/w3.png" alt="">
            </div>
            <div class="detail-box">
            |&nbsp;
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end why us section -->


 <?php include('includes/user-login-modal.php') ?>

  <!-- end info_section -->
  <?php include('includes/footer.php'); ?>
<?php }else{ header('location:create-account.php');
} ?>

  




















































