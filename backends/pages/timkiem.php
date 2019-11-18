
<?php
require_once __DIR__ . '/../../bootstrap.php';
include_once(__DIR__ . '/../../dbconnect.php');

$sqlSelectLoaiSanPham = <<<EOT
    SELECT lsp.lsp_ma, lsp.lsp_ten, COUNT(*) soluongsanpham
    FROM `loaisanpham` lsp
    LEFT JOIN `sanpham` sp ON lsp.lsp_ma = sp.lsp_ma
    GROUP BY lsp.lsp_ma, lsp.lsp_ten
EOT;
$resultSelectLoaiSanPham = mysqli_query($conn, $sqlSelectLoaiSanPham);

$loaisanphamData = [];

while ($row = mysqli_fetch_array($resultSelectLoaiSanPham, MYSQLI_ASSOC)) {
    $loaisanphamData[] = array(
        'lsp_ma' => $row['lsp_ma'],
        'lsp_ten' => $row['lsp_ten'],
        'soluongsanpham' => $row['soluongsanpham'],
    );
}

$sqlSelectNhaSanXuat = <<<EOT
    SELECT nsx.nsx_ma, nsx.nsx_ten, COUNT(*) soluongsanpham
    FROM `nhasanxuat`nsx
    LEFT JOIN `sanpham` sp ON nsx.nsx_ma = sp.nsx_ma
    GROUP BY nsx.nsx_ma, nsx.nsx_ten
EOT;
$resultSelectNhaSanXuat = mysqli_query($conn, $sqlSelectNhaSanXuat);

$nhasanxuatData = [];
while ($row = mysqli_fetch_array($resultSelectNhaSanXuat, MYSQLI_ASSOC)) {
    $nhasanxuatData[] = array(
        'nsx_ma' => $row['nsx_ma'],
        'nsx_ten' => $row['nsx_ten'],
        'soluongsanpham' => $row['soluongsanpham'],
    );
}

$keyword_tensanpham = isset($_GET['keyword_tensanpham']) ? $_GET['keyword_tensanpham'] : '';
$keyword_loaisanpham = isset($_GET['keyword_loaisanpham']) ? $_GET['keyword_loaisanpham'] : [];
$keyword_nhasanxuat = isset($_GET['keyword_nhasanxuat']) ? $_GET['keyword_nhasanxuat'] : [];

$sqlDanhSachSanPham = <<<EOT
    SELECT sp.sp_ma, sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_mota, sp.sp_soluong, lsp.lsp_ten, MAX(hsp.hsp_tentaptin) AS hsp_tentaptin
    FROM `sanpham` sp
    JOIN `loaisanpham` lsp ON sp.lsp_ma = lsp.lsp_ma
    LEFT JOIN `hinhsanpham` hsp ON sp.sp_ma = hsp.sp_ma
    LEFT JOIN `nhasanxuat` nsx ON sp.nsx_ma = nsx.nsx_ma
EOT;
// Tìm theo tên sản phẩm
$sqlWhereArr = [];
if (!empty($keyword_tensanpham)) {
    $sqlWhereArr[] = "sp.sp_ten LIKE '%$keyword_tensanpham%'";
}
// Tìm theo loại sản phẩm
if (!empty($keyword_loaisanpham)) {
    $value = implode(',', $keyword_loaisanpham); // [1, 2, 3] => "1,2,3"
    $sqlWhereArr[] = "lsp.lsp_ma IN ($value)";
}
// Tìm theo nhà sản xuất
if (!empty($keyword_nhasanxuat)) {
    $value = implode(',', $keyword_nhasanxuat);
    $sqlWhereArr[] = "nsx.nsx_ma IN ($value)";
}


if (count($sqlWhereArr) > 0) {
    $sqlWhere = " WHERE " . implode(' AND ', $sqlWhereArr);
    $sqlDanhSachSanPham .= $sqlWhere;
}
$sqlDanhSachSanPham .= <<<EOT
    GROUP BY sp.sp_ma, sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_mota, sp.sp_soluong, lsp.lsp_ten
EOT;
$result = mysqli_query($conn, $sqlDanhSachSanPham);

$dataDanhSachSanPham = [];
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $dataDanhSachSanPham[] = array(
            'sp_ma' => $row['sp_ma'],
            'sp_ten' => $row['sp_ten'],
            'sp_gia' => number_format($row['sp_gia'], 2, ".", ",") . ' vnđ',
            'sp_giacu' => number_format($row['sp_giacu'], 2, ".", ","),
            'sp_mota' => $row['sp_mota'],
            'sp_soluong' => $row['sp_soluong'],
            'lsp_ten' => $row['lsp_ten'],
            'hsp_tentaptin' => $row['hsp_tentaptin'],
        );
    }
echo $twig->render(
    'frontend/pages/timkiem.html.twig',
    [
        'danhsachloaisanpham' => $loaisanphamData,
        'danhsachnhasanxuat' => $nhasanxuatData,
        'danhsachsanpham' => $dataDanhSachSanPham,
        
        'keyword_tensanpham' => $keyword_tensanpham,
        'keyword_loaisanpham' => $keyword_loaisanpham,
        'keyword_nhasanxuat' => $keyword_nhasanxuat,
    ]
);