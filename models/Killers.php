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

        public function getKiller()
        {
            $query = 'SELECT * FROM ' . $this->table . ' WHERE name=?';

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->name);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->role = $row['role'];
            $this->fullname = $row['fullname'];
            $this->realm = $row['realm'];
            $this->power = $row['power'];
            $this->weapon = $row['weapon'];
            $this->speed = $row['speed'];
            $this->terror_radius = $row['terror_radius'];
            $this->dlc = $row['dlc'];
            $this->perks = $row['perks'];

            return $stmt;
        }
    }
?>