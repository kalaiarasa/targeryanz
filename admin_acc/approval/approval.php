<?php
session_start();

include 'database.php';
//echo $_POST['name'];
//echo $_POST['category'];
$sql="UPDATE student_info SET approved=? ,reason=? where a_no=?";
if($stmt=$conn->prepare($sql))
{
    $stmt->bind_param("iss",$_POST['approved'],$_POST['reason'],$_POST['a_no']);
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