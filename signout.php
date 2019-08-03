<?php 
ob_start();
session_start();
include 'config.php'; 
unset($_SESSION['user']);
unset($_SESSION['admin']);
header("location: signin.php"); 
?>