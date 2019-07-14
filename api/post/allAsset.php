<?php

	 header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	include_once '../../config/database.php';
	include_once '../../models/asset.php';


	$database = new Database();

	$db = $database->connect();

	$getasset = new Asset($db);

	$result = $getasset->read();

	$num = $result->rowCount();

    if($num>0) {

 	$getasset_arr = array();


 	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
 		extract($row);

 		$getasset_item = array(
 			"assetid" => $assetid,
 			"description" => html_entity_decode($description)
 		);

 		array_push($getasset_arr, $getasset_item);
 	} 

 	http_response_code(200);

 	echo json_encode($getasset_arr);
 }  

 else {
    http_response_code(404);
 
    echo json_encode(
        array("message" => "No assets found.")
    );

 }
