<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once './../../dbcontext/connect.php';
require_once './../utils/index.php';

// get posted data

$user_token = $_POST['user_token'];
$user_phone = (int)$_POST['phone'];
$subject = $_POST['subject'];
$details = $_POST['details'];

$success_msg = "تم إستلام الطلب";
$cmd = "insert into complains (user_token, user_phone, subject, details) values ('$user_token', '$user_phone', '$subject','$details')";
$res = mysqli_query($con, $cmd);

    if ($res) {
        //sendSMS($user_phone, $success_msg);
        echo json_encode(
            array(
                "success" => true,
                "message" => $success_msg,
                "phone" => $user_phone,
                "response" => sendSMS($user_phone, $success_msg),

            )
        );
    } else {
        // set response code - 503 service unavailable
        http_response_code(503);
        // tell the user
        echo json_encode(
            array(
                "success" => "false",
                "message" => mysqli_error($con),
            )
        );
    }
?>