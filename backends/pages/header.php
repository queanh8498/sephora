
<?php
require_once __DIR__.'/../../bootstrap.php';

include_once(__DIR__.'/../../dbconnect.php');

//new 
$kh_tendangnhap = $_GET['kh_tendangnhap'];
$sqlSelect = "SELECT * FROM `khachhang` WHERE kh_tendangnhap='$kh_tendangnhap';";

$resultSelect = mysqli_query($conn, $sqlSelect);
$khachhangRow = [];
while($row = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC))
{
    $dataDanhSachSanPham[] = array(
        'kh_tendangnhap' => $row['kh_tendangnhap'],
        'kh_ten' => $row['kh_ten']
    );
}

echo $twig->render('frontend/layouts/includes/header.html.twig', [
    'khachhang' => $khachhangRow
]);