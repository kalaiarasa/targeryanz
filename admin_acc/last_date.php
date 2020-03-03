<?php
session_start();

if(!isset($_SESSION['admin_login']))
{
  die("Invalid access")
}
include '../user/database.php';
$sql="update time_limit set last_date=? where name='first_year_submission'";
if($stmt=$conn->prepare($sql))
{
    $stmt->bind_param("s",$_POST['last_date']);
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