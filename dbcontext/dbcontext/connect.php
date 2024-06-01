<?php
if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_ADDR'] == '127.0.0.1') {
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "wd";
} else {
    $dbHost = "localhost";
    $dbUser = "zawyaonl_mahmoud";
    $dbPass = "8+ja(_nF)$]O";
    $dbName = "zawyaonl_wd";
}

$con = new mysqli($dbHost, $dbUser, $dbPass, $dbName)
    or die("connection erorr" . mysqli_error($con));
$con->query('SET NAMES UTF8');
$con->query('SET CHARACTER SET UTF8');

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

//echo "Connected successfully";
