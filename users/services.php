  <?php session_start();
       include('../includes/autoloader.php');
       $error = "";
       $msg = "";
       $auth = new Auth();
       $auth->checkLogin('user');
       $result = $auth->userInfo('id', $_SESSION['user']);
       foreach ($result as $user) {

              try {
                     $referals = $auth->displayAllSpecificWithOrder('referrals', 'referral_id', $user['id'], 'date_clicked', 'DESC');
              } catch (Exception $e) {
              }

              try {
                     if (isset($_POST['post_btn'])) {

                           $msg =$auth->insertService($_POST);
                           echo '<script>alert("success");</script>';
                           
                     }
              } catch (Exception $e) {
                     $error = $e->getMessage();
              }



       ?>

         
        <!DOCTYPE html>
       <html lang="en">

       <head>
              <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <meta name="description" content="">
              <meta name="author" content="">
              <title>Services | Benuekonnect</title>
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
                              <td style="width:50%"><span class="category-title text-blue">Post&nbsp;Services
                                     </span>
                              </td>
                              <td style="width:10%;" class="msg-logout-icon" id="showheader2">
                                </td>   

                       </tr>
                </table>
         </section>
                            <center><?php include('includes/returnmsg.php');?></center>
                              <div class="sform text-blue">
                                   
                                     <h4 class="ps text-blue">Post Service</h4>
                                     <p class="note text-blue">*Fill the form and click POST when you are done.</p>
                                     <form method="post" action="">
                                          <input type="hidden" name="user_id" value="<?=$user['id']?>">
                                            <select class="fs" name="service_cat_id" onchange="showSubCat(this.value)">
                                                   <option value="...">Select Service category</option>

                                                   <?Php try {
                                                               $services = $auth->displayAllSpecific('service_categories', 'status', 1);
                                                               foreach ($services as $service) { ?>
                                                                 <option value="<?= $service['id'] ?>"><?= $service['service_category']; ?></option>

                                                   <?Php }
                                                        } catch (Exception $e) {
                                                               echo $e;
                                                        } ?>
                                            </select><br>
                                           
                                            <br>
                                            <label>Please Enter Your Name</label>
                                             <input type="text" name="stage_name" placeholder="Your name" class="fs">
                                                   <option value="...">Your Location</option><br>
                                            <select class="fs" name="location">
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

                                            <select class="fs" name="place_to_serve">
                                                   <option value="...">I can come to</option>
                                                   <option value="Any LGA">Any local Government</option>
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
                                            <label class="">Service Description</label>
                                            <textarea class="fs" name="description" placeholder="Service Description" 
                                           >
                                                   
                                            </textarea>
                                            <button name="post_btn" class="butt">POST</button>
                                     </form>
                            
                              </div>
                       </div>

                </div>
         </section>
<section>
                  <div class="col-md-12">
              <?php include("includes/share.php"); ?>
       </div>
      <br><br>
</section>
<br><br><br><br><br><br><br><br>
  <?php include('includes/footer.php');
       } ?>
  <script>
       $("#subcat").hide();
       function showSubCat(catid){

       $.post('requests/api.php',{'service_cat_id':catid},function(data,status){
             if(data!="false"){ 
              $("#subcat").show(200);
              $("#subcat").html(data);
                      }else{
                            $("#subcat").hide(200);
                      }
       }  );
}
      

  </script>