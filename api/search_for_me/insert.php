<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once './../../dbcontext/connect.php';


$user_token = mysqli_real_escape_string($con, $_POST['user_token']);
$prop_type = mysqli_real_escape_string($con, $_POST['prop_type']);
$req_type = mysqli_real_escape_string($con, $_POST['req_type']);
$state = mysqli_real_escape_string($con, $_POST['state']);
$city = mysqli_real_escape_string($con, $_POST['city']);
$price_type = mysqli_real_escape_string($con, $_POST['price_type']);
$min_price = (int)$_POST['min_price'];
$max_price = (int)$_POST['max_price'];
$min_space = (int)$_POST['min_space'];
$max_space = (int)$_POST['max_space'];
$prop_desc = mysqli_real_escape_string($con, $_POST['prop_desc']);
$date_created = date("Y-m-d H:i:s");


// Insert data into the database
$query = "INSERT INTO search_for_me (user_token, req_type, realstate_type, state, city, price_type, min_price, max_price, min_space, max_space, req_desc, date_created) VALUES 
('$user_token', '$req_type', '$prop_type', '$state', '$city', '$price_type', $min_price, $max_price, $min_space, $max_space, '$prop_desc', '$date_created')";

$result = mysqli_query($con, $query);

if ($result) {
    // Send notifications to users
    $notificationTitle = "تم إضافة طلب جديد بمدينة " . $state;
    $notificationBody = "يمكنك الإطلاع علية الأن";

    $query1 = "SELECT notification_token FROM users";
    $result1 = mysqli_query($con, $query1);

    // while ($user = mysqli_fetch_array($result1)) {
    //     // Assuming send_notification is correctly implemented
    //     send_notification($user['notification_token'], $notificationTitle, $notificationBody);
    // }

    http_response_code(200);
    echo json_encode(["success" => true, "message" => "تمت الإضافة بنجاح"]);
} else {
    // Log the error on the server side
    error_log("Database Error: " . mysqli_error($con));

    http_response_code(503);
    echo json_encode(["success" => false, "message" => "خطأ في إضافة البيانات"]);
}
?>