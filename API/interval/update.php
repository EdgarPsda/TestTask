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

// get data
$data = json_decode(file_get_contents("php://input"));

// set id and values of the interval to be edited
$interval->set_id($data->id);
$interval->set_date_start($data->date_start);
$interval->set_date_end($data->date_end);
$interval->set_price($data->price);

// update interval
if($interval->update()){
    // edited response code
    http_response_code(200);

    echo json_encode(array("message" => "Interval was updated."));
}
else{
    // added response code
    http_response_code(503);

    echo json_encode(array("message" => "Unable to update interval."));
}




?>