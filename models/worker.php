<?php 

	class Worker{

		private $conn;
		private $table = 'workers';

		public $id;
		public $workerid;
		public $name;

		public function __construct($db) {
			$this->conn = $db;
		}

		public function read() {
			$query = "SELECT workerid,name FROM ". $this->table;

			$stmt = $this->conn->prepare($query);

			$stmt->execute();

			return $stmt;

        }
        
        public function create() {

			$query = "INSERT INTO " . $this->table . 
			" SET workerid = :workerid, name = :name";

			$stmt = $this->conn->prepare($query);

			$this->workerid = htmlspecialchars(strip_tags($this->workerid));
			$this->name = htmlspecialchars(strip_tags($this->name));

			$stmt->bindParam(":workerid",$this->workerid);
			$stmt->bindParam(":name",$this->name);

			if($stmt->execute()) {
				return true;
			} 
			
			printf("ERROR: %s. \n" , $stmt->error);

			return false;
		}
	}
