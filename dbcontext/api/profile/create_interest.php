<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once './../../dbcontext/connect.php';

// get posted data
$user_id = $_POST['user_id'];
$city_id = $_POST['city_id'];
$city_name = $_POST['city_name'];

$cmd = "SELECT * FROM interests where city_id = '$city_id' and client_id = '$user_id'";
$res = mysqli_query($con, $cmd);
if (mysqli_num_rows($res) > 0) {
    http_response_code(503);
    echo json_encode(
        array(
            "success" => false,
            "message" => "المدينة مضافة بالفعل في الإهتمامات",
            "data" => []
        )
    );
    exit();
} else {
    $cmd = "insert into interests (city_id,city_name,client_id) values ('$city_id','$city_name','$user_id')";
    $res = mysqli_query($con, $cmd);

    if ($res) {
        echo json_encode(
            array(
                "success" => true,
                "message" => "",
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
}
?>