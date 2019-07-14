<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/database.php';
include_once '../../models/allocate.php';


$database = new Database();
$db = $database->connect();

$allocate = new Allocate($db);

$result = $allocate->read();

$num = $result->rowCount();

if ($num > 0) {

	$allocate_arr = array();

	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		extract($row);

		$allocate_item = array(
			"taskid" => $taskid,
			"workerid" => $workerid,
			"assetid" => $assetid,
			"start" => $start,
			"completed" => $completed
		);

		array_push($allocate_arr, $allocate_item);
	}

	http_response_code(200);

	echo json_encode($allocate_arr);
} else {
	http_response_code(404);

	echo json_encode(
		array("message" => "No allocated tasks found.")
	);
}
