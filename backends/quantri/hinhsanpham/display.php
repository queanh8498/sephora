<?php
// Include file cấu hình ban đầu của `Twig`
require_once __DIR__.'/../../../bootstrap.php';
// Truy vấn database
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__.'/../../../dbconnect.php');

$sql = <<<EOT
    SELECT *
    FROM `hinhsanpham` hsp
    JOIN `sanpham` sp on hsp.sp_ma = sp.sp_ma
EOT;

$result = mysqli_query($conn, $sql);
$data = [];
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    // Sử dụng hàm sprintf() để chuẩn bị mẫu câu với các giá trị truyền vào tương ứng từng vị trí placeholder
    $sp_tomtat = sprintf("Sản phẩm %s", $row['sp_ten']);

    $data[] = array(
        'hsp_ma' => $row['hsp_ma'],
        'hsp_tentaptin' => $row['hsp_tentaptin'],
        'sp_tomtat' => $sp_tomtat,
    );
}
echo $twig->render('frontend/quantri/hinhsanpham/display.html.twig', ['ds_hinhsanpham' => $data] );