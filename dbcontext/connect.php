<?php
require __DIR__ . '/config.php';
$con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die("connection erorr" . mysqli_error($con));
$con->query('SET NAMES UTF8');
$con->query('SET CHARACTER SET UTF8');
