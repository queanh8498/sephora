
<?php
require_once __DIR__ . '/../../bootstrap.php';
include_once(__DIR__ . '/../../dbconnect.php');


if (isset($_POST['btnDatHang'])) {
    // Lấy dữ liệu từ POST
    $kh_tendangnhap = $_POST['kh_tendangnhap'];
    $httt_ma = $_POST['httt_ma'];
    $dh_ngaylap = date('Y-m-d H:m:s'); 
    
    $sqlDonHang = "INSERT INTO `dondathang` (dh_ngaylap, dh_ngaygiao, dh_noigiao, httt_ma, kh_tendangnhap) VALUES ('$dh_ngaylap', null, null, $httt_ma, '$kh_tendangnhap');";
    
    mysqli_query($conn, $sqlDonHang);
    
    $last_donhang_id = mysqli_insert_id($conn);
    
    foreach ($_POST['sanphamgiohang'] as $sanpham) {
        $sp_ma = $sanpham['sp_ma'];
        $gia = $sanpham['gia'];
        $soluong = $sanpham['soluong'];
        
        $sqlSanPhamDonHang = "INSERT INTO `sanpham_dondathang` (sp_ma, dh_ma, sp_dh_soluong, sp_dh_dongia) VALUES ($sp_ma, $last_donhang_id, $soluong, $gia);";
        mysqli_query($conn, $sqlSanPhamDonHang);
    }
    
    $_SESSION['giohangdata'] = [];
    
    echo $twig->render('frontend/thanhtoan/thanhtoan-finish.html.twig');
} else {
    
    if (!isset($_SESSION['username'])) {
        header('location:../pages/login.php');
    } else {
       
        $sqlHinhThucThanhToan = "select * from `hinhthucthanhtoan`";
        
        $resultHinhThucThanhToan = mysqli_query($conn, $sqlHinhThucThanhToan);

        $dataHinhThucThanhToan = [];
        while ($row = mysqli_fetch_array($resultHinhThucThanhToan, MYSQLI_ASSOC)) {
            $dataHinhThucThanhToan[] = array(
                'httt_ma' => $row['httt_ma'],
                'httt_ten' => $row['httt_ten'],
            );
        }

        $username = $_SESSION['username'];

        $sql = "SELECT * FROM `khachhang` WHERE kh_tendangnhap = '$username';";

        $result = mysqli_query($conn, $sql);

        $dataKhachHang;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $dataKhachHang = array(
                'kh_tendangnhap' => $row['kh_tendangnhap'],
                'kh_ten' => $row['kh_ten'],
                'kh_gioitinh' => $row['kh_gioitinh'],
                'kh_diachi' => $row['kh_diachi'],
                'kh_dienthoai' => $row['kh_dienthoai'],
            );
        }
        $data = [];
        if (isset($_SESSION['giohangdata'])) {
            $data = $_SESSION['giohangdata'];
        } else {
            $data = [];
        }
        echo $twig->render('frontend/thanhtoan/thanhtoan.html.twig', [
            'giohangdata' => $data,
            'danhsachhinhthucthanhtoan' => $dataHinhThucThanhToan,
            'khachhang' => $dataKhachHang
        ]);
    }
}
