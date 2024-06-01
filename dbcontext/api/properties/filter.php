<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once './../../dbcontext/connect.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Check if it's a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Initialize an array to store conditions
    $conditions = array();

    // Retrieve filter parameters from the POST request
    $prop_state = isset($_POST['prop_state']) ? mysqli_real_escape_string($con, $_POST['prop_state']) : null;
    $adv_type = isset($_POST['adv_type']) ? mysqli_real_escape_string($con, $_POST['adv_type']) : null;
    $prop_type = isset($_POST['prop_type']) ? mysqli_real_escape_string($con, $_POST['prop_type']) : null;

    $min_price = isset($_POST['min_price']) ? intval($_POST['min_price']) : null;
    $max_price = isset($_POST['max_price']) ? intval($_POST['max_price']) : null;

    // Add dynamic filters based on the provided parameters
    if ($prop_state !== null) {
        $conditions[] = "prop_state LIKE '%$prop_state%'";
    }
    
        if ($prop_type !== null) {
        $conditions[] = "prop_type = '$prop_type'";
    }



    if ($adv_type !== null) {
        $conditions[] = "adv_type = '$adv_type'";
    }
    if ($min_price !== null && $max_price !== null) {
        $conditions[] = "prop_price BETWEEN $min_price AND $max_price";
    }

    // Construct the SQL query
    $sql = "SELECT * FROM props";

    // Add WHERE clause if conditions are present
    if (!empty($conditions)) {
        $sql .= " WHERE " . implode(' AND ', $conditions);
    }

    $result = mysqli_query($con, $sql);

    if ($result) {
        $jsonArray = array();

        while ($row = mysqli_fetch_assoc($result)) 
        {
           $item = array();
           $prop_owner = $row['user_id'];
           $cmd1 = "select * from users where user_token = '$prop_owner'";
           $res1 =  mysqli_query($con,$cmd1);
           $user = mysqli_fetch_assoc($res1);
           $item = array_merge($row,["user" => $user]);
           array_push($jsonArray,$item);
        }

        http_response_code(200);
        echo json_encode(array(
            "success" => true,
            "data" => $jsonArray
        ));
        exit();
    } else {
        // set response code - 503 service unavailable
        http_response_code(503);
        // tell the user
        echo json_encode(array(
            "success" => false,
            "message" => mysqli_error($con)
        ));
        exit();
    }
} else {
    // set response code - 400 Bad Request
    http_response_code(400);
    // tell the user
    echo json_encode(array(
        "success" => false,
        "message" => "Invalid request method. Only POST requests are allowed."
    ));
    exit();
}
?>