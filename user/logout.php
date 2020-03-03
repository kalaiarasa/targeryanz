<?php
session_start();
unset($_SESSION['c_code']);
unset($_SESSION["name"]);
header("Location:/user/log_in.php");
?>