<?php 
			if(isset($_POST['delete1'])){
			require_once('autoloader.php');

			$check = new Crud();
			$table = $_POST['table'];
			$column_id = $_POST['column_id'];
			$id =$_POST['id'];
		try{	
			  $photo1= $check->displayField('products','photo','id',$id);
			   $photo2= $check->displayField('products','photo2','id',$id);
			    $photo3= $check->displayField('products','photo3','id',$id);
			 
				if(!empty($photo1)){
					unlink("../../images/product-details/".$photo1);
				}

				if(!empty($photo2)){
					unlink("../../images/product-details/".$photo2);
				}

				if(!empty($photo3)){
					unlink("../../images/product-details/".$photo3);
				}
			
			if($check->deleteSpecific($table,$column_id,$id)){
				
				echo 'Record deleted successfully';
			}
		}catch(Exception $e){
			echo ''.$e->getMessage().'';
		}
		}



?>