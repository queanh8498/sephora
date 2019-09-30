<?php
// Include file cấu hình ban đầu của `Twig`
require_once __DIR__.'/../../../bootstrap.php';
// Truy vấn database
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__.'/../../../dbconnect.php');


    mysqli_set_charset($conn,"utf-8");

    //HERE DOCS
    $sql = <<<EOT
    SELECT * FROM loaisanpham;
 
EOT;

    $rs = mysqli_query($conn, $sql);

    $dataLSP = [];
    while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
        $dataLSP[] = array(
        'lsp_ma' => $row['lsp_ma'],
        'lsp_ten' => $row['lsp_ten'],
        'lsp_mota' => $row['lsp_mota'],
        
    );
}

    echo $twig->render('frontend/quantri/loaisp/display.html.twig',[
        'danhsachLSP' => $dataLSP
    ]);
?>
