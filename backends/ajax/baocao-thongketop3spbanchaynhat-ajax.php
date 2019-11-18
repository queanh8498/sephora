<?php
require_once __DIR__.'/../../bootstrap.php';
include_once(__DIR__.'/../../dbconnect.php');

$sql = <<<EOT
    SELECT *
    FROM (
        SELECT sp.sp_ten, COUNT(*) AS SoLuong
        FROM `sanpham_dondathang` spddh
        JOIN `sanpham` sp ON spddh.sp_ma = sp.sp_ma
        GROUP BY sp.sp_ten
    ) AS ex
    ORDER BY ex.SoLuong DESC 
    LIMIT 3
EOT;

$result = mysqli_query($conn, $sql);
$data = [];
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $data[] = array(
        'TenSanPham' => $row['sp_ten'],
        'SoLuong' => $row['SoLuong'] 
    );
}

// Dữ liệu JSON, mảng PHP -> JSON 
echo json_encode($data);