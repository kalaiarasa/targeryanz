<?php
$conn=new MySQLi('localhost','root','','db_2020');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{}
?>
