<?php 

require_once __DIR__ . "/../../dbconnect.php";


$kh_tendangnhap=$_GET['kh_tendangnhap'];
$kh_trangthai=$_GET['kh_trangthai'];

$sqlSelect="SELECT * FROM khachhang WHERE kh_tendangnhap='$kh_tendangnhap' AND kh_trangthai='$kh_trangthai';";

$rs= mysqli_query($conn, $sqlSelect);
$khachhangRow = mysqli_fetch_array($rs, MYSQLI_ASSOC); // 1 record

    if(empty($khachhangRow)) {
        echo 'Vui lòng kiểm tra lại EMAIL!';
    } else {
        // Tìm được dòng khách hàng cần cập nhật
        $sqlUpdate = "UPDATE khachhang SET kh_trangthai = 1 WHERE kh_tendangnhap = '$kh_tendangnhap'";
        $resultUpdate = mysqli_query($conn, $sqlUpdate);
        echo 'Tài khoản đã được kích hoạt. Click vào <a href="/sephora/backend/loaisp/display.php">ĐÂY</a> để đến trang chủ!';
    }

?>