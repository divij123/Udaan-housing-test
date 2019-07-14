<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');  

	include_once '../../config/database.php';
	include_once '../../models/task.php';

	$database = new Database();
    $db = $database->connect();
    
    $task = new Task($db);

    $data = json_decode(file_get_contents("php://input"));

    $task->taskid = $data->taskid;
    $task->description = $data->description;

    if($task->create()) {
        echo json_encode(
            array('message' => 'Task Created')
        );
    } else {
        echo json_encode(
            array('message' => 'Task not created')
        );
    }
