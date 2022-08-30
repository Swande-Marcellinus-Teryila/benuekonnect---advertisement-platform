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
                            $msg = $auth->insertJob($_POST);
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
                <title>upload jobs dashboard | Benuekonnect</title>
                <link href="../css/bootstrap.min.css" rel="stylesheet">
                <link href="../css/font-awesome.min.css" rel="stylesheet">
                <link href="../css/prettyPhoto.css" rel="stylesheet">
                <link href="../css/price-range.css" rel="stylesheet">
                <link href="../css/animate.css" rel="stylesheet">
                <link href="../css/main.css" rel="stylesheet">
                <link href="../css/responsive.css" rel="stylesheet">
                <link href="../css/custom.css" rel="stylesheet">
                <link rel="shortcut icon" href="../images/icons/bk.png" type="image/png">
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
                <section>
                      <br>
<table cellpadding="0" border="0" style="width:100%" class="table">
                       <tr>
                              <td style="width:40%">&nbsp;</td>
                              <td style="width:50%"><span class="category-title text-blue">Post&nbsp;a&nbsp;job
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
                                            <h4 class="ps">Looking for a job?</h4>
                                            <p class="note">*Fill the form and click POST when you are done.</p>
                                            <?php include('includes/returnmsg.php'); ?>
                                            <form method="post" action="">

                                                   <select class="fs" name="job">
                                                          <option value="...">Select job category</option>

                                                          <?Php try {
                                                                      $jobs = $auth->displayAllSpecific('job_categories', 'status', 1);
                                                                      var_dump($jobs);
                                                                      foreach ($jobs as $job) { ?>
                                                                        <option value="<?= $job['id'] ?>"><?= $job['job_category']; ?></option>

                                                          <?Php }
                                                               } catch (Exception $e) {
                                                               } ?>
                                                   </select><br>
                                                    <label>Please Enter Your Name</label>
                                             <input type="text" name="stage_name" placeholder="Your name" class="fs">
                                                   <select class="fs" name="location">
                                                          <option value="...">Your Location</option>
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

                                                   <select class="fs" name="place_to_work">
                                                          <option value="...">I can work in</option>
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
                                                   <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                                   <label>Job Description</label><textarea placeholder="Job Description" value="Job Description" name="description">

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
</section>

  <?php include('includes/footer.php');
       } ?>