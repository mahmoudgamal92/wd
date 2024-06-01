<?php
include './../../../dbcontext/connect.php';

$id = $_GET['id'];
$cmd = "delete from coupons where coupon_id = '$id'";
if (mysqli_query($con, $cmd)) {
    header("Location:./../../coupons.php");
} else {
    die("could not insert news right now : " . mysqli_error($con));
}
mysqli_close($con);
