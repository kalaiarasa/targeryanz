<?php
session_start();
include '../user/database.php';
if(!isset($_SESSION['c_code'])|| !isset($_POST['pass']))
{
    die("Failed to Load");
}
$sql="update user_login set pass=? where c_code=?";
if($stmt=$conn->prepare($sql))
{
    $stmt->bind_param("ss",$_POST['pass'],$_SESSION['c_code']);
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