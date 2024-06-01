<?php
session_start();
include './../../../dbcontext/connect.php';

$percentage = $_POST['percentage'];
$max_discount = $_POST['max_discount'];
$max_users = $_POST['max_users'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$usage_message = $_POST['usage_message'];

if (isset($_POST['submit'])) {

    $sql = "insert into coupons (coupon_percent, coupon_max_discount, coupon_max_users, coupon_start_date, coupon_end_date, coupon_usage_message) values
        ('$percentage','$max_discount','$max_users','$start_date','$end_date','$usage_message')";
    if (mysqli_query($con, $sql)) {
        header("Location:./../../coupons.php?inserted=true");
    } else {
        die("could not insert news right now : " . mysqli_error($con));
    }

    mysqli_close($con);
} else {
    echo "bad Request";
    mysqli_close($con);
}
