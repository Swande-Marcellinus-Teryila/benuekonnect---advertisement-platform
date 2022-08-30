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
     <center><span class="category-title">Support</span></center>
    <div class="container">
        <div class="row">
                     <div class="col-md-12 serv con">
                           
                            <div class="support">
                                <ol class="text-blue">
                                    <li>How do I post an advert? <br> <button class="btn btn-primary" data-toggle="collapse" data-target="#answer1" aria-expanded="false" aria-controls="collapseExample">Answer</button>

                                        <br><p class="collapse" id="answer1"> 
                                        To post an advert on BenueKonnect, you need to be a registered member.After registration you can login your account and choose an advert option you prefer, fill the required fields and then post your advert.</p></li>
                                    <li>I can't remember my password. <br><button class="btn btn-primary" data-toggle="collapse" data-target="#answer2" aria-expanded="false" aria-controls="colla">Answer</button> <p class="collapse" id="answer2">Click on the forget password button from the login page to reset your password.</p>
                                    <li>I can't login to my account. <br><button class="btn btn-primary" data-toggle="collapse" data-target="#answer3" aria-expanded="false" aria-controls="colla">Answer</button>
                                        <p class="collapse" id="answer3">I. Check your network connection. <br>II. Make sure you type-in the correct password. <br>III. Try the forget password option on the login page. <br>IV. Contact us via email to assist you.</p></li>
                                    <li>I will like to change the phone number on my account <br><button class="btn btn-primary" data-toggle="collapse" data-target="#answer4" aria-expanded="false" aria-controls="collape">Answer</button> <p class="collapse" id="answer4">Go to Edit profile page by clicking the Edit profile button on your dashboard and select the option to change phone number.</p> </li>
                                    <li>I posted an advert but I cannot find it among the adverts on BenueKonnect. <br><button class="btn btn-primary" data-toggle="collapse" data-target="#answer5" aria-expanded="false" aria-controls="collapse">Answer</button>
                                        <p class="collapse" id="answer5">Bear in mind that it takes a maximum of 6 hours for your advert to go public. <br>I. Check from "My Adverts" on your dashboard to see if the advert is active or not. <br>II. If you opted for a paid advert, or you sponsored your advert, it is possible that your payment has not been confirmed yet. In such a case, you will have to contact us via email, or contact our customer care personels to expedite the process of payment confirmation and advert publishing.</p> </li>
                                    <li>I want to remove an advert I posted. <br><button class="btn btn-primary" data-toggle="collapse" data-target="#answer6" aria-expanded="false" aria-controls="collapseExample">Answer</button> <p class="collapse" id="answer6">Simply login your account, click on "My Adverts", locate the particular advert and hit the delete icon underneath it.</li>
                                    
                                    <li>I want to close my account with BenueKonnect. <br><button class="btn btn-primary" data-toggle="collapse" data-target="#answer66" aria-expanded="false" aria-controls="collapseExample">Answer</button> <p class="collapse" id="answer66">Contact us via email with or without a reason for wanting to leave BenueKonnect, and we will grant your wishes as soon as possible.</p></li>

                                    <li>I want to change the address I provided on BenueKonnect. <br><button class="btn btn-primary" data-toggle="collapse" data-target="#answer7" aria-expanded="false" aria-controls="collapseExample">Answer</button> 
                                        <p class="collapse" id="answer7">Go to Edit profile by clicking the Edit profile button on your dashboard and select the option to change address.</p></li>
                                    
                                    <li>I no longer want to sell my property but the advert is still on BenueKonnect and people are still calling me. <br><button class="btn btn-primary" data-toggle="collapse" data-target="#answer8" aria-expanded="false" aria-controls="collapseExample">Answer</button> <p class="collapse" id="answer8">I. Simply login your account, click on My Adverts, locate the particular advert and select deactivate, or better still, delete the advert completely. <br>II. If the first option didn't solve the problem, contact us via email to help you out ASAP.</p></li>

                                    <li>Someone is insisting I send money first before he/she sends the goods. <br><button class="btn btn-primary" data-toggle="collapse" data-target="#answer9" aria-expanded="false" aria-controls="collapseE">Answer</button><p class="collapse" id="answer9">We will advise that you don't try that at all. Always pay at the point of collecting what you are paying for. BenueKonnect doesn't know anyone on this platform any more than you know them.</li>
                                    
                                    <li>How do I share my advert to family and friends? <br><button class="btn btn-primary" data-toggle="collapse" data-target="#answer10" aria-expanded="false" aria-controls="collapseExample">Answer</button> <p class="collapse" id="answer10">To share your advert with family and friends simply click the share icon beside the advert, and select the social media platforms you intend to use for sharing your advert.</li></li>
                                </ol>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>



<?php include('includes/footer.php'); ?>