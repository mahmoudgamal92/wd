<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once './../../dbcontext/connect.php';
$cats = array();
$states = array();


// Cats
$cmd = "SELECT * FROM notifications";
$res = mysqli_query($con, $cmd);

$notification = array();
if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        array_push($notification, $row);
    }

    echo json_encode(array(
        "success" => true,
        "data" => $notification
    ));
} else {
    echo json_encode(array(
        "success" => false,
        "message" => "No Notification",
    ));
}
