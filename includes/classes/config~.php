<?php 
/**
 * 
 */
class Config
{       
					private $password = 'benueKonnect21201';
					private $user = 'benuzzkd_benuekonnect';
				// Establish database connection
				protected $con;
				private $dsn="mysql:host=localhost; dbname=benuzzkd_ecommerce";
    
					function __construct()
					{		if(getHostByName(getHostByName($_SERVER['REMOTE_ADDR']))!='127.0.0.1'){
						error_reporting(0);
					}
						try {
							$this->con = new PDO($this->dsn,$this->user,$this->password);
							return $this->con;
						} catch(PDOEXCEPTION $se) {
							exit("Error: " . $se->getMessage());
						}
					}

					public function title(){
						return 'BenueKonnect';
					}
}
?>