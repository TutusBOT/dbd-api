<?php
    class Killers {
        private $conn;
        private $table = 'characters';

        public $id;
        public $name;
        public $role;
        public $fullname;
        public $realm;
        public $power;
        public $weapon;
        public $speed;
        public $terror_radius;
        public $dlc;
        public $perks;

        public function __construct($db)
        {
            $this->conn = $db;
        }

        public function getKillers() 
        {
            $query = 'SELECT * FROM ' . $this->table . ' ORDER BY name';

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }
    }
?>