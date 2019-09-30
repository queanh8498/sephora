<?php
// Include file cấu hình ban đầu của `Twig`
require_once __DIR__.'/../../../bootstrap.php';
// Truy vấn database
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__.'/../../../dbconnect.php');


    mysqli_set_charset($conn,"utf-8");

    //HERE DOCS
    $sql = <<<EOT
    SELECT sp.sp_ma,sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_soluong, lsp.lsp_ten, nsx.nsx_ten
    FROM sanpham sp
    JOIN loaisanpham lsp ON sp.lsp_ma=lsp.lsp_ma
    LEFT JOIN nhasanxuat nsx ON sp.nsx_ma=nsx.nsx_ma;
 
EOT;

    $rs = mysqli_query($conn, $sql);

    $data = [];
    while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
        $data[] = array(
        'sp_ma' => $row['sp_ma'],
        'sp_ten' => $row['sp_ten'],
        'sp_gia' => $row['sp_gia'],
        'sp_giacu' => $row['sp_giacu'],
        'sp_soluong' => $row['sp_soluong'],
        'lsp_ten' => $row['lsp_ten'],
        'nsx_ten' => $row['nsx_ten'],
    );
}
    //print_r($data); 
    //die;
    echo $twig->render('frontend/quantri/sanpham/display.html.twig',[
        'danhsachsanpham' => $data
    ]);
?>
