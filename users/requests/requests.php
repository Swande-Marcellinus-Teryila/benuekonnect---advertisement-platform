<?php
require_once('autoloader.php');
			if(isset($_POST['show_service_subcat']) && isset($_POST['service_cat_id'])){
				$auth = new Auth();
				$service_cat_id = $_POST['service_cat_id'];
				$subcats = $auth->displayAllSpecificWithOrder('service_subcategory','service_cat_id',$service_cat_id,'subcategory','asc');
				foreach ($subcats as $subcat) {
					echo $subcat['id'];
				}

			}
?>