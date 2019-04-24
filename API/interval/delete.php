<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// db connection
include_once '../../config/database.php';

// interval object
include_once '../../objects/interval.php';

$database = new Database();
$db = $database->getConnection();

$interval = new Interval($db);

// get post data
$data = json_decode(file_get_contents("php://input"));

// set id to be deleted
$interval->set_id($data->id);

if($interval->delete()){

    // response code 200 ok
    http_response_code(200);

    echo json_encode(array("message" => "Interval was deleted."));
}else{
    // response code 503 ok
    http_response_code(503);

    echo json_encode(array("message" => "Unable to delete interval."));
}

?>