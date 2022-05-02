<?php
    class Character {
        private $conn;
        private $table = 'characters';

        public $id;
        public $name;
        public $role;
        public $fullname;
        public $nationality;
        public $realm;
        public $power;
        public $weapon;
        public $speed;
        public $terror_radius;
        public $perks;
        public $voice_actor;
        public $is_free;
        public $dlc_id;

        public function __construct($db)
        {
            $this->conn = $db;
        }

        public function getKillers() 
        {
            $query = 'SELECT * FROM ' . $this->table . ' WHERE role="killer" ORDER BY name';

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function getKiller()
        {
            $query = 'SELECT * FROM ' . $this->table . ' WHERE name=? and role="killer" LIMIT 1';

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->name);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->role = $row['role'];
            $this->fullname = $row['fullname'];
            $this->nationality = $row['nationality'];
            $this->realm = $row['realm'];
            $this->power = $row['power'];
            $this->weapon = $row['weapon'];
            $this->speed = $row['speed'];
            $this->terror_radius = $row['terror_radius'];
            $this->perks = $row['perks'];
            $this->voice_actor = $row['voice_actor'];
            $this->is_free = $row['is_free'];
            $this->dlc_id = $row['dlc_id'];

            return $stmt;
        }

        public function getSurvivors() 
        {
            $query = 'SELECT * FROM ' . $this->table . ' WHERE role="survivor" ORDER BY name';

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function getSurvivor()
        {
            $query = 'SELECT * FROM ' . $this->table . ' WHERE name = ? and role="survivor" LIMIT 1';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->name);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->role = $row['role'];
            $this->fullname = $row['fullname'];
            $this->nationality = $row['nationality'];
            $this->perks = $row['perks'];
            $this->voice_actor = $row['voice_actor'];
            $this->is_free = $row['is_free'];
            $this->dlc_id = $row['dlc_id'];

            return $stmt;
        }
    }
?>