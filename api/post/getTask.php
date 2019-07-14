<?php

	 header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	include_once '../../config/database.php';
	include_once '../../models/task.php';


	$database = new Database();
	$db = $database->connect();

	$task = new Task($db);

	$workerid=isset($_GET["w"]) ? $_GET["w"] : "";

	$result = $task->read($workerid);

	$num = $result->rowCount();

    if($num>0) {

 	$gettask_arr = array();

 	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
 		extract($row);

 		$gettask_item = array(
 			"taskid" => $taskid,
			 "workerid" => $workerid,
			 "assetid" => $assetid,
 			"start" => $start
 		);

 		array_push($gettask_arr, $gettask_item);
 	} 

 	http_response_code(200);

 	echo json_encode($gettask_arr);
 }  

 else {
    http_response_code(404);
 
    echo json_encode(
        array("message" => "No Tasks found.")
    );

 }
