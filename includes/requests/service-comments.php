<?Php require_once('autoloader.php'); 
$crud = new Crud();
$id = $_POST['id']; ?>
<h2><i class="fa fa-comment"> </i> Comments</h2>
						<ul class="media-list">
							<?php try{
								$comments = $crud->displayAllSpecific('comments','service_id',$id); foreach ($comments as $comment) {?>
							<li class="media">
								
								<a class="pull-left" href="#">
									<img class="media-object" src="images/home/avatar_img.png" alt="">
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i><?=$comment['full_name']?></li>
										<li><i class="fa fa-clock-o"></i><?=$crud->get_time_ago($comment['date_commented']);?></li>
										<li><i class="fa fa-calendar"></i><?=date("F jS, Y",$comment['date_commented']);?></li>
									</ul>
									<p><?=$comment['comment']?></p>
									<!--a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a-->
								</div>
							</li><?php }}catch(Exception $e){
							echo $e->getMessage(); }
							?>
							<!--li class="media second-media">
								<a class="pull-left" href="#">
									<img class="media-object" src="images/blog/man-three.jpg" alt="">
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i>Janis Gallagher</li>
										<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
										<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									<a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
								</div>
							</li-->
						</ul>					
		
					