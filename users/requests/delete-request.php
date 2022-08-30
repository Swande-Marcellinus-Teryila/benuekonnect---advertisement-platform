<?php 
			if(isset($_POST['delete1'])){
			require_once('autoloader.php');

			$check = new Crud();
			$table = $_POST['table'];
			$column_id = $_POST['column_id'];
			$id =$_POST['id'];
		try{/*	
			  $photo1= $check->displayField('products','photo','id',$id);
			if(file_exists("../images/choice-del.JPG")){
					unlink("../images/product-details/choice-del.JPG");
				}else{
						echo "not possible to delete";	
				} */
			if($check->deleteSpecific($table,$column_id,$id)){
				
				echo 'Record deleted successfully';
			}
		}catch(Exception $e){
			echo ''.$e->getMessage().'';
		}
		}



?>