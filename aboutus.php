<?Php
session_start();
$msg = '';
$error = '';
require_once('includes/autoloader.php');
$crud = new Crud();
?>
<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Support | Benuekonnect</title>
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
<?php include('includes/header.php') ?>

<section>
     <center><span class="category-title">About&nbsp;us</span></center>
    <div class="container">
        <div class="row">
                     <div class="col-md-12 serv con">
                           
                            <div class="support">
                                <p><a href="index.php">BenueKonnect.com </a>
						 is an online advertisement platform. It is an online marketplace strictly confined to Benue State and residents of Benue State.</p>
						
						<P>Every advert you see on this platform are intended for people interested in goods and services available in Benue State only. The singular goal of BenueKonnect is to provide an avenue for buyers and sellers, service providers and consumers to easily connect with one another.</P>
						
						<p>BenueKonnect does not sell or buy anything, we only provide the services of connecting people for effective business transactions.
						</p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>



<?php include('includes/footer.php'); ?>