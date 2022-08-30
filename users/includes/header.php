<?php header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies. 
?>

<body>
	<header id="header" style="background-color: #ff00ff; margin-bottom: 8px;">
		<div class="col-sm-12 logo-section">
			<img src="../images/icons/logo.png" class="logo">
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="navbar-header" style="float:left; ">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><a href="#">
								<span class="sr-only">Toggle navigation</span>
								<img src="../images/icons/menu.png" class="menu-icon">
						</button>

					</div>
					<a href="index.php"><img src="../images/icons/home.png" class="home-icon">
							<img src="../images/icons/Buy-it-sell-it- here.png" style="width:100%; height:30px; bottom: 0;"><img src="../images/icons/Buy-it-sell-it- here.png" class="Buy-it-sell-it-here"></a>

					<div class="mainmenu pull-right">
					<ul class="nav navbar-nav collapse navbar-collapse" style="background:orangered;">
						<li><a href="index.php">Home</a></li>
								<li><a href="post-product.php">Post Advert</a></li>
							<li><a href="saved-adverts.php">Saved Advert</a></li>
							<li><a href="myadverts.php">My Adverts</a></li>
							<li><a href="../aboutus.php"> About us</a></li> 
							<li><a href="../support.php">Support</a>
							</li>
							<li><a href="logout.php">Logout</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header>


	<header id="header2">
<div style="padding-right: 20%; padding-left: 15%;  background:#ff00ff;"><center><img src="../images/icons/logo.png" class="logo"></center></div>
 <div  style="display: flex; background:#ff00ff; justify-content: flex-end; position: relative;">
<div  style=" width:20%; background:#ff00ff;">
 <div class="dropdown mainmenu" style="background:#ff00ff;"><br>
 	<button class="dropdown-toggle" type="button" data-toggle="dropdown" style="background-color: #ff00ff; border-color:#ff00ff; border-width: 0px;">
 		<span class="sr-only">Toggle navigation</span>
 		<img src="../images/icons/menu.png" class="menu-icon" style="height: 46px;">
 	</button>
 	<ul class="dropdown-menu" style="background-color:red;">


 	<li><a href="index.php"><img src="profile_picture/<?=$user['photo']?>" class="img-circle" style="height: 110px; width: 110px;"></a>
							</li>	
	<li><a href="index.php"><span class="username"><?=$user['full_name']; ?></span></a>
							</li>

 	
							
							<li><a href="post-product.php"><img src="../images/icons/bk.png" class="linkicons">Post Advert</a></li>
							<li><a href="saved-adverts.php"><img src="../images/icons/bk.png" class="linkicons">Saved Advert</a></li>
							<li><a href="myadverts.php"><img src="../images/icons/bk.png" class="linkicons">My Adverts</a></li>
							<li><a href="edit-info.php"><img src="../images/icons/bk.png" class="linkicons">Edit Profile</a></li>
						
							<li><a href="../aboutus.php"> <img src="../images/icons/bk.png" class="linkicons">About us</a></li> 
							<li><a href="../support.php"><img src="../images/icons/profile.png" class="linkicons">Support</a>
							</li>
							
							<li><a href="logout.php"><img src="../images/icons/login fix.png" class="linkicons">Logout</a>
							</li>
								</ul>
 </div>
</div>
<div  style="width:60%">
	 <div class="dropdown" style="background:#ff00ff;">
 	<button class="dropdown-toggle" type="button" data-toggle="dropdown" style="background-color: #ff00ff; border-color:#ff00ff; border-width: 0px;"><br>
 		<br>
	<img src="../images/icons/Buy-it-sell-it- here.png" style="width:100%; height:35px; bottom: 0;">
 	</button>
 </div>

</div>
<div style="width:20%">
	 <div style="background:#ff00ff; float: right;">
 	<button style="background-color: #ff00ff; border-color:#ff00ff; border-width: 0px;">
 <br>
	<a href="index.php" style="float:right"><img src="../images/icons/home.png" class="home-icon"></a>
 	</button>
 </div>
	
</div>
</div>

	</header>
	<!--/header-->