<?php

// $dbHost = "localhost";
// $dbUser = "root";
// $dbPass = "";
// $dbName = "wd";


$dbHost = "localhost";
$dbUser = "zawyaonl_mahmoud";
$dbPass = "8+ja(_nF)$]O";
$dbName = "zawyaonl_wd";

$con= new mysqli($dbHost,$dbUser,$dbPass,$dbName) 
or die ("connection erorr".mysqli_error($con));
$con->query('SET NAMES UTF8');
$con->query('SET CHARACTER SET UTF8');
?>
