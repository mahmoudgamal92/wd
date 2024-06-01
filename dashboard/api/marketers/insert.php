<?php
session_start();
include './../../../dbcontext/connect.php';

$user_name = $_POST['user_name'];
$user_email = $_POST['user_email'];
$user_phone = $_POST['phone_number'];

$user_token = "";
$referal_code = "";
$referal_url = "";


if (isset($_POST['submit'])) {

    $sql = "insert into marketers (user_token , user_name, user_email, user_phone, referal_code, referal_url) values
        ('$user_token','$user_name','$user_email','$user_phone','$referal_code','$referal_url')";
    if (mysqli_query($con, $sql)) {
        header("Location:./../../marketers.php?inserted=true");
    } else {
        die("could not insert news right now : " . mysqli_error($con));
    }

    mysqli_close($con);
} else {
    echo "bad Request";
    mysqli_close($con);
}
