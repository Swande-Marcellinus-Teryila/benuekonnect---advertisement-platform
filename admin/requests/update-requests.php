<?php 
			if(isset($_POST['id']) && isset($_POST['approvepost'])){
			
			try{
				require_once('autoloader.php');
			$update = new Crud();
			$table = $_POST['table'];
			$updatecolumn =$_POST['updatecolumn'];
			$column_id = $_POST['column_id'];
			$id = $_POST['id'];
			$item = $_POST['item'];

			$update->updateSpecific($table,$updatecolumn,$column_id,$id,$item);
			echo '<div class="alert alert-success">Adverts approved successfully</div>'; 
		}catch(Exception $e){
			echo '<div class="alert alert-danger">Sorry, something went wrong,Advert not approved</div>';
		}
	}


		if(isset($_POST['id']) && isset($_POST['disapprovepost'])){
			
			try{
				require_once('autoloader.php');
			$update = new Crud();
			$table = $_POST['table'];
			$updatecolumn =$_POST['updatecolumn'];
			$column_id = $_POST['column_id'];
			$id = $_POST['id'];
			$item = $_POST['item'];

			$update->updateSpecific($table,$updatecolumn,$column_id,$id,$item);
			echo '<div class="alert alert-success">Adverts approved successfully</div>'; 
		}catch(Exception $e){
			echo '<div class="alert alert-danger">Sorry, something went wrong,Advert not approved</div>';
		}
	}




?>
