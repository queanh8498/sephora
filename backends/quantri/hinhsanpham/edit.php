<?php
// Include file cấu hình ban đầu của `Twig`
require_once __DIR__.'/../../../bootstrap.php';
// Truy vấn database
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
$hsp_ma = $_GET['hsp_ma'];
$sqlSelect = "SELECT * FROM `hinhsanpham` WHERE hsp_ma=$hsp_ma;";

$resultSelect = mysqli_query($conn, $sqlSelect);
$hinhsanphamRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC); // 1 record

if(isset($_POST['btnCapNhat'])) 
{
    $sp_ma = $_POST['sp_ma'];

    if (isset($_FILES['hsp_tentaptin']))
    {
        $upload_dir = "./../../assets/uploads/";

        if ($_FILES['hsp_tentaptin']['error'] > 0)
        {
            echo 'File Upload Bị Lỗi';die;
        }
        else{
            $hsp_tentaptin = $_FILES['hsp_tentaptin']['name'];
            move_uploaded_file($_FILES['hsp_tentaptin']['tmp_name'], $upload_dir.$hsp_tentaptin);
            
            $old_file = $upload_dir.$hinhsanphamRow['hsp_tentaptin'];
            if(file_exists($old_file)) {
                unlink($old_file);
            }
        }

        $sql = "UPDATE `hinhsanpham` SET hsp_tentaptin='$hsp_tentaptin', sp_ma=$sp_ma WHERE hsp_ma=$hsp_ma;";
        
        mysqli_query($conn, $sql);
        mysqli_close($conn);

        header('location:index.php');
    }
}

echo $twig->render('frontend/quantri/hinhsanpham/edit.html.twig', [
    'ds_sanpham' => $dataSanPham,
    'hinhsanpham' => $hinhsanphamRow,
]);