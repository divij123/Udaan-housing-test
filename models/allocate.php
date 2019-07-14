<?php
class Allocate
{

	private $conn;
	private $table = "allocate";

	public $taskid;
	public $assetid;
	public $workerid;
	public $start;
	public $completed;

	public function __construct($db)
	{
		$this->conn = $db;
	}

	public function read()
	{

		$query = "SELECT workerid, taskid, assetid, start,completed FROM " . $this->table;

		$stmt = $this->conn->prepare($query);

		$stmt->execute();

		return $stmt;
	}

	public function create()
	{

		$query = "INSERT INTO " . $this->table .
			" SET workerid = :workerid , taskid = :taskid, assetid = :assetid , completed = :completed";

		$stmt = $this->conn->prepare($query);

		$this->workerid = htmlspecialchars(strip_tags($this->workerid));
		$this->taskid = htmlspecialchars(strip_tags($this->taskid));
		$this->assetid = htmlspecialchars(strip_tags($this->assetid));
		$this->completed = htmlspecialchars(strip_tags($this->completed));

		$stmt->bindParam(":workerid", $this->workerid);
		$stmt->bindParam(":taskid", $this->taskid);
		$stmt->bindParam(":assetid", $this->assetid);
		$stmt->bindParam(":completed", $this->completed);


		if ($stmt->execute()) {
			return true;
		}

		printf("ERROR: %s. \n", $stmt->error);

		return false;
	}
}
