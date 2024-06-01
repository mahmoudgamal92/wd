<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: multipart/form-data");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// get database connection
include_once './../../dbcontext/connect.php';

$id = $_GET['id'];
$cmd = "delete from interests where id = '$id'";
$res = mysqli_query($con, $cmd);
if($res){
    // set response code - 201 created
    http_response_code(200);
    // tell the user
    echo json_encode(array(
        "success" => true,    
        "message" => "deleted successfully"
        ));
}

else{
    // set response code - 503 service unavailable
    http_response_code(503);
    // tell the user
    echo json_encode(array(
        "success" => false,
        "message" => mysqli_error($con),
    ));
}