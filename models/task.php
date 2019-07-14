<?php
	class Task {

		private $conn;
		private $table = "tasks";

		public $id;
		public $taskid;
		public $description;

		public function __construct($db) {
			$this->conn = $db;
		}

		public function read($workerid) {

			$query = "SELECT workerid, taskid, assetid,start FROM allocate WHERE workerid = ?";

			$stmt = $this->conn->prepare($query);

			$workerid=htmlspecialchars(strip_tags($workerid));

			$stmt->bindParam(1, $workerid);

			$stmt->execute();

			return $stmt;

		}

		public function create() {

			$query = "INSERT INTO " . $this->table . 
			" SET taskid = :taskid, description = :description";

			$stmt = $this->conn->prepare($query);

			$this->taskid = htmlspecialchars(strip_tags($this->taskid));
			$this->description = htmlspecialchars(strip_tags($this->description));

			$stmt->bindParam(":taskid",$this->taskid);
			$stmt->bindParam(":description",$this->description);

			if($stmt->execute()) {
				return true;
			} 
			
			printf("ERROR: %s. \n" , $stmt->error);

			return false;
		}
	}
