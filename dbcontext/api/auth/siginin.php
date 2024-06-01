<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once './../../dbcontext/connect.php';
$user_phone =  $_POST['phone'];

$cmd = "SELECT * FROM users WHERE user_phone = '$user_phone'";
$res = mysqli_query($con, $cmd);
$user = mysqli_fetch_assoc($res);
if(mysqli_num_rows($res) > 0)
{
    http_response_code(200);
    echo json_encode(array(
            "success" => true,
            "data" => $user
        ));
    exit();
}

else{
    // set response code - 503 service unavailable
    http_response_code(503);
    // tell the user
    echo json_encode(array([
        "success" => "false",
        "message" => mysqli_error($con)
        ]
    ));
}
?>