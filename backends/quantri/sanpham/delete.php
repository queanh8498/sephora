<?php
// Include file cấu hình ban đầu của `Twig`
require_once __DIR__.'/../../../bootstrap.php';
// Truy vấn database
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__.'/../../../dbconnect.php');

    $sp_ma = $_GET['sp_ma'];

    $sqlDelete = "DELETE FROM sanpham WHERE sp_ma = ".$sp_ma;

    $result= mysqli_query($conn, $sqlDelete);
    //print_r($sanpham);

    header('location:/sephora/backends/quantri/sanpham/display.php');


?>
