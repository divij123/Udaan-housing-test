<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');  

	include_once '../../config/database.php';
	include_once '../../models/asset.php';

	$database = new Database();
    $db = $database->connect();
    
    $asset = new Asset($db);

    $data = json_decode(file_get_contents("php://input"));

    $asset->assetid = $data->assetid;
    $asset->description = $data->description;

    if($asset->create()) {
        echo json_encode(
            array('message' => 'Asset Created')
        );
    } else {
        echo json_encode(
            array(
                'assetid' => $asset->assetid,
                'description' => $asset->description,
                'message' => 'Asset not created')
        );
    }
