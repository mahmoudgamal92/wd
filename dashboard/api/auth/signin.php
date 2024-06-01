<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require realpath(__DIR__ . '/../../../dbcontext/connect.php');
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $cmd = "select * from admins where admin_email ='$email' and admin_password = '$pwd'";
    $result = mysqli_query($con, $cmd);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $row = mysqli_fetch_array($result);
        $_SESSION['WD_ADMIN_USERNAME'] = $row['admin_name'];
        $_SESSION['WD_ADMIN_ID'] = $row['admin_id'];
        $_SESSION['WD_ADMIN_EMAIL'] = $row['admin_email'];
        header("Location: ./../../index.php");
    } else {
        header("Location: ./../../signin.php?auth_error");
    }
}
