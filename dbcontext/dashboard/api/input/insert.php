<?php
include './../../../dbcontext/connect.php';
$input_label = $_POST['input_label'];
$input_placeholder =$_POST['input_placeholder'];
$input_key = $_POST['input_key'];
$input_type = $_POST['input_type'];
$input_role = $_POST['input_role'];
$sql = "insert into inputs (input_label,input_desc,input_placeholder,input_type,input_role,input_key) 
values ('$input_label','$input_label','$input_placeholder','$input_type','$input_role','$input_key')";
if($con->query($sql))
{
    header("Location:./../../inputs.php");
}
else
{
    echo mysqli_error($con);
}
?>