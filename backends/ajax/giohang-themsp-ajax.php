<?php
require_once __DIR__ . '/../../bootstrap.php';
include_once(__DIR__ . '/../../dbconnect.php');

$sp_ma = $_POST['sp_ma'];
$sp_ten = $_POST['sp_ten'];
$soluong = $_POST['soluong'];
$gia = $_POST['sp_gia'];
$hinhdaidien = $_POST['hinhdaidien'];
// var_dump($sp_ma);
// var_dump($sp_ten);die;
//var_dump($hinhdaidien);die;

if (isset($_SESSION['giohangdata'])) {
    $data = $_SESSION['giohangdata'];
    $data[$sp_ma] = array(
        'sp_ma' => $sp_ma,
        'sp_ten' => $sp_ten,
        'soluong' => $soluong,
        'gia' => $gia,
        'thanhtien' => ($soluong * $gia),
        'hinhdaidien' => $hinhdaidien
    );
    // lưu dữ liệu giỏ hàng vào session
    $_SESSION['giohangdata'] = $data;
} else { // Nếu khách hàng đặt sản phẩm chưa có trong giỏ hàng => thêm vào
    $data[$sp_ma] = array(
        'sp_ma' => $sp_ma,
        'sp_ten' => $sp_ten,
        'soluong' => $soluong,
        'gia' => $gia,
        'thanhtien' => ($soluong * $gia),
        'hinhdaidien' => $hinhdaidien
    );
    // lưu dữ liệu giỏ hàng vào session
    $_SESSION['giohangdata'] = $data;
}
echo json_encode($_SESSION['giohangdata']);

