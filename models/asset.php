<?php

	class Asset{

		private $conn;
		private $table = "assets";

		public $id;
		public $assetid;
		public $description;
	


		public function __construct($db) {
			$this->conn = $db;
		}

		public function read() {

			$query = "SELECT assetid,description FROM " . $this->table;

			$stmt = $this->conn->prepare($query);

			$stmt->execute();

			return $stmt;

		}

		public function create() {

			$query = "INSERT INTO " . $this->table . 
			" SET assetid = :assetid, description = :description";

			$stmt = $this->conn->prepare($query);

			$this->assetid = htmlspecialchars(strip_tags($this->assetid));
			$this->description = htmlspecialchars(strip_tags($this->description));

			$stmt->bindParam(":assetid",$this->assetid);
			$stmt->bindParam(":description",$this->description);

			if($stmt->execute()) {
				return true;
			} 
			
			printf("ERROR: %s. \n" , $stmt->error);

			return false;
		}
	}
