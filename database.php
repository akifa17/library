<?php 
    require_once("configure.php");

    class database{
        private $conn;

        public function  __construct(){
            $this->openConnection();

        }


        private function openConnection(){
            $this->conn=mysqli_connect(DB_HOST, DB_USER, DB_PASS);

            if (!$this->conn) {
                die("Database Connection failed ".mysqli_connect_error());
            }

            else{
                $select_db=mysqli_select_db($this->conn, DB_NAME);

                if (!$select_db) {
                    die("Database Selection Problem ". mysqli_error());
                }
            }
        }

        public function closeConnection(){
            if (isset($this->conn)) {
                mysqli_close($this->conn);
                unset($this->conn);
            }
        }

        public function perform_query($q){
            //$q=mysqli_real_escape_string($this->conn, $q);
            //echo $q;
            $result=mysqli_query($this->conn, $q);


            if (!$result) {
                die("There was an error With The Result ".mysqli_error());
            }

            return $result;
        }

        public function fetch_result($result){

            return mysqli_fetch_assoc($result);
        }

        public function last_insertedid(){

            return mysqli_insert_id($this->conn);
        }

        public function num_rows($result){

            return mysqli_num_rows($result);

        }

        public function authenticate($email, $pass){

            $email=mysqli_real_escape_string($this->conn, $email);
            $pass=mysqli_real_escape_string($this->conn, $pass);

            $sql="SELECT * from user where email='{$email}' AND password='{$pass}'";

            $result=$this->perform_query($sql);
            $result=$this->fetch_result($result);

            if ($result!=null) {
                session_start();
                //var_dump($result);
                $_SESSION["id"]=$result['iduser'];
                //ADMIN : 
                if($result['iduser']==5){
                  header("Location:admin.php");  
                }
                else{
                header("Location:profile.php");
            }
               // header("refresh:2, url=profile.php");
            }

            return false;

        }// End of authentication

        public function logout(){

            unset($_SESSION['id']);
            session_unset();
            header("Location:login.php");
        }
$databaseCall=new database();
    
    ini_set('display_errors', 0);
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
 ?>