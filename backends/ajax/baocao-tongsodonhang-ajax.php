<?php
require_once __DIR__.'/../../bootstrap.php';

include_once(__DIR__.'/../../dbconnect.php');

$sqlSoLuongDonHang = "select count(*) as SoLuong from `dondathang`";

$result = mysqli_query($conn, $sqlSoLuongDonHang);

$dataSoLuongDonHang = [];
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $dataSoLuongDonHang[] = array(
        'SoLuong' => $row['SoLuong'] 
    );
}

echo json_encode($dataSoLuongDonHang[0]);