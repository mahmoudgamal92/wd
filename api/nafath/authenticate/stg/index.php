<?php
// MySQL server configuration
$servername = "localhost";
$username = "wdappsa_root";
$password = "eApx3#4#+9%a";
$dbname = "wdappsa_wd";

// Function to log incoming requests to the database
function logRequest()
{
    global $servername, $username, $password, $dbname;
    try {
        // Create a new PDO instance
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Extract relevant information from the incoming request
        $ip = $_SERVER['REMOTE_ADDR'];
        $url = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        $timestamp = date("Y-m-d H:i:s");

        // Get the request body
        $body = file_get_contents('php://input');

        // Prepare SQL statement to insert the request data into the database
        $sql = "INSERT INTO request_logs (ip, url, method, timestamp, body) VALUES (:ip, :url, :method, :timestamp, :body)";
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':ip', $ip);
        $stmt->bindParam(':url', $url);
        $stmt->bindParam(':method', $method);
        $stmt->bindParam(':timestamp', $timestamp);
        $stmt->bindParam(':body', $body);

        // Execute the SQL statement
        $stmt->execute();

        // Close connection
        $conn = null;
    } catch (PDOException $e) {
        // Handle errors
        echo "Connection failed: " . $e->getMessage();
    }
}

// Call the logRequest function to log the incoming request
logRequest();
