<?php
require_once __DIR__.'/../../bootstrap.php';

include_once(__DIR__.'/../../dbconnect.php');

$sp_ma = $_GET['sp_ma'];

$sqlSelectSanPham = <<<EOT
    SELECT sp.sp_ma, sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_mota, sp.sp_soluong, lsp.lsp_ten
    FROM `sanpham` sp
    JOIN `loaisanpham` lsp ON sp.lsp_ma = lsp.lsp_ma
    WHERE sp.sp_ma = $sp_ma
EOT;
$resultSelectSanPham = mysqli_query($conn, $sqlSelectSanPham);

$sanphamRow;
while ($row = mysqli_fetch_array($resultSelectSanPham, MYSQLI_ASSOC)) {
    $sanphamRow = array(
        'sp_ma' => $row['sp_ma'],
        'sp_ten' => $row['sp_ten'],
        'sp_gia' => $row['sp_gia'],
        'sp_gia_formated' => number_format($row['sp_gia'], 2, ".", ",") . ' vnđ', 
        'sp_giacu_formated' => number_format($row['sp_giacu'], 2, ".", ",") . ' vnđ',
        'sp_mota' => $row['sp_mota'],
        
        'sp_soluong' => $row['sp_soluong'],
        'lsp_ten' => $row['lsp_ten']
    );
}
$sqlSelect = <<<EOT
    SELECT hsp.hsp_tentaptin
    FROM `hinhsanpham` hsp
    WHERE hsp.sp_ma = $sp_ma
EOT;
$result = mysqli_query($conn, $sqlSelect);

$danhsachhinhanh = [];
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $danhsachhinhanh[] = array(
        'hsp_tentaptin' => $row['hsp_tentaptin']
    );
}
$sanphamRow['danhsachhinhanh'] = $danhsachhinhanh;

echo $twig->render('frontend/sanpham/chitiet.html.twig', ['sanpham' => $sanphamRow]);
?>
