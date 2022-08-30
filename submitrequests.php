<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
                require_once('includes/autoloader.php');
                $crud = new Crud();
               try{$crud->insertUser($_POST, $_FILES);
               	header("location:create-account.php?msg=Registration successfull");
               }catch(Exception $e){
               	header("location:create-account.php?error=".$e->getMessage());
               
               }
           }


               ?>