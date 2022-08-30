<?php 
			/*
			 */
	include_once "config.php";

class Crud extends Config
{

	function __construct()
	{
		parent::__construct();
	}

	public function displayAll($table)
	{
		$query = "SELECT * FROM {$table}";
		$result =  $this->con->prepare($query);
		 $result->execute();
		if ($result->rowCount() > 0) {
			$data = $result->fetchAll();
			return $data;
		}else{
			return "No found records";
		}
	}

	public function getTotal($table)
	{
		$query = "SELECT * FROM {$table}";
		$result =  $this->con->prepare($query);
		$result->execute();
		return $result->rowCount();
	}

public function getTotalSpicific($table,$column,$item)
	{
		$query = "SELECT * FROM {$table} WHERE {$column}=?";
		$result =  $this->con->prepare($query);
		$result->execute([$item]);
		return $result->rowCount();
	}

	public function getTotalSpicific2($table,$column1,$column2,$item1,$item2)
	{
		$query = "SELECT * FROM {$table} WHERE {$column1}=? AND {$column2}=?";
		$result =  $this->con->prepare($query);
		$result->execute([$item1,$item2]);
		return $result->rowCount();
	}

	public function getTotalSpicificUreadMsg($table,$column1,$column2,$column3,$item1,$item2,$item3)
	{
		$query = "SELECT * FROM {$table} WHERE {$column1}=? AND {$column2}=? AND {$column3}=?";
		$result =  $this->con->prepare($query);
		$result->execute([$item1,$item2,$item3]);
		return $result->rowCount();
	}
	

	public function displayAllWithOrder($table,$orderValue,$orderType)
	{
		$query = "SELECT * FROM {$table} ORDER BY {$orderValue} {$orderType}";
		$result =  $this->con->prepare($query);
		 $result->execute();
		if ($result->rowCount() > 0) {
			$data = array();
			$data = $result->fetchAll();
			return $data;
		}else{
			return 0;
		}
	}


	
	public function displayAllSpecific($table,$value,$item)
	{
		$query = "SELECT * FROM {$table} WHERE $value=? ";
		$result =  $this->con->prepare($query);
		 $result->execute([$item]);
		if ($result->rowCount() > 0) {
			$data = array();
			$data = $result->fetchAll();
			return $data;
		}else{
			throw new Exception("Record not found");
			
		}
	}

	public function displayAllSpecific2($table,$column1,$column2,$item1,$item2)
	{
		$query = "SELECT * FROM {$table} WHERE {$column1}=? AND {$column2}=? ";
		$result =  $this->con->prepare($query);
		 $result->execute([$item1,$item2]);
		if ($result->rowCount() > 0) {
			$data = $result->fetchAll();
			return $data;
		}else{
			throw new Exception("Record not found");
			
		}
	}

	public function displayAllSpecific3($table,$column1,$column2,$column3,$item1,$item2,$item3)
	{
		$query = "SELECT * FROM {$table} WHERE {$column1}=? AND {$column2}=? And {$column3}=?";
		$result =  $this->con->prepare($query);
		 $result->execute([$item1,$item2,$item3]);
		if ($result->rowCount() > 0){ 
			$data = $result->fetchAll();
			return $data;
		}else{
			throw new Exception("Record not found");
			
		}
	}

	public function displayAllSpecificWithOrder($table,$column,$item,$orderColumn,$orderType)
	{
		$query = "SELECT * FROM {$table} WHERE {$column}=? ORDER BY {$orderColumn} {$orderType}";
		$result =  $this->con->prepare($query); 
		$result->execute([$item]);
		if ($result->rowCount() > 0) {
			$data = $result->fetchAll();
			return $data;
		}
		else
		{
			throw new Exception("Record not found");
		}
	}


		public function displayAllSpecificWithOrder2($table,$column1,$column2,$item1,$item2,$orderColumn,$orderType)
	{
		$query = "SELECT * FROM {$table} WHERE {$column1}=? AND {$column2}=? ORDER BY {$orderColumn} {$orderType}";
		$result =  $this->con->prepare($query); 
		$result->execute([$item1,$item2]);
		if ($result->rowCount() > 0) {
			$data = $result->fetchAll();
			return $data;
		}
		else
		{
			throw new Exception("Record not found");
		}
	}

	public function displayDistinctMessages($user_id)
	{
		$query = "SELECT  *FROM comments Where user_id=? ORDER BY date_commented DESC";
		$result =  $this->con->prepare($query); 
		$result->execute([$user_id]);
		if ($result->rowCount() > 0) {
			$data = $result->fetchAll();
			return $data;
		}
		else
		{
			throw new Exception("Record not found");
		}
	}

