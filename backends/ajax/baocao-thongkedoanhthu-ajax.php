<?php
require_once __DIR__.'/../../bootstrap.php';
include_once(__DIR__.'/../../dbconnect.php');

$sql = <<<EOT
    SELECT DATE(ddh.dh_ngaylap) as NgayTaoDonHang, SUM(sp_dh_soluong * sp_dh_dongia) AS TongThanhTien
    FROM `dondathang` ddh
    JOIN `sanpham_dondathang` spddh ON ddh.dh_ma = spddh.dh_ma
    GROUP BY DATE(ddh.dh_ngaylap)
EOT;
$result = mysqli_query($conn, $sql);

$data = [];
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $data[] = array(
        'NgayTaoDonHang' => date('d/m/Y', strtotime($row['NgayTaoDonHang'])),
        'TongThanhTien' => $row['TongThanhTien'] 
    );
}

// Dữ liệu JSON, mảng PHP -> JSON 
echo json_encode($data);