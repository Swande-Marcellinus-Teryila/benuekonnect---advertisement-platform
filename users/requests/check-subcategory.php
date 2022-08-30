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

if(isset($_POST['mysubcategory']) && isset($_POST['category_id'])){
	require_once('autoloader.php');
	$category = new Crud();
	$id = $_POST['category_id'];
	$category_id = $_POST['category_id'];
	$subs = $category->displayAllSpecific('subcategory','category_id',$id);
	 echo '<option>-Select Sub-Category-</option>';
		foreach ($subs as $sub) {
			echo '<option value="'.$sub["id"].'">'.$sub["subcategory"].' </option>';
		}
}	
if(isset($_POST['showcategory'])){
	require_once('autoloader.php');
	$category = new Crud();
	$cats = $category->displayAll('category');
	 echo '<option>-Select Category-</option>';
		foreach ($cats as $cat) {
			echo '<option value="'.$cat["id"].'">'.$cat["category"].' </option>';
		}
}



?>