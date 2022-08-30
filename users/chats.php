
   <?php session_start();
  $msg ="";
  $error = "";
    include('../includes/autoloader.php');
   

    $auth = new Auth();
    $auth->checkLogin('user');
    $result = $auth->userInfo('id', $_SESSION['user']);
    foreach ($result as $user) {?>
<!DOCTYPE html>
         <html lang="en">

         <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="description" content="">
                <meta name="author" content="">
                <title>My messages| Benuekonnect</title>
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
    <?php include('includes/header.php'); ?>
           <section>
                      <br>
<table cellpadding="0" border="0" style="width:100%" class="table">
                       <tr>
                              <td style="width:40%">&nbsp;</td>
                              <td style="width:50%"><span class="category-title text-blue">Messages
                                     </span>
                              </td>
                              <td style="width:10%;" class="msg-logout-icon" id="showheader2">
                                </td>   

                       </tr>
                </table>
         </section>
          <section>
 <div class="container">
            <div class="row ">
                <p>&nbsp;</p>
              <div id="messages">
                  
              </div>  


                </div>
  </div>
    </section>

          <Br><br><br><br>

              
       
    <?php include('includes/footer.php'); ?>
     <script>
    setInterval(function() {
       
        $.post('includes/messages.php', {
              

            },
            function(data, status) {
                $("#messages").html(data);
            })
    }, 500);
 </script>


       
  <?php } ?>