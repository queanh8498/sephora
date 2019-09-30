<?php
// Include file cấu hình ban đầu của `Twig`
require_once __DIR__.'/../../../bootstrap.php';
// Truy vấn database
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__.'/../../../dbconnect.php');


    mysqli_set_charset($conn,"utf-8");

    //HERE DOCS
    $sql = <<<EOT
    SELECT * FROM khachhang;
 
EOT;

    $rs = mysqli_query($conn, $sql);

    $dataKH = [];
    while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
        $dataKH[] = array(
        'kh_tendangnhap' => $row['kh_tendangnhap'],
        'kh_matkhau' => $row['kh_matkhau'],
        'kh_ten' => $row['kh_ten'],
        'kh_gioitinh' => $row['kh_gioitinh'],
        'kh_diachi' => $row['kh_diachi'],
        'kh_dienthoai' => $row['kh_dienthoai'],
        'kh_email' => $row['kh_email'],
        'kh_cmnd' => $row['kh_cmnd'],
        'kh_trangthai' => $row['kh_trangthai'],
        'kh_quantri' => $row['kh_quantri'],
    );
}

    echo $twig->render('frontend/quantri/khachhang/display.html.twig',[
        'danhsachKH' => $dataKH
    ]);
?>
