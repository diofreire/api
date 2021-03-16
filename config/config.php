<?php 
    class Database {
        private $host = "127.0.0.1";
        private $username = "phpapidb";
        private $password = "phpapidb";

        public $conn;

        public function getConnection($database_name){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $database_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Database could not be connected: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }  
?>