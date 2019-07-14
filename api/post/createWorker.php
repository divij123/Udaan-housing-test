<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');  

	include_once '../../config/database.php';
	include_once '../../models/worker.php';

	$database = new Database();
    $db = $database->connect();
    
    $worker = new Worker($db);

    $data = json_decode(file_get_contents("php://input"));

    $worker->workerid = $data->workerid;
    $worker->name = $data->name;

    if($worker->create()) {
        echo json_encode(
            array('message' => 'Worker Created')
        );
    } else {
        echo json_encode(
            array('message' => 'Worker not created')
        );
    }