	public function displayAllSpecificMessagesWithOrder2($table,$column1,$column2,$item1,$item2,$orderColumn,$orderType)
	{
		$query = "SELECT * FROM {$table} WHERE =? AND {$column2}=? ORDER BY {$orderColumn} {$orderType}";
		$result =  $this->con->prepare($query); 
		$result->execute([$item1,$item2]);
		if ($result->rowCount() > 0) {
			$data = $result->fetchAll();
			return $data;
		}
		else
		{
			throw new Exception("Record not found");
		}
	}






	public function displayAllSpecificWithOrderWithLimit($table,$column1,$item,$orderColumn,$orderType,$limit)
	{
		$query = "SELECT * FROM {$table} WHERE {$column1}=? ORDER BY {$orderColumn} {$orderType} LIMIT {$limit}";
		$result =  $this->con->prepare($query); 
		$result->execute([$item]);
		if ($result->rowCount() > 0) {
			$data = $result->fetchAll();
			return $data;
		}
		else
		{
			throw new Exception("Record not found");
		}
	}

	public function displayAllSpecificWithOrderWithLimit2($table,$column1,$column2,$item1,$item2,$orderColumn,$orderType,$limit)
	{
		$query = "SELECT * FROM {$table} WHERE {$column1}=? AND {$column2}=? ORDER BY {$orderColumn} {$orderType} LIMIT {$limit}";
		$result =  $this->con->prepare($query); 
		$result->execute([$item1,$item2]);
		if ($result->rowCount() > 0) {
			$data = $result->fetchAll();
			return $data;
		}
		else
		{
			throw new Exception("Record not found");
		}
	}


	public function displayWithLimit($table,$limit)
	{
		$query = "SELECT * FROM {table} limit {$limit}";
		$result =  $this->con->prepare($query);
		 $result->execute();
		if ($result->rowCount() > 0) {
			$data = $result->fetchAll();
			return $data;
		}
		else
		{
			return "No found records";
		}
	}

	public function displayAllWithStatusOk($table,$orderValue,$orderType)
	{
		$query = "SELECT * FROM {$table} Where status1='1' ORDER BY {$orderValue} {$orderType}";
		$result =  $this->con->prepare($query);
		 $result->execute();
		if ($result->rowCount() > 0) {
			$data = $result->fetchAll();
			return $data;
		}else{
			return 0;
		}
	} 

		public function displayField($table,$column,$id,$item)
	{
		$query = "SELECT {$column} FROM {$table} WHERE {$id} =? ";
		$result =  $this->con->prepare($query);
		 $result->execute([$item]);
		if ($result->rowCount() > 0) {
			$data = $result->fetch(PDO::FETCH_ASSOC);
			return $data[$column];
		}else{
			throw new Exception("Record not found");
			
		}
	}

	public function displaySingleField2($table,$column,$column_id1,$column_id2,$id1,$id2)
	{
		$query = "SELECT {$column} FROM {$table} WHERE {$column_id1} =? AND {$column_id2}=?";
		$result =  $this->con->prepare($query);
		 $result->execute([$id2,$id2]);
		if ($result->rowCount() > 0) {
			$data = $result->fetch(PDO::FETCH_ASSOC);
			return $data[$column];
		}else{
			throw new Exception("Record not found");
			
		}
	}


		public function displayFieldOr($table,$column,$id1,$id2,$item1,$item2)
	{
		$query = "SELECT {$column}  FROM {$table} WHERE {$id1} =? or {$id2}=?";
		$result =  $this->con->prepare($query);
		 $result->execute([$item1,$item2]);
		if ($result->rowCount() > 0) {
			$data = $result->fetch(PDO::FETCH_ASSOC);
			return $data[$column];
		}else{
			throw new Exception("Record not found");
			
		}
	}
	
	



//Search
	public function displaySearch($table,$column,$value)
	{
	//Search box value assigning to $Name variable.
		$name = $this->cleanse($value);
		$query = "SELECT * FROM {$table} WHERE {$column} LIKE '%$name%'";
		$result =  $this->con->prepare($query); 
		$result->execute();
		if ($result->rowCount() > 0) {
			$row = $result->fetchAll();
			
			return $row;
		}else{
			return 0;
		}
	}
	public function displaySearchLeft($table,$column,$value)
	{
	//Search box value assigning to $Name variable.
		$name = $this->cleanse($value);
		$query = "SELECT * FROM {$table} WHERE {$column} LIKE '%$name%'";
		$result =  $this->con->prepare($query); 
		$result->execute();
		if ($result->rowCount() > 0) {
			$row = $result->fetchAll();
			
			return $row;
		}else{
			throw new Exception("0 result returned!");
			
		}
	}


