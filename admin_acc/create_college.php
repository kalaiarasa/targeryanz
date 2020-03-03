<?php
session_start();

if(!isset($_SESSION['admin_login']))
{
  die("Invalid access")
}
include '../user/database.php';
$sql1="insert into college_info(c_code,name_of_college) values('".$_POST['c_code']."','".$_POST['c_name']."')";
$sql2="insert into user_login values('".$_POST['c_code']."','".$_POST['pass']."')";
if($conn->query($sql1) && $conn->query($sql2))
{
    echo "success";
}
else
{
    echo $conn->error;
}
?>