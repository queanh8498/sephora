<?php
// Include file cấu hình ban đầu của `Twig`
require_once __DIR__.'/../../../bootstrap.php';
// Truy vấn database
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__.'/../../../dbconnect.php');


    mysqli_set_charset($conn,"utf-8");

    $lsp_ma = $_GET['lsp_ma'];

    $sqlSelect = "SELECT * FROM loaisanpham WHERE lsp_ma=$lsp_ma;";

    $result= mysqli_query($conn, $sqlSelect);

    $loaisanpham = mysqli_fetch_array($result, MYSQLI_ASSOC);



    if (isset($_POST['btnSave'])){
        $lsp_ten = $_POST['lsp_ten'];
        $lsp_mota = $_POST['lsp_mota'];

        $sqlUpdate = "UPDATE loaisanpham SET lsp_ten=N'$lsp_ten' ,lsp_mota=N'$lsp_mota' WHERE lsp_ma= $lsp_ma;";
        mysqli_query($conn, $sqlUpdate);
        mysqli_close($conn);
        header('location:display.php');

    }
    echo $twig->render('frontend/quantri/loaisp/edit.html.twig', [
        'loaisanpham' => $loaisanpham
    ]);

?>