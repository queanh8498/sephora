<?php


$conn = mysqli_connect("localhost","root","","sephora") or die("server khong ket noi duoc");

$conn->query("SET NAMES 'utf8'"); 
$conn->query("SET CHARACTER SET utf8");  

session_start();
?>