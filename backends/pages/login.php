<?php
require_once __DIR__.'/../../bootstrap.php';
include_once(__DIR__.'/../../dbconnect.php');
// lay ra ds san pham
$message = '';

if(isset($_POST['btnDangNhap'])) 
{
    $username = $_POST['username'];
    $password = sha1($_POST['password']);

    $sql = "SELECT * FROM `khachhang` WHERE kh_tendangnhap = '$username' AND kh_matkhau = '$password';";
    //print_r($sql);die;
    $result = mysqli_query($conn, $sql);

    //print_r($result);die;
    //print_r(mysqli_num_rows($result));die;

    if(mysqli_num_rows($result)>0) {
        $data = [];
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            $data[] = array(
                'kh_tendangnhap' => $row['kh_tendangnhap'],
                'kh_ten' => $row['kh_ten'],
                'kh_quantri' => $row['kh_quantri']
            );
        }
            
            
            //$kh_quantri = $data[0]['kh_quantri'];
            
            if ($data[0]['kh_quantri'] == 1){
                $message = 'Đăng nhập thành công!';
                $_SESSION['username'] = $username;
                echo $twig->render('frontend/pages/home_admin.html.twig', ['message' => $message]);
            }else
            {
                $message = 'Đăng nhập thành công!';
                $_SESSION['username'] = $username;
                //echo $twig->render('frontend/pages/home.html.twig', ['message' => $message]);
            }
        }  
    else $message = 'Đăng nhập thất bại!';
        
// Đóng kết nối
mysqli_close($conn);
}
    

//     $sqlDanhSachSanPham = <<<EOT
//     SELECT sp.sp_ma, sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_mota, sp.sp_soluong, lsp.lsp_ten, MAX(hsp.hsp_tentaptin) AS hsp_tentaptin
//     FROM `sanpham` sp
//     JOIN `loaisanpham` lsp ON sp.lsp_ma = lsp.lsp_ma
//     LEFT JOIN `hinhsanpham` hsp ON sp.sp_ma = hsp.sp_ma
//     GROUP BY sp.sp_ma, sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_mota, sp.sp_soluong, lsp.lsp_ten
// EOT;

// $result = mysqli_query($conn, $sqlDanhSachSanPham);
//     $dataDanhSachSanPham = [];
//     while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
// {
//     $dataDanhSachSanPham[] = array(
//         'sp_ma' => $row['sp_ma'],
//         'sp_ten' => $row['sp_ten'],
//         'sp_gia' => number_format($row['sp_gia'], 2, ".", ",") . ' vnđ',
//         'sp_giacu' => number_format($row['sp_giacu'], 2, ".", ","),
//         'sp_mota' => $row['sp_mota'],
//         'sp_soluong' => $row['sp_soluong'],
//         'lsp_ten' => $row['lsp_ten'],
//         'hsp_tentaptin' => $row['hsp_tentaptin'],
//     );
// }


if(isset($_SESSION['username'])) {
    $message = 'Bạn đã Đăng nhập !';
    echo $twig->render('frontend/pages/home.html.twig', 
        ['message' => $message,
        //'danhsachsanpham' => $dataDanhSachSanPham, 
        ]);
}
else {
    echo $twig->render('frontend/pages/login1.html.twig', ['message' => $message]);
}

?>
