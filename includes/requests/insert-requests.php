<?php 
		if(isset($_POST['insertcomment'])){
			require_once('autoloader.php');
			$crud = new Crud();
		    try{

$crud->insertComment($_POST);		    	
if($_POST['user_chat_status']!='' && isset($_POST['product_id'])){
	$prod_id = $_POST['product_id'];

$crud->updateSingleSpecific2('comments','mark_as_read','user_id','product_id',$_POST['user_id'],$prod_id,'1');

	}
	
if($_POST['user_chat_status']!='' && isset($_POST['service_id'])){
	$service_id = $_POST['service_id'];

$crud->updateSingleSpecific2('comments','mark_as_read','user_id','service_id',$_POST['user_id'],$service_id,'1');

	}
	


if($_POST['user_chat_status']!='' && isset($_POST['job_id'])){
	$job_id = $_POST['job_id'];

$crud->updateSingleSpecific2('comments','mark_as_read','user_id','job_id',$_POST['user_id'],$job_id,'1');

	}
	
	if($_POST['user_chat_status']!='' && isset($_POST['job_id'])){
	$job_id = $_POST['job_id'];

$crud->updateSingleSpecific2('comments','mark_as_read','user_id','job_id',$_POST['user_id'],$job_id,'1');

	}

if($_POST['user_chat_status']!='' && isset($_POST['skill_id'])){
	$skill_id = $_POST['skill_id'];

$crud->updateSingleSpecific2('comments','mark_as_read','user_id','skill_id',$_POST['user_id'],$skill_id,'1');

	}
	

	if($_POST['user_chat_status']!='' && isset($_POST['vacancy_id'])){
	$vacancy_id = $_POST['vacancy_id'];

$crud->updateSingleSpecific2('comments','mark_as_read','user_id','vacancy_id',$_POST['user_id'],$vacancy_id,'1');

	}
	
	
		    	
		    
		    }catch(Exception $e){
		     $error = $e->getMessage();


		    }
			
		}



?>