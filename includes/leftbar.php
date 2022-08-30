		<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						
							<?php $ids=1; foreach ($categories as $cat) { ?>
								<?php if($cat['subcategory_status']=='1'){?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#id<?=$ids?>">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											<?= $cat['category'];?>
										</a>
									</h4>
								</div>
								<div id="id<?=$ids?>" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											 <?Php try{ $subcategories = $crud->displayAllSpecific2('subcategory','category_id','status',$cat['id'],'1');
          if(is_array($subcategories)){
          foreach ($subcategories as $sub) {?>
        
											<li><a href="products-subcategory.php?subcat_id=<?=$sub['id']?>"><?= $sub['subcategory']?></a></li>
											<?php }}}catch(Exception $e){

											} ?>
										</ul>
									</div>
								</div>
							</div> <?Php }else{?> 
							
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="products-category.php?cat_id=<?=$cat['id']?>"><?= $cat['category']?></a></h4>
								</div>
							</div>
							<?php } $ids+=1;} ?>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Service</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<?Php try{ $services = $crud->displayAllSpecific('service_categories','status','1');
          if(is_array($services)){
          foreach ($services as $service) {?>
									<li><a href="#"> <span class="pull-right">..</span><?=$service['service_category']?></a></li>
											<?php }}}catch(Exception $e){

											} ?>
								</ul>
							</div>
						</div><!--/brands_products-->
						
					
				
					
					</div>
				</div>
				