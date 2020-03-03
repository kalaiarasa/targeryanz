<?php
session_start();

if(!isset($_SESSION['admin_login']))
{
  die("Invalid access")
}
include '../user/database.php';
$sql="delete from student_info where a_no=?";
if($stmt=$conn->prepare($sql))
{
    $stmt->bind_param("s",$_POST['a_no']);
    if($stmt->execute())
    {
        echo "success";
    }
    else
    {
        echo $conn->error;
    }
}
else
{
    echo $conn->error;
}
?>