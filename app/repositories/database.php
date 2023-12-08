<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/config/config.php");
    

    class Database {
        private $db_host = DB_HOST;
        private $db_name = DB_NAME;
        private $db_user = DB_USER;
        private $db_pass = DB_PASS;
        private $connect;
        private $stmt;
        private $error;

        public function __construct()
        {
            $this->connectDB();
        }


        // // Connction to data base
        // public function getStmt(){
        //     return $this->stmt;
        // }
        // public function setStmt($stmt){
        //     $this->stmt = $stmt;
        // }

        // Connction to data base
        public function connectDB() {
            try {
                $this->connect = new PDO("mysql:host=" . $this->db_host . ";dbname=" . $this->db_name, $this->db_user , $this->db_pass );
                $this->connect->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
                
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                return $this->error;  
            }

        }

        public function query($sqlQuery){
            $this->stmt = $this->connect->prepare($sqlQuery);
        }

        public function bind($placeholder,$value,$type = null){
            if(is_null($type)){
                switch($value){
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_string($value):
                        $type = PDO::PARAM_STR;
                        break;
                    default:
                        $type = PDO::PARAM_NULL;
                }
            }
            $this->stmt->bindParam($placeholder,$value,$type);
        }

        public function execute (){
            return $this->stmt->execute();
        }

        public function fetchOne(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }
        
        public function fetchMultipleRows(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

    }







    






?>