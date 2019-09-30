<?php
// Include file cấu hình ban đầu của `Twig`
require_once __DIR__.'/../../../bootstrap.php';
// Truy vấn database
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__.'/../../../dbconnect.php');


    $lsp_ma = $_GET['lsp_ma'];

    $sqlDelete = "DELETE FROM loaisanpham WHERE lsp_ma =".$lsp_ma;

    $result= mysqli_query($conn, $sqlDelete);
    //print_r($sanpham);

    header('location:/sephora/backends/quantri/loaisp/display.php');

?>
