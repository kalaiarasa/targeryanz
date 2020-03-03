<?php
session_start();
include '../user/database.php';
if(!isset($_SESSION['c_code']))
{
    header("Location:/user/log_in.php");
}
if(isset($_SESSION['c_code']))
{
    $SQL="DELETE FROM branch_info WHERE b_code=?";
    if($stmt=$conn->prepare($SQL))
    {
        $stmt->bind_param("s",$_GET['b_code']);
        if($stmt->execute())
        {
            header("Location:/courses/dept.php");
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
}
?>