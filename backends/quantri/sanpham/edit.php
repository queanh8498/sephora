<?php
// Include file cấu hình ban đầu của `Twig`
require_once __DIR__.'/../../../bootstrap.php';
// Truy vấn database
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__.'/../../../dbconnect.php');


    mysqli_set_charset($conn,"utf-8");


    $sql = <<<EOT
    SELECT * FROM loaisanpham;
EOT;

$rs = mysqli_query($conn, $sql);

$dataLSP = [];
while ($rowLSP = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
    $dataLSP[] = array(
    'lsp_ma' => $rowLSP['lsp_ma'],
    'lsp_ten' => $rowLSP['lsp_ten'],
);
}

    $sqlNSX = <<<EOT
    SELECT * FROM nhasanxuat;
EOT;

    $rsNSX = mysqli_query($conn, $sqlNSX);

    $dataNSX = [];
    while ($rowNSX = mysqli_fetch_array($rsNSX, MYSQLI_ASSOC)) {
    $dataNSX[] = array(
    'nsx_ma' => $rowNSX['nsx_ma'],
    'nsx_ten' => $rowNSX['nsx_ten'],
);
}


$sp_ma = $_GET['sp_ma'];

$sqlSelect = "SELECT * FROM sanpham WHERE sp_ma=$sp_ma;";

$result= mysqli_query($conn, $sqlSelect);

$sanpham = mysqli_fetch_array($result, MYSQLI_ASSOC);


    if(isset($_POST['btnSave'])) 
{
    // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
    $sp_ten = $_POST['sp_ten'];
    $sp_gia = $_POST['sp_gia'];
    $sp_giacu = $_POST['sp_giacu'];
    $sp_soluong = $_POST['sp_soluong'];
    $lsp_ma = $_POST['lsp_ma'];
    $nsx_ma = $_POST['nsx_ma'];

    $sql = "UPDATE `sanpham` SET sp_ten='$sp_ten', sp_gia=$sp_gia, sp_giacu=$sp_giacu, sp_soluong=$sp_soluong, lsp_ma=$lsp_ma, nsx_ma=$nsx_ma WHERE sp_ma=$sp_ma;";
    //print_r($sql);die;
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    header('location:display.php');

}
    //print_r($sanpham);
    echo $twig->render('frontend/quantri/sanpham/edit.html.twig', [
        'ds_lsp' => $dataLSP,
        'ds_nsx' => $dataNSX,
        'sanpham' => $sanpham,
    ]);
