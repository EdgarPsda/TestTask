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

// validating data is not empty
if(
    !empty($data->date_start) &&
    !empty($data->date_end) &&
    !empty($data->price)
){
// set values
    $interval->set_date_start($data->date_start);
    $interval->set_date_end($data->date_end);
    $interval->set_price($data->price);
    
    if($interval->add_interval())
    {
        // added response code
        http_response_code(201);

        echo json_encode(array("message" => "Interval was created."));
    }
    else{
        // unable response code
        http_response_code(503);
        echo json_encode(array("message" => "Unable to create interval."));
    }
}
else{
    echo json_encode(array("message" => "Unable to create interval, all fields required."));
}

?>