<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the request has a body
    $request_body = file_get_contents('php://input');
    if (!empty($request_body)) {
        // Check if the content type is JSON
        if (strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false) {
            // JSON request body
            echo $request_body;
        } else {
            // Form data
            parse_str($request_body, $parsed_body);
            foreach ($parsed_body as $key => $value) {
                echo "$key: $value\n";
            }
        }
    } else {
        echo "No request body received.";
    }
} else {
    echo "Only POST requests are allowed.";
}
?>