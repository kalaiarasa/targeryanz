<?php
session_start();

include '../user/database.php';
if(!isset($_SESSION['c_code']))
{
   // $_SESSION['redirect']=$_SERVER['REQUEST_URI'];
    header("Location:/user/log_in.php");
}

$sql="delete from student_info where a_no=? and c_code=?";
if($stmt=$conn->prepare($sql))
{
    $stmt->bind_param("ss",$_POST['a_no'],$_SESSION['c_code']);
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
$conn->close();
?>
