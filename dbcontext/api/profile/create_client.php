<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once './../../dbcontext/connect.php';
function create_token()
{
    $token = md5(uniqid(rand(), true));
    return $token;
}

function generate_6_digit_number() {
  $number = rand(100000, 999999);
  return $number;
}


// get posted data
$user_id = $_POST['user_id'];
$user_name = $_POST['name'];
$user_phone = $_POST['phone'];
$user_email = $_POST['email'];
$user_type = $_POST['type'];
$user_token = create_token();
// include database and object files
// Check for duplicate email

$cmd = "SELECT * FROM clients WHERE client_email = '$user_email' or client_phone = '$user_phone'";
$res = mysqli_query($con, $cmd);
if (mysqli_num_rows($res) > 0) {
    // set response code - 503 service unavailable
    http_response_code(503);
    // tell the user
    echo json_encode(
        array(
            "success" => false,
            "message" => "الهاتف أو البريد الإلكتروني مسجل لدينا بالفعل",
            "data" => []
        )
    );
    exit();
} else {
    $cmd = "insert into clients (user_token,client_type,client_name,client_phone,client_email) values 
    ('$user_id','$user_type','$user_name','$user_phone','$user_email')";
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