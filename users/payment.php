  <?php session_start();
       include('../includes/autoloader.php');

       $auth = new Auth();
       $auth->checkLogin('user');
       $result = $auth->userInfo('id', $_SESSION['user']);
       foreach ($result as $user) {

              try {
                     $referals = $auth->displayAllSpecificWithOrder('referrals', 'referral_id', $user['id'], 'date_clicked', 'DESC');
              } catch (Exception $e) {
              }

              $total_products =  $auth->getTotalSpicific('products', 'postal_id', $user['id']);
              $total_referrals = $auth->getTotalSpicific(
                     'referrals',
                     'referral_code',
                     $user['referral_code']
              );
              $total_services =  $auth->getTotalSpicific('service_categories', 'user_id', $user['id']);


       ?>

         <!DOCTYPE html>
         <html lang="en">

         <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="description" content="">
                <meta name="author" content="">
                <title>customer dashboard | Benuekonnect</title>
                <link rel="shortcut icon" href="../images/icons/bk.png" type="image/png">
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
                              <td style="width:50%"><span class="category-title text-blue">Payment
                                     </span>
                              </td>
                              <td style="width:10%;" class="msg-logout-icon" id="showheader2">
                                </td>   

                       </tr>
                </table>
         </section>
                <section>
                     
                <div class="col-sm-8">
                                     <?php include('includes/notification.php'); ?>
                                   

                              </div>
                <div class="container edit-info">
                       <div class="row">
                              <div class="col-sm-6">

                                     <p><br><br><br><img src="../images/icons/bullet.png" class="custom-bullet">&nbsp;&nbsp;<b class="text-blue">Account Number: &nbsp;</b><a href="tel:4011385735" class="text-green"><b>4011385735</b></a>
                                            </p>
                                   <p><img src="../images/icons/bullet.png" class="custom-bullet">&nbsp;<b class="text-blue">Account Name:&nbsp;&nbsp;  </b><a href="#" class="text-red"><b>Little Drops Wonders</b></a>
                                            </p>
                                    <p><img src="../images/icons/bullet.png" class="custom-bullet">&nbsp;&nbsp;<b class="text-blue">Bank Name: </b><a href="#" class="text-purple"><b>Fidelity Bank</b></a>
                                   </p><br><br>

                                    <p><b class="text-blue">Make a payment of N2,000 only to the above account, for this advert.</b></a>
                                   </p><br>
                                   <p><b class="text-blue">Kindly click the "I have paid"  button below to proceed with posting your advert. </b></a>
                                   </p><br>
                                   <p><center> <a href="allservices.php">
                                            <img src="../images/icons/I have paid.png"  style="width:45%; height: 35px">
                                     </a><br><br>
                                   </center></p>
                                   <p><b class="text-blue">You can call or send us an SMS on +2347089501430 to confirm your payment. </b></a>
                                   </p>
                              </div>
                              
                       </div>
                </div>
         </section>

         <?Php include('includes/footer.php') ?>

         <script src="../js/custom/my-adverts.js"></script>
  <?php } ?>