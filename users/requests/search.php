 <?php 
        if(isset($_POST['searchquery'])){
            require_once('autoloader.php');
            $crud = new Crud();
            try{
                $query = $_POST['searchquery'];
                $results = $crud->displaySearch('products','product_name',$query);
                foreach($results as $result ){
                    echo '<a href="products-category.php?cat_id='.$result["category_id"].'">'.$result["product_name"].'</a>';
                }
            
            }catch(Exception $e){
            echo $e->getMessage();

            }
            
        }



?>
