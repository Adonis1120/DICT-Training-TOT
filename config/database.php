<?php
    class Database {
        private $host = "localhost";
        private $dbName = "webdev_tot";
        private $username = "root";
        private $password = "";

        public $conn;

        public function getConnection() {
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName, $this->username, $this->password);
            } catch(PDOException $exception) {
                echo "Database Connection Error: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }
?>