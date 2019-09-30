<?php
// Include file cấu hình ban đầu của `Twig`
require_once __DIR__.'/../../../bootstrap.php';
include_once(__DIR__.'/../../../dbconnect.php');

$sqlSanPham = "select * from `sanpham`";
$resultSanPham = mysqli_query($conn, $sqlSanPham);

$dataSanPham = [];
while($rowSanPham = mysqli_fetch_array($resultSanPham, MYSQLI_ASSOC))
{
    $sp_tomtat = sprintf("Sản phẩm %s", $rowSanPham['sp_ten']);

    $dataSanPham[] = array(
        'sp_ma' => $rowSanPham['sp_ma'],
        'sp_tomtat' => $sp_tomtat
    );
}
if(isset($_POST['btnCapNhat'])) 
{
    $sp_ma = $_POST['sp_ma'];

    if (isset($_FILES['hsp_tentaptin']))
    {
        $upload_dir = "./../../../assets/uploads/";
        if ($_FILES['hsp_tentaptin']['error'] > 0)
        {
            echo 'File Upload Bị Lỗi';die;
        }
        else{
            $hsp_tentaptin = $_FILES['hsp_tentaptin']['name'];
            move_uploaded_file($_FILES['hsp_tentaptin']['tmp_name'], $upload_dir.$hsp_tentaptin);
            echo 'File Uploaded';
        }
        $sql = "INSERT INTO `hinhsanpham` (hsp_tentaptin, sp_ma) VALUES ('$hsp_tentaptin', $sp_ma);";
        mysqli_query($conn, $sql);

        mysqli_close($conn);

        header('location:display.php');
    }
}

echo $twig->render('frontend/quantri/hinhsanpham/create.html.twig', [
    'ds_sanpham' => $dataSanPham,
]);