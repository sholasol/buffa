<?php 
include 'header.php';
session_destroy();

$msg= "You are logged out";
echo  " <script>alert('$msg'); window.location='../index'</script>";

?>