<?php 

if(isset($_POST['service_cat_id'])){
	require_once('autoloader.php');
	$category = new Crud();
	$id = $_POST['service_cat_id']; 
	if($category->exist('service_subcategory','service_cat_id',$id)){
	$subs = $category->displayAllSpecific('service_subcategory','service_cat_id',$id);
	 echo '<option>-Select Service subcategory-</option>';
		foreach ($subs as $sub) {
			echo '<option value="'.$sub["id"].'">'.$sub["subcategory"].' </option>';
		}
}
}else{
	echo "false";
}	


?>