		public function displaySearchLeftWithOrder($table,$column,$value,$orderColumn,$orderType)
	{
	//Search box value assigning to $Name variable.
		$name = $this->cleanse($value);
		$query = "SELECT * FROM {$table} WHERE {$column} LIKE '%$name%'ORDER BY {$orderColumn} {$orderType}";
		$result =  $this->con->prepare($query); 
		$result->execute();
		if ($result->rowCount() > 0) {
			$row = $result->fetchAll();
			
			return $row;
		}else{
			throw new Exception("0 result returned!");
			
		}
	}

	public function displaySearchLeftSpicific($table,$column,$column2,$value,$id)
	{
	//Search box value assigning to $Name variable.
		$name = $this->cleanse($value);
		$query = "SELECT * FROM {$table} WHERE {$column} LIKE '%$name%' AND {$column2}=$id";
		$result =  $this->con->prepare($query); 
		$result->execute();
		if ($result->rowCount() > 0) {
			$row = $result->fetchAll();
			
			return $row;
		}else{
			return "Returned 0 result";
		}
	}
	public function displaySearchLeftSpicificWithOrder($table,$column,$column2,$value,$id,$orderColumn, $orderType)
	{
	//Search box value assigning to $Name variable.
		$name = $this->cleanse($value);
		$query = "SELECT * FROM {$table} WHERE {$column} LIKE '%$name%' AND {$column2}=? ORDER BY {$orderColumn} {$orderType}";
		$result =  $this->con->prepare($query); 
		$result->execute([$id]);
		if ($result->rowCount() > 0) {
			$row = $result->fetchAll();
			
			return $row;
		}else{
			throw new Exception("Result not found");
			
		}
	}
	public function displaySearchLeftSpicificWithOrder2($table,$column,$column2,$column3,$value,$id1,$id2,$order)
	{
	//Search box value assigning to $Name variable.
		$name = $this->cleanse($value);
		$query = "SELECT * FROM {$table} WHERE {$column} LIKE '%$name%' WHERE {$column2}=? ORDER BY {$order}";
		$result =  $this->con->prepare($query); 
		$result->execute([$id1,$id2]);
		if ($result->rowCount() > 0) {
			$row = $result->fetchAll();
			
			return $row;
		}else{
			return "Result not found";
		}
	}
	/*=========================end of search=====================================*/
	/* insert */


public function insertUser($post,$file)
	{		  

$fullname = $this->cleanse(ucfirst($_POST['fullname']));
$address = $this->cleanse($_POST['address']);
   $ref = $this->cleanse(strip_tags($_POST['ref']));
   $town= $this->cleanse(strip_tags($_POST['town']));
   $account_type = $_POST['account_type'];
   $email = '';
   if(!isset($_POST['agree'])){
   	throw new Exception("Tick the check box to agree to our terms and conditions before submitting");
   	
   }

if(isset($_POST['dob'])){
					$dob = $this->cleanse($_POST['dob']);
				}else{
					$dob="";
				}
if(isset($_POST['sex'])){			
$sex = $this->cleanse($_POST['sex']);
}else{
	$sex="";
}
$phone = $this->cleanse($_POST['phone']);
 if($_POST['confirm_password']!=$_POST['password']){
 	throw new Exception("confirmation password did not match");
 	
 }
 $password =$this->passwordFilter($_POST['password']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
if(!empty($_POST['email'])){

$email = $this->isValidEmail($_POST['email']);
if($this->exist('users','email',$email)){
	throw new Exception("Sorry, email already exist!");
}	
}
$business_description =$this->cleanse(ucfirst($_POST['description']));
if($this->exist('users','phone',$phone)){
		throw new Exception("Sorry, this phone number has been used already!");
		
}

$referal_code = trim($fullname.rand(100000900,100000009));
$status = 1;
       	$temp = $this->validatePhoto('photo',(1024*1024*4));
        $folder = "users/profile_picture/" ;  
        $imgv1 = $_FILES['photo']['name']; 
        $photo = $phone.$referal_code.$imgv1;  
        move_uploaded_file($temp,$folder.$photo);
 $data = array(
                $fullname,
                $address,
                $town,
                $dob,
                $sex,
                $phone,
                $photo,
                $password,
                $email,
                $business_description,
                $referal_code,
                $status,
                $account_type,
                time()
            );
		$query="INSERT INTO users  (full_name, address, town, dob, sex, phone, photo, password, email, business_description, referral_code, status,account_type, date_registered) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$sql = $this->con->prepare($query);
	
		if ($sql->execute($data)) {

			 $id = $this->con->lastInsertId();
   				if(!empty($ref)){ 
   			$this->insertReferral($ref, $id);
   				}

			return 'Customer added has been successfully';
			}
			throw new Exception("Sorry, something went wrong,Try Again!");
		
	}	
	

	
	

	public function insertCategory($post)
	{		  
		$category = $this->cleanse(ucfirst($_POST['category']));
		  $temp = $this->validatePhoto('photo',(1024*1024*4));
        $folder = "../images/icons/" ;  
        $imgv1 = $_FILES['photo']['name']; 
        $photo ='service'.uniqid().rand(11111111111111,22222222222222).$imgv1;  
        move_uploaded_file($temp,$folder.$photo);
		$status = 1;
		$time =time();
		$query="INSERT INTO category (category,photo, subcategory_status, status, date_uploaded) VALUES(?,?,?,?,?)";
		$sql = $this->con->prepare($query);
	
		if ($sql->execute([$category,$photo,'0',$status,$time])) {
			return 'category has been successfully';
			}
			throw new Exception("Sorry, something went wrong, category not added");
		
	}	

	public function insertSubcategory($post)
	{		  
		$category_id = $this->cleanse($_POST['category_id']);
		$subcategory = $this->cleanse(ucfirst($_POST['subcategory']));
		if($this->exist('subcategory','subcategory',$subcategory)){
			throw new Exception($subcategory." already exist as a subcategory for the category selected!");
			
		}
		$status = 1;
		$time = time();

		$query="INSERT INTO subcategory(category_id, subcategory, status, date_created) VALUES(?,?,?,?)";
		$sql = $this->con->prepare($query);
	
		if ($sql->execute([$category_id,$subcategory,$status,$time])) {
			$this->update("UPDATE category SET subcategory_status=? WHERE id=?",array('1',$category_id));
			return 'subcategory has been successfully';
			}
			throw new Exception("Sorry, something went wrong, subcategory not added");
		
	}	
	public function insertSavedAd($user_id,$ad_type,$ad_id)
	{	
		$time = time();

		$query="INSERT INTO saved_adverts (user_id, ad_id, ad_type, date_saved) VALUES(?,?,?,?)";
		$sql = $this->con->prepare($query);
	
		if ($sql->execute([$user_id,$ad_id,$ad_type,$time])) {
			return "Ad added successfully";
			}
			throw new Exception("Sorry, something went wrong,try again");
	
	}

	public function insertServiceSubcategory($post)
	{		  
		$category_id = $this->cleanse($_POST['category_id']);
		$subcategory = $this->cleanse(ucfirst($_POST['subcategory']));
		if($this->exist('service_subcategory','subcategory',$subcategory)){
			throw new Exception($subcategory." already exist as a subcategory for the category selected!");
			
		}
		$status = 1;
		$time = time();

		$query="INSERT INTO service_subcategory(service_cat_id, subcategory, status, date_uploaded) VALUES(?,?,?,?)";
		$sql = $this->con->prepare($query);
	
		if ($sql->execute([$category_id,$subcategory,$status,$time])) {
			$this->update("UPDATE category SET subcategory_status=? WHERE id=?",array('1',$category_id));
			return 'Service subcategory has been successfully';
			}
			throw new Exception("Sorry, something went wrong, subcategory not added");
		
	}	

	public function insertJobCategory($post)
	{		  
		$job_category = $this->cleanse(ucfirst($_POST['job_category']));
		$status = 1;
		$time = time();
		if($this->exist('job_categories','job_category',$job_category)){
			throw new Exception($job_category." already exist as a Job category!");
		}
			

		$query="INSERT INTO job_categories (job_category, status, date_created) VALUES(?,?,?)";
		$sql = $this->con->prepare($query);
	
		if ($sql->execute([$job_category,$status,$time])) {
			return 'Job Category added successfully';
		}
		
			throw new Exception("Sorry, something went wrong, Job category not added");
		
	}
	public function insertVacancyCategory($post)
	{		  
		$vacancy_category = $this->cleanse(ucfirst($_POST['vacancy_category']));

		$status = 1;
		$time = time();
		if($this->exist('vacancy_category','vacancy_category',$vacancy_category)){
			throw new Exception($vacancy_category." already exist as a Vacancy category!");
		}
			

		$query="INSERT INTO vacancy_category (vacancy_category, status, date_created) VALUES(?,?,?)";
		$sql = $this->con->prepare($query);
	
		if ($sql->execute([$vacancy_category,$status,$time])) {
			return 'Vacancy Category added successfully';
		}
		
			throw new Exception("Sorry, something went wrong, vacancy category not added");
		
	}


	public function insertJob($post)
	{		  
		$job = $this->cleanse(ucfirst($_POST['job']));
		$location = $this->cleanse(ucfirst($_POST['location']));
		$stage_name= $this->cleanse(ucfirst($_POST['stage_name']));
		$place_to_work= $this->cleanse(ucfirst($_POST['place_to_work']));
		$description = $this->cleanse(ucfirst($_POST['description']));
		$user_id = $_POST['user_id'];
		$status = 0;
		$time = time();
		

		$query="INSERT INTO job (job_cat_id, location,stage_name,place_to_work, description, postal_id, status, date_uploaded) VALUES(?,?,?,?,?,?,?,?)";
		$sql = $this->con->prepare($query);
	
		if ($sql->execute([$job,$location,$stage_name,$place_to_work,$description,$user_id, $status,$time])) {
			return 'Job posted successfully!<br><br>
			 <p><b>Note:Your advert will be published within 6 hours.</b></p>';
		}
		
			throw new Exception("Sorry, something went wrong, Job  is not posted");
		
	}	

	public function insertVacancy($post)
	{		  
		$vacancy = $this->cleanse(ucfirst($_POST['vacancy']));
		$location = $this->cleanse(ucfirst($_POST['location']));
		$stage_name= $this->cleanse(ucfirst($_POST['stage_name']));
		$description = $this->cleanse(ucfirst($_POST['description']));
		$user_id = $_POST['user_id'];
		$status = 0;
		$time = time();
		

		$query="INSERT INTO vacancy (vacancy, location,stage_name,description, user_id, status, date_uploaded) VALUES(?,?,?,?,?,?,?)";
		$sql = $this->con->prepare($query);
	
		if ($sql->execute([$vacancy,$location,$stage_name,$description,$user_id,$status,$time])) {
			return 'Vacancy posted successfully!<br><br>
			 <p><b>Note:Your advert will be published within 6 hours.</b></p>';
		}
		
			throw new Exception("Sorry, something went wrong, Vacancy  is not uploaded");
		
	}	

	public function insertSkill($post)
	{		  
		$skill= $this->cleanse(ucfirst($_POST['skill']));
		$location = $this->cleanse(ucfirst($_POST['location']));
		$stage_name = ucfirst($_POST['stage_name']);
		$place_to_work= $this->cleanse(ucfirst($_POST['place_to_work']));
		$user_id = $_POST['user_id'];
		$status = 0;
		$time = time();
		

		$query="INSERT INTO skills (user_id, location, stage_name,skill, place_to_work, status, date) VALUES(?,?,?,?,?,?,?)";
		$sql = $this->con->prepare($query);
	
		if ($sql->execute([$user_id,$location,$stage_name,$skill,$place_to_work,$status,$time])) {
			return 'Skill posted successfully!<br><br> 
			<p><b>Note:Your advert will be published within 6 hours.</b></p>';
		}
		
			throw new Exception("Sorry, something went wrong, skill  is not posted");
		
	}	



		public function insertServiceCategory($post)
	{		  
		$service_category = $this->cleanse(ucfirst($_POST['service_category']));
		$status = 1;
		$time = time();
		if($this->exist('service_categories','service_category',$service_category)){
			throw new Exception($service_category." already exist as a Service category!");
		}
			

		$query="INSERT INTO service_categories (service_category, status, date_created) VALUES(?,?,?)";
		$sql = $this->con->prepare($query);
	
		if ($sql->execute([$service_category,$status,$time])) {
			return 'Service Category added successfully';
		}
		
			throw new Exception("Sorry, something went wrong,  Service category not added");
		
	}



	public function insertService($post)
	{	
$service_category_id = $this->cleanse($_POST['service_cat_id']);
$postal_id = $_POST['user_id'];
$location = $_POST['location'];
$stage_name = $_POST['stage_name'];
$place_to_serve = $_POST['place_to_serve'];
$status = 0;
$description = $this->cleanse(ucfirst($_POST['description']));
 $data = array(
 				$service_category_id,
 				$postal_id,
 				$description,
 				$location,
 				$stage_name,
 				$place_to_serve,
 				$status,
 				time()


                
            );
		$query="INSERT INTO services (service_category_id, postal_id, description, service_location,stage_name, place_to_serve, status,date_uploaded) VALUES(?,?,?,?,?,?,?,?)";
		$sql = $this->con->prepare($query);
	
		if ($sql->execute($data)) {
			return 'Service has been uploaded successfully!<br><br>
			 <p><b>Note:Your advert will be published within 6 hours.</b></p>';
			}
			throw new Exception("Sorry, something went wrong, service not uploaded");
		
	}	








public function insertProduct($post,$file)
	{	
$category_id = $this->cleanse($_POST['category_id']);
if(isset($_POST['subcategory_id'])){
$subcategory_id = $_POST['subcategory_id'];
}else{
	$subcategory_id=0;
}
$product_state = $_POST['product_state'];
$postal_id = $_POST['user_id'];
$product_name = $this->cleanse(ucfirst($_POST['product_name']));
$description = $this->cleanse(ucfirst($_POST['description']));
$selling_price = $this->cleanse(ucfirst($_POST['selling_price']));
$location = $this->cleanse(ucfirst($_POST['town']));
$referal_code = rand(1000009000,1000000090);
$user_approval_status=1;
$photo2 ="";
$photo3 = "";

        $temp = $this->validatePhoto('photo',(1024*1024*4));
        $folder = "../images/product-details/" ;  
        $imgv1 = $_FILES['photo']['name']; 
        $photo1 ='product'.uniqid().rand(11111111111,22222222222222).$imgv1;  
        move_uploaded_file($temp,$folder.$photo1);

        if(!empty($_FILES['photo2']['name'])){
		  $temp = $this->validatePhoto('photo2',(1024*1024*4));
        $folder = "../images/product-details/" ;  
        $imgv1 = $_FILES['photo2']['name']; 
        $photo2 ='product'.uniqid().rand(1111111111,22222222222222).$imgv1;  
        move_uploaded_file($temp,$folder.$photo2);
     }


         if(!empty($_FILES['photo3']['name'])){
		  $temp = $this->validatePhoto('photo3',(1024*1024*4));
        $folder = "../images/product-details/" ;  
        $imgv1 = $_FILES['photo3']['name']; 
        $photo3 ='product'.uniqid().rand(11111111111,22222222222222).$imgv1;  
        move_uploaded_file($temp,$folder.$photo3);
        }

 $data = array(
 				$category_id,
 				$subcategory_id,
 				$postal_id,
 				$product_name,
 				$description,
 				$selling_price,
 				$location,
 				$photo1,
 				$photo2,
 				$photo3,
 				$product_state,
 				'0',
 				$user_approval_status=1,
 				'0',
 				'0',
 				'0',
 				time()


                
            );
		$query="INSERT INTO products  (category_id, subcategory_id, postal_id, product_name, description, selling_price, location, photo, photo2, photo3, product_state, status, user_approval_status, approved_sponsored_status, sponsored_post_status, date_viewed, date_uploaded) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$sql = $this->con->prepare($query);
	
		if ($sql->execute($data)) {
			return 'Product has been uploaded successfully!<br><br>
			 <p><b>Note:Your advert will be published within 6 hours.</b></p>';
			}
			throw new Exception("Sorry, something went wrong, product not uploaded");
		
	}	
	public function insertReferral($referral_code, $referral_id){
		$time = time();
		
		$query="INSERT INTO referrals (referral_code, referral_id, date_clicked) VALUES(?,?,?)";
		$sql = $this->con->prepare($query);
		//if($this->exist('users','referral_code',$referral_code)){
	
		//$referral_id = $this->displayField('users','id','referral_code',$referral);
		if ($sql->execute([$referral_code, $referral_id, $time])) {
			
		}
	}

	public function insertComment($post)
	{  $prod_id='';
		$service_id='';
		$job_id='';
		$vacancy_id = '';
		$skill_id = '';
		$user_id = $_POST['user_id'];
		$user_chat_status = $_POST['user_chat_status'];

		if(isset($_POST['product_id'])){
		$prod_id = $_POST['product_id']; 
		
		}

		if(isset($_POST['service_id'])){
		$service_id = $_POST['service_id']; 
		}
		if(isset($_POST['job_id'])){
		$job_id = $_POST['job_id']; 
		}
		
		if(isset($_POST['vacancy_id'])){
		$vacancy_id = $_POST['vacancy_id']; 
		}

		if(isset($_POST['skill_id'])){
		$skill_id = $_POST['skill_id']; 
		}

		$comment_id = uniqid().rand(100000,9000000);
		$name = $this->cleanse(ucfirst($_POST['fullname']));
		if(empty($name)){
			throw new Exception("Please provide your name");
			
		}
		$comment = $this->cleanse(ucfirst($_POST['comment']));
		
		$time =time();
		$query="INSERT INTO comments(user_id, product_id, service_id, job_id,skill_id,vacancy_id, full_name, comment, date_commented) VALUES(?,?,?,?,?,?,?,?,?)";
		$sql = $this->con->prepare($query);
	
		if ($sql->execute([$user_id,$prod_id,$service_id,$job_id,$skill_id,$vacancy_id,$name,$comment,$time])) {
			return 'comment posted';
			}
			throw new Exception("Sorry, something went wrong,try again!");
		
	}
	
	
	/* end of insertion*/

	/* update*/

		public function update($query,$data){
 		
 		$stmt = $this->con->prepare($query);
 		$stmt->execute($data);
		}


		public function updateAll($table,$updatecolumn,$item){
 			$query = "UPDATE {$table} SET {$updatecolumn}=?";
 		$stmt = $this->con->prepare($query);
 		if($stmt->execute([$item])){
 			return true;
 		}
 		throw new Exception("Sorry,Something went wrong, Try again!");
 		
		}


		public function updateSpecific($table,$updatecolumn,$column_id,$id,$item){
 			$query = "UPDATE {$table} SET {$updatecolumn}=? WHERE {$column_id}=?";
 		$stmt = $this->con->prepare($query);
 		if($stmt->execute([$item,$id])){
 			return true;
 		}
 		throw new Exception("Sorry,Something went wrong, Try again!");
 		
		}

		public function updateSingleSpecific($table,$updatecolumn,$column_id,$id,$item){
 			$query = "UPDATE {$table} SET {$updatecolumn}=? WHERE {$column_id}=?";
 		$stmt = $this->con->prepare($query);
 		if($stmt->execute([$item,$id])){
 			return true;
 		}
 		throw new Exception("Sorry,Something went wrong, Try again!");
 		
		}


			public function updateSingleSpecific2($table,$updatecolumn,$column_id1,$column_id2,$id1,$id2,$item){
 			$query = "UPDATE {$table} SET {$updatecolumn}=? WHERE {$column_id1}=? AND {$column_id2}=?";
 		$stmt = $this->con->prepare($query);
 		if($stmt->execute([$item,$id1,$id2])){
 			return true;
 		}
 		throw new Exception("Sorry,Something went wrong, Try again!");
 		
		}

		public function updateServiceCategory($post,$id)
	{		  
		$service_category = $this->cleanse(ucfirst($_POST['service_category']));
		$status = 1;
		$time = time();
	

		$query="UPDATE service_categories SET service_category=?, status=?, date_created=? WHERE id=?";
		$sql = $this->con->prepare($query);
	
		if ($sql->execute([$service_category,$status,$time,$id])) {
			return 'Service category edited successfully';
		}
		
			throw new Exception("Sorry, something went wrong,  Service category not added");
		
	}

	public function updateVacancyCategory($post,$id)
	{		  
		$vacancy_category = $this->cleanse(ucfirst($_POST['vacancy_category']));

		$status = 1;
		$time = time();
	
		$query="UPDATE vacancy_category SET vacancy_category=?, status=?, date_created=? WHERE id=?";
		$sql = $this->con->prepare($query);
	
		if ($sql->execute([$vacancy_category,$status,$time,$id])) {
			return 'Vacancy Category edited successfully';
		}
		
			throw new Exception("Sorry, something went wrong, vacancy category not added");
		
	}

	public function updateJobCategory($post,$id)
	{		  
		$job_category = $this->cleanse(ucfirst($_POST['job_category']));

		$status = 1;
		$time = time();
	

		$query="UPDATE job_categories SET job_category=?, status=?, date_created=? WHERE id=?";
		$sql = $this->con->prepare($query);
	
		if ($sql->execute([$job_category,$status,$time,$id])) {
			return 'Job Category edited successfully';
		}
		
			throw new Exception("Sorry, something went wrong, Job category not added");
		
	}



		public function updatePhoto($table,$updatecolumn,$column_id,$file,$id,$folder){
		/*checking wether the imagte is changed*/ 

		$query = "UPDATE {$table} SET {$updatecolumn}=? WHERE {$column_id}=?";
		$original_img = $_POST['img'];
			if($this->exist2($table,$updatecolumn,$column_id,$original_img,$id) && empty($_FILES['photo']['name'])){
				$img=$original_img; 
			
			}
			else{
			 if(file_exists($folder.'/'.$original_img)){
			 	unlink($folder.'/'.$original_img);
			 }
		 $temp = $this->validatePhoto('photo',(1024*1024*1000));
			  
			$imgv1 = $_FILES['photo']['name'];
			  if(empty($imgv1)){
				  throw new Exception("Please Select  Photo");
			  }
			$img = uniqid().rand(111111111111,22222222222).$imgv1; 

			move_uploaded_file($temp,$folder.$img);
			
 		$stmt = $this->con->prepare($query);
 		if($stmt->execute([$img,$id])){
 			if(file_exists($folder.$original_img)){
 			unlink($folder.$original_img);
 		}
 			return "photo changed successfully";
 	
 		}
 			
 		throw new Exception("Sorry,Something went wrong, Try again!");
 		
		}
		}
	
	

	/*end of update */

	/*  beginning delete*/

	public function deleteSpecific($table,$column,$item){
		$query = "DELETE FROM {$table} Where {$column}=?";
		$sql = $this->con->prepare($query);
	
		if ($sql->execute([$item])) {
			return true;			
		}
			throw new Exception("Sorry, something went wrong, Try again!");

	}
	
	/* end of deletion*/
	
	

	public function cleanse($str)
	{
   #$Data = preg_replace('/[^A-Za-z0-9_-]/', '', $Data); /** Allow Letters/Numbers and _ and - Only */
		$str = htmlentities($str, ENT_QUOTES, 'UTF-8'); /** Add Html Protection */
		$str = stripslashes($str); /** Add Strip Slashes Protection */
		if($str!=''){
			$str=trim($str);
			return $str;
		}
	}
	public function passwordFilter($str)
	{
   #$Data = preg_replace('/[^A-Za-z0-9_-]/', '', $Data); /** Allow Letters/Numbers and _ and - Only */
		$str = htmlentities($str, ENT_QUOTES, 'UTF-8'); /** Add Html Protection */
		$str = stripslashes($str); /** Add Strip Slashes Protection */
			if(empty($str)){
			throw new Exception("Password must not be empty");
			
		}
		if($str!=''){
			$str=trim($str);
			return $str;
		}

	}


	public function updateCategory($post,$file)
	{		  $id = $_POST['id'];
	$photo="";
		$category = $this->cleanse(ucfirst($_POST['category']));

			
		 if(!empty($_FILES['photo']['name'])){
		$oldphoto =$this->displayField('category','photo','id',$id);
		unlink('../images/icons/'.$oldphoto);
	
		  $temp = $this->validatePhoto('photo',(1024*1024*4));
        $folder = "../images/icons/" ;  
        $imgv1 = $_FILES['photo']['name']; 

        $photo ='cat-edited'.uniqid().rand(11111,242222).$imgv1;  
        move_uploaded_file($temp,$folder.$photo);
}else{
$photo =$this->displayField('category','photo','id',$id);
}
		$query="UPDATE category SET category=?, photo=? WHERE id=?";
		$sql = $this->con->prepare($query);
	
		if ($sql->execute([$category,$photo,$id])) {
			return 'category has been edited successfully';
			}
			throw new Exception("Sorry, something went wrong, category not added");
		
	}



	

	public function greeting()
	{
      //Here we define out main variables 
		$welcome_string="Welcome!"; 
		$numeric_date=date("G"); 

 //Start conditionals based on military time 
		if($numeric_date>=0&&$numeric_date<=11) 
			$welcome_string="Good Morning!,"; 
		else if($numeric_date>=12&&$numeric_date<=17) 
			$welcome_string="Good Afternoon!,"; 
		else if($numeric_date>=18&&$numeric_date<=23) 
			$welcome_string="Good Evening!,"; 

		return $welcome_string;

	}

	 public function exist($table, $column,$item):bool{
	 	$query = "SELECT * FROM {$table} WHERE {$column}=?";
		$result =  $this->con->prepare($query);
		$result->execute([$item]);
		if ($result->rowCount() > 0) {
			return true;
		}else{
			return false;
		}

	 }



	 public function exist2($table, $column1,$column2,$item1,$item2):bool{
	 	$query = "SELECT * FROM {$table} WHERE {$column1}=? AND {$column2}=?";
		$result =  $this->con->prepare($query);
		$result->execute([$item1,$item2]);
		if ($result->rowCount() > 0) {
			return true;
		}else{
			return false;
		}

	 }

	 public function exist3($table, $column1,$column2,$column3,$item1,$item2,$item3):bool{
	 	$query = "SELECT * FROM {$table} WHERE {$column1}=? AND {$column2}=? AND {$column3}=?";
		$result =  $this->con->prepare($query);
		$result->execute([$item1,$item2,$item3]);
		if ($result->rowCount() > 0) {
			return true;
		}else{
			return false;
		}

	 }




	 public function validatePhoto($file,$maxsize=(1024*1024*5)){
						$mb=$maxsize/1024;
						$fname=$_FILES[$file]['name'];
						$size=$_FILES[$file]['size'];
						$size = ($size/1024);
						$temp=$_FILES[$file]['tmp_name'];
					      $fileXtension=pathinfo($fname,PATHINFO_EXTENSION);
					     if( $fileXtension!='jpg' && $fileXtension!='png'&& $fileXtension!='PNG' && $fileXtension!='jpeg') {
					     	throw new Exception("Invalid file format, png or jpg file type expected!");
					     }
					     elseif($size>$maxsize){
					throw new Exception("File size too large, file size must be less or equal to ".floor($mb). " MB");
			

					     }else{

					      return $temp;
					     
					     }

										 }
        public function get_time_ago( $time )
{
    $time_difference = time() - $time;

    if( $time_difference < 1 ) { return 'less than 1 second ago'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return 'about ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
        }
    }
}

public function get_time_ago2( $time )
{
    $time_difference = time() - $time;

    if( $time_difference < 1 ) { return 'less than 1 second ago'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hr',
                60                      =>  'min',
                1                       =>  'sec'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
        }
    }
}


public function showInput($postname){
	if(isset($_POST[$postname])){
	return $_POST[$postname];
}
return '';
}

	public function encrypt($password){
		$hash = password_hash($password, PASSWORD_DEFAULT);
		return $hash;
	}
	public function decrypt($password,$hashed_pswd){
		$raw_pswd = password_verify($password, $hashed_pswd);
		return $raw_pswd;	
	}
	public function isValidEmail($email){
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			throw new Exception("Invalid Email,please check and try again!");
		}else{
			return $email;
		}
	}
}


?>