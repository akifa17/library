<?php 
	require_once("configure.php");
	require_once("database.php");

	/**
	* This is checking class 
	*/

	class users
	{
		
		
		public $username;
		public $email;
		public $password;
		public $email;
		public $confirm;
		
		

		public function find_all(){

			return self::find_by_sql("SELECT * FROM users");
		}//END OF FIND ALL


public function find_users_by_sql($sql){
			global $databaseCall;

			//$q=mysqli_real_escape_string($databaseCall->$sql);

			$result=$databaseCall->perform_query($sql);

			$result=$databaseCall->fetch_result($result);

			return $result;
		}//END OF FIND BY SQL


		public function find_users_by_email($email){
			return self::find_users_by_sql("SELECT * FROM user WHERE email = '{$email}' LIMIT 1");
		}//END OF FIND BY EMAIL

		public function signUp(){
			global $databaseCall;
			$sql="INSERT INTO users ( ";
			$sql.="username, email, password) ";
			$sql.="values ('{$this->username}', '{$this->email}', ";
			$sql.="'{$this->password}')";


			return $databaseCall->perform_query($sql);
		}



	}

	$users=new users();
	//echo $user->find_users_by_email("a@gmail.com");

?>