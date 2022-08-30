<?php 
session_start();
	require_once('autoloader.php');
	$crud = new Crud();

	if(isset($_POST['product_id'])){
	$product_id = $_POST['product_id'];
	$user_id = $_POST['user_id'];
			if($_POST['status']==1){

			echo $_SESSION['status'.$product_id]=1;	
			$crud->updateSingleSpecific2('comments','chat_activity','product_id','user_id',$product_id,$user_id,'1');
		}else{
		echo $_SESSION['status'.$product_id]=0;	
		$crud->updateSingleSpecific2('comments','chat_activity','product_id','user_id',$product_id,$user_id,'0');
		}
	}


/*for services*/
    if(isset($_POST['service_id'])){
    $service_id = $_POST['service_id'];
    $user_id = $_POST['user_id'];
            if($_POST['status']==1){

            echo $_SESSION['status'.$service_id]=1; 
            $crud->updateSingleSpecific2('comments','chat_activity','service_id','user_id',$service_id,$user_id,'1');
        }else{
        echo $_SESSION['status'.$service_id]=0; 
        $crud->updateSingleSpecific2('comments','chat_activity','service_id','user_id',$service_id,$user_id,'0');
        }
    }


/*for skills */
    if(isset($_POST['skill_id'])){
    $skill_id = $_POST['skill_id'];
    $user_id = $_POST['user_id'];
            if($_POST['status']==1){

            echo $_SESSION['status'.$skill_id]=1; 
            $crud->updateSingleSpecific2('comments','chat_activity','skill_id','user_id',$skill_id,$user_id,'1');
        }else{
        echo $_SESSION['status'.$skill_id]=0; 
        $crud->updateSingleSpecific2('comments','chat_activity','skill_id','user_id',$skill_id,$user_id,'0');
        }
    }


    /* for jobs*/
        if(isset($_POST['job_id'])){
    $job_id = $_POST['job_id'];
    $user_id = $_POST['user_id'];
            if($_POST['status']==1){

            echo $_SESSION['status'.$job_id]=1; 
            $crud->updateSingleSpecific2('comments','chat_activity','job_id','user_id',$job_id,$user_id,'1');
        }else{
        echo $_SESSION['status'.$job_id]=0; 
        $crud->updateSingleSpecific2('comments','chat_activity','job_id','user_id',$job_id,$user_id,'0');
        }
    }


    /* for vacany */
        if(isset($_POST['vacancy_id'])){
    $vacancy_id = $_POST['vacancy_id'];
    $user_id = $_POST['user_id'];
            if($_POST['status']==1){

            echo $_SESSION['status'.$vacancy_id]=1; 
            $crud->updateSingleSpecific2('comments','chat_activity','vacancy_id','user_id',$vacancy_id,$user_id,'1');
        }else{
        echo $_SESSION['status'.$vacancy_id]=0; 
        $crud->updateSingleSpecific2('comments','chat_activity','vacancy_id','user_id',$vacancy_id,$user_id,'0');
        }
    }
?>