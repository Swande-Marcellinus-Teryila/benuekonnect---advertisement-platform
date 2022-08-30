 <?php 
        if(isset($_POST['searchquery'])){
            require_once('autoloader.php');
            $crud = new Crud();
            try{ 
                $query =$crud->cleanse($_POST['searchquery']);
               if(!empty($query)){
                $results = $crud->displaySearch('products','product_name',$query);
            if(is_array($results)){
                foreach($results as $result ){
                    echo '<a style="font-width:34px;" class="text-blue" href="product-details.php?prod_id='.$result["id"].'#id'.$result["id"].'">'.$result["product_name"].'</a><br>';
                }
            }
        }
            }catch(Exception $e){
            echo $e->getMessage();

            }
            
        }



?>
