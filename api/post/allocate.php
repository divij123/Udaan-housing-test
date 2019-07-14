<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');  

	include_once '../../config/database.php';
	include_once '../../models/allocate.php';

	$database = new Database();
    $db = $database->connect();
    
    $allocate = new Allocate($db);

    $data = json_decode(file_get_contents("php://input"));

    $allocate->workerid = $data->workerid;
    $allocate->taskid = $data->taskid;
    $allocate->assetid = $data->assetid;
    $allocate->completed = $data->completed;

    if($allocate->create()) {
        echo json_encode(
            array('message' => 'Task Allocated')
        );
    } else {
        echo json_encode(
            array(
                'message' => 'Task not Allocated')
        );
    }
