<?php
    class Database {
        private $db_host = 'localhost';
        private $db_name = 'dbd';
        private $db_username = 'root';
        private $db_password = '';
        private $db_conn;

        public function connect() {
            try{
                $this->db_conn = new PDO('mysql:host=' . $this->db_host . ';dbname=' . $this->db_name, $this->db_username, $this->db_password);
                $this->db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                echo 'Connection Error: '.$e->getMessage();
            }
            return $this->db_conn;
        }
    }
?>