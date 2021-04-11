<?php
    class ddbb{
        private $servername;
        private $username;
        private $password;
        private $dbname;
        private $conn;
        public function __construct($servername, $username, $password, $dbname) {
            $this->servername = $servername;
            $this->username = $username;
            $this->password = $password;
            $this->dbname = $dbname;
            $this->connect();
            
        }
        public function __destruct() {
            $conn = null; 
        }
        public function createTable($tableSQL){
            try {
              $this->conn->exec($tableSQL);
              echo "Table Created <br>";
            } catch(PDOException $e) {
              echo "Creation failed: " . $e->getMessage() . "<br>";
            }
        }
        public function dropTable($tableName){
            try {
              $this->conn->exec("DROP TABLE " . $tableName);
              echo "Table Dropped <br>";
            } catch(PDOException $e) {
              echo "Drop failed: " . $e->getMessage() . "<br>";
            }
        }
        public function insertEstadistica($modalitat, $nivell, $intents){
            $syntax = "INSERT INTO estadisticas (modalitat, nivell, intents) VALUES ('$modalitat', $nivell, $intents)";
            try {
              $this->conn->exec($syntax);
              echo "Insert Succeded <br>";
            } catch(PDOException $e) {
              echo "Insert Failed: " . $e->getMessage() . "<br>";
            }

        }
        public function connect(){
            try {
              $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
              // set the PDO error mode to exception
              $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              echo "Connected successfully <br>";
            } catch(PDOException $e) {
              echo "Connection failed: " . $e->getMessage() . "<br>";
            }
        }
        public function getConn(){
            return $this->conn;
        }
    }
?>