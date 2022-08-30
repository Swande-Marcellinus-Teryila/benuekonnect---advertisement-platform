<?php 
			if(isset($_POST['check_subcategory'])){
			require_once('autoloader.php');
			$check = new Crud();
			$id = $_POST['check_subcategory'];
			if($check->exist2('category','id','subcategory_status',$id,'1')){
				echo 'true';
			}else{
				echo 'false';
			}
		}



?>