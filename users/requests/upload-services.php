<?php 
if(isset($_POST['addservices'])){
	require_once('autoloader.php');
	$service_category = new Crud();
	$service_category = $service_category->displayAll('service_categories');
	 echo '<option>-Select category of service-</option>';
		foreach ($service_category as $scat) {
			echo '<option value="'.$scat["id"].'">'.$scat["service_category"].' </option>';
		}
}
?>