<?php

require_once __DIR__.'/../../bootstrap.php';
include_once(__DIR__.'/../../dbconnect.php');

    mysqli_set_charset($conn,"utf-8");

    $sql = <<<EOT
    SELECT sp.sp_ma, sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_mota, sp.sp_soluong, lsp.lsp_ten, MAX(hsp.hsp_tentaptin) AS hsp_tentaptin
    FROM `sanpham` sp
    JOIN `loaisanpham` lsp ON sp.lsp_ma = lsp.lsp_ma
    LEFT JOIN `hinhsanpham` hsp ON sp.sp_ma = hsp.sp_ma
    GROUP BY sp.sp_ma, sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_mota, sp.sp_soluong, lsp.lsp_ten
 
EOT;

    $rs = mysqli_query($conn, $sql);

    $data = [];
    while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
        $data[] = array(
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
    //print_r($data); 
    //die;
    echo $twig->render('frontend/sanpham/dssp.html.twig',[
        'danhsachsanpham' => $data
    ]);
?>
