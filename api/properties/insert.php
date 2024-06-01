<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once './../../dbcontext/connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $responseData = [];

    // Loop through all POST data
    foreach ($_POST as $key => $value) {
        if (is_uploaded_file($_FILES[$key]['tmp_name'])) {
            // Handle file upload
            $fileInfo = [
                'name' => $_FILES[$key]['name'],
                'type' => $_FILES[$key]['type'],
                'size' => $_FILES[$key]['size'],
                'tmp_name' => $_FILES[$key]['tmp_name'],
            ];
            $responseData[$key] = $fileInfo;
        } else {
            // Handle regular text input
            $responseData[$key] = $value;
        }
    }

    // Convert the associative array to JSON
    $jsonResponse = json_encode($responseData);

    // Return the JSON response
    http_response_code(200);
    echo $jsonResponse;
} else {
    // Return a method not allowed status code
    http_response_code(405);
    echo json_encode(["error" => "Method Not Allowed"]);
}
?>