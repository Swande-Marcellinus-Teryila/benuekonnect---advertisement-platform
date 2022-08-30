<?php 
/**
 * 
 */
class Auth extends Crud

{
	
	private $password=null;
	private $email=null;



	 public function validateLogin($post){
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$email = $_POST['email'];
			$password = $_POST['password']; 
			
		  		if($this->is_AuthenticatedUser($email,$password)){
		 
		   if($this->checkUserLevel($email)=='0'){
		   	 $_SESSION['user'] = $this->displayFieldOr('users','id','email','phone',$email,$email);
		    $this->redirect('users/index.php');
		} elseif($this->checkUserLevel($email)=='2'){
			$_SESSION['adminlogins'] = $this->displayFieldOr('users','id','email','phone',$email,$email);
			$this->redirect('admin/');
		}

		  }else{
		  	throw new Exception("Invalid details");
		  	
		  }
	
	}
}


	public function is_AuthenticatedUser($email,$password){

		$this->email=$email;
		$sql="SELECT  *FROM users where email=? or phone=? LIMIT 1";
	
			$stmt=$this->con->prepare($sql);
			$stmt->execute([$email,$email]);
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() > 0){
				if(password_verify($password,$row['password'])){

					return true;
				}
				else{
				return false;
			}
		}
		else{
			return false;
		}
	}


	public function checkUserLevel($email){

		$sql="SELECT  *FROM users where email=? or phone=? LIMIT 1";
	
			$stmt=$this->con->prepare($sql);
			$stmt->execute([$email,$email]);
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			return $row['user_level'];
		
	}

		/* this method register a new admin */
		public function regAdmin($email,$password,$userlevel)
	{
		global $con;

		
		$query="INSERT INTO login(email, password, userlevel)values(?,?,?)";
		$values=array($email,$password,$userlevel);
		try{
		$stmt=$con->prepare($query);
		$stmt->execute($values);
		
	}catch(PDOException $e) {
			throw new Exception("database connection error");
			

		}


	}
	

	public function checkLogin($session){

			if(!isset($_SESSION[$session])){
				$this->redirect("../");
			}
	}

	public function userInfo($column,$id){
		$data = $this->displayAllSpecific('users',$column,$id);
		return $data;
	}
	public function redirect($url){
		header('location:'.$url);
	}
	public function getReferral($referral){
		if(isset($referral)){
			$this->insertReferral($referral);
		}
	}
}
?>