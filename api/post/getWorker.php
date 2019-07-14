<?php

	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	include_once '../../config/database.php';
	include_once '../../models/worker.php';


	$database = new Database();

	$db = $database->connect();

	$worker = new Worker($db);

	$result = $worker->read();

	$num = $result->rowCount();

    if($num>0) {

 	$worker_arr = array();

 	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
 		extract($row);

 		$worker_item = array(	
 			"workerid" => $workerid,
 			"name" => $name
 		);

 		array_push($worker_arr, $worker_item);
 	} 

 	http_response_code(200);

 	echo json_encode($worker_arr);
 }  

 else {
    http_response_code(404);
 
    echo json_encode(
        array("message" => "No Workers found.")
    );

 }
