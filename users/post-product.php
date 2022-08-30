        <?php session_start();
        $msg ='';
        $error = '';
         include('../includes/autoloader.php');
try{
        $auth = new Auth();
        $auth->checkLogin('user');
        $result = $auth->userInfo('id',$_SESSION['user']);
        $categories = $auth->displayAll('category');
        if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['post_btn'])){
          $msg=$auth->insertProduct($_POST, $_FILES);
           
        }
       }catch(Exception $e){
       	$error= $e->getMessage();
       }
        foreach ($result as $user) { ?>
    
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Advertise a product | Benuekonnect</title>
        <link rel="shortcut icon" href="../images/icons/bk.png" type="image/png">
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/price-range.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
        <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    </head>
    <!--/head-->
        
        <!DOCTYPE html>
       <html lang="en">

       <head>
              <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <meta name="description" content="">
              <meta name="author" content="">
              <title>Post product| Benuekonnect</title>
              <link href="../css/bootstrap.min.css" rel="stylesheet">
              <link href="../css/font-awesome.min.css" rel="stylesheet">
              <link href="../css/prettyPhoto.css" rel="stylesheet">
              <link href="../css/price-range.css" rel="stylesheet">
              <link href="../css/animate.css" rel="stylesheet">
              <link href="../css/main.css" rel="stylesheet">
              <link href="../css/responsive.css" rel="stylesheet">
              <link href="../css/custom.css" rel="stylesheet">
              <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
              <link rel="shortcut icon" href="images/ico/favicon.ico">
              <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
              <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
              <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
              <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
       </head>
       <!--/head-->
<?php include('includes/header.php') ?>
        <section>
                      <br>
<table cellpadding="0" border="0" style="width:100%" class="table">
                       <tr>
                              <td style="width:40%">&nbsp;</td>
                              <td style="width:50%"><span class="category-title text-blue">Post&nbsp;Advert
                                     </span>
                              </td>
                              <td style="width:10%;" class="msg-logout-icon" id="showheader2">
                                </td>   

                       </tr>
                </table>
         </section>

<section>
<div class="container">
<div class="row">
<div class="serv">
<div class="sform">
<h4 class="ps">Want to advertise a product?</h4>
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
<input type="hidden" name="user_id" value="<?=$user['id']?>">

</div>
<div class="form-group form-success">
<label class="float-label">Product Name</label>
<input type="text" name="product_name" class="form-control" required="">
<span class="form-bar"></span>

</div>
<div class="form-group form-success">
 <label class="float-label">Product Description</label>
<textarea class="form-control" name="description" required="required"></textarea placeholder="Product Description">
<span class="form-bar"></span>

</div>
<div class="form-group form-success">
  <label class="float-label">Product Status</label>
  <select class="fs" name="product_state">
    <option value="Used">Used</option>
    <option value="Foriegn Use">Foriegn Used</option>
    <option value="New ">New</option>
      
  </select>

</div>
<label><i class="fa fa-map-marker"></i> Location*</label>
                        <select class="fs" name="town" required="">
                            <option value="...">Location</option>
                            <option value="Ado">Ado</option>
                            <option value="Agatu">Agatu</option>
                            <option value="Apa">Apa</option>
                            <option value="Buruku">Buruku</option>
                            <option value="Gboko">Gboko</option>
                            <option value="Guma">Guma</option>
                            <option value="Gwer-East">Gwer-East</option>
                            <option value="Gwer-West">Gwer-West</option>
                            <option value="Katsina-Ala">Katsina-Ala</option>
                            <option value="Konshisha">Konshisha</option>
                            <option value="Kwande">Kwande</option>
                            <option value="Logo">Logo</option>
                            <option value="Makurdi">Makurdi</option>
                            <option value="Obi">Obi</option>
                            <option value="Ogbadibo">Ogbadibo</option>
                            <option value="Ohimini">Ohimini</option>
                            <option value="Oju">Oju</option>
                            <option value="Okpokwu">Okpokwu</option>
                            <option value="Otukpo">Otukpo</option>
                            <option value="Tarka">Tarka</option>
                            <option value="Ukum">Ukum</option>
                            <option value="Ushongo">Ushongo</option>
                            <option value="Vandeikya">Vandeikya</option>
                        </select>

<div class="form-group form-success">
  <label class="float-label">Selling Price(&#x20A6;)</label>
<input type="number" name="selling_price" class="form-control" required="">
<span class="form-bar"></span>

</div>
<div class="form-group form-success">Product Photo1
<input type="file" name="photo" class="form-control">

</div>
<div class="form-group form-success">Product Photo2
<input type="file" name="photo2" class="form-control" >

</div>
<div class="form-group form-success">Product Photo3
<input type="file" name="photo3" class="form-control">

</div>
<button type="submit" class="btn btn-primary" class="form-control" id="submit" name="post_btn">POST</button>

</form>

</div>
</div>
</div>
    				</div>
			</div>
		</div>
	</section>
	<?php include('includes/footer.php'); ?>
	<script src="../js/custom/addproduct.js"></script>
		<?php } ?>

	
	