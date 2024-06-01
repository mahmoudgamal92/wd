<?php
include './../../../dbcontext/connect.php';

$id = $_GET['id'];
$input_id = $_GET['input_id'];
    $cmd = "delete from input_values where id = '$id'";
    if (mysqli_query($con,$cmd))
    {
        header("Location:./../../inputinfo.php?id=$input_id");
    }
    else{
    die( "could not insert news right now : ". mysqli_error($con));
    }
    mysqli_close($con);
?>