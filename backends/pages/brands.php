<?php

require_once __DIR__.'/../../bootstrap.php';
include_once(__DIR__.'/../../dbconnect.php');

    mysqli_set_charset($conn,"utf-8");
//INNISFREE
    $sql1 = <<<EOT
    SELECT sp.sp_ma, sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_mota, sp.sp_soluong, nsx.nsx_ten, lsp.lsp_ten, MAX(hsp.hsp_tentaptin) AS hsp_tentaptin
    FROM `sanpham` sp
    JOIN `loaisanpham` lsp ON sp.lsp_ma = lsp.lsp_ma
    LEFT JOIN `hinhsanpham` hsp ON sp.sp_ma = hsp.sp_ma
    LEFT JOIN nhasanxuat nsx ON sp.nsx_ma=nsx.nsx_ma
    WHERE nsx.nsx_ma = 1
    GROUP BY sp.sp_ma, sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_mota, sp.sp_soluong, lsp.lsp_ten
 
EOT;

    $rs = mysqli_query($conn, $sql1);

    $data1 = [];
    while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
        $data1[] = array(
        'sp_ma' => $row['sp_ma'],
        'sp_ten' => $row['sp_ten'],
        'sp_gia' => number_format($row['sp_gia'], 2, ".", ",") . ' vnđ',
        'sp_giacu' => number_format($row['sp_giacu'], 2, ".", ","),
        'sp_mota' => $row['sp_mota'],
        'sp_soluong' => $row['sp_soluong'],
        'nsx_ten' => $row['nsx_ten'],
        'lsp_ten' => $row['lsp_ten'],
        'hsp_tentaptin' => $row['hsp_tentaptin'],
    );
}
//SEPHORA
$sql2 = <<<EOT
    SELECT sp.sp_ma, sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_mota, sp.sp_soluong, nsx.nsx_ten, lsp.lsp_ten, MAX(hsp.hsp_tentaptin) AS hsp_tentaptin
    FROM `sanpham` sp
    JOIN `loaisanpham` lsp ON sp.lsp_ma = lsp.lsp_ma
    LEFT JOIN `hinhsanpham` hsp ON sp.sp_ma = hsp.sp_ma
    LEFT JOIN nhasanxuat nsx ON sp.nsx_ma=nsx.nsx_ma
    WHERE nsx.nsx_ma = 2
    GROUP BY sp.sp_ma, sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_mota, sp.sp_soluong, lsp.lsp_ten
 
EOT;

    $rs = mysqli_query($conn, $sql2);

    $data2 = [];
    while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
        $data2[] = array(
        'sp_ma' => $row['sp_ma'],
        'sp_ten' => $row['sp_ten'],
        'sp_gia' => number_format($row['sp_gia'], 2, ".", ",") . ' vnđ',
        'sp_giacu' => number_format($row['sp_giacu'], 2, ".", ","),
        'sp_mota' => $row['sp_mota'],
        'sp_soluong' => $row['sp_soluong'],
        'nsx_ten' => $row['nsx_ten'],
        'lsp_ten' => $row['lsp_ten'],
        'hsp_tentaptin' => $row['hsp_tentaptin'],
    );
}
//CHARLIE 

$sql3 = <<<EOT
SELECT sp.sp_ma, sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_mota, sp.sp_soluong, nsx.nsx_ten, lsp.lsp_ten, MAX(hsp.hsp_tentaptin) AS hsp_tentaptin
FROM `sanpham` sp
JOIN `loaisanpham` lsp ON sp.lsp_ma = lsp.lsp_ma
LEFT JOIN `hinhsanpham` hsp ON sp.sp_ma = hsp.sp_ma
LEFT JOIN nhasanxuat nsx ON sp.nsx_ma=nsx.nsx_ma
WHERE nsx.nsx_ma = 3
GROUP BY sp.sp_ma, sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_mota, sp.sp_soluong, lsp.lsp_ten

EOT;

$rs = mysqli_query($conn, $sql3);

$data3 = [];
while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
    $data4[] = array(
    'sp_ma' => $row['sp_ma'],
    'sp_ten' => $row['sp_ten'],
    'sp_gia' => number_format($row['sp_gia'], 2, ".", ",") . ' vnđ',
    'sp_giacu' => number_format($row['sp_giacu'], 2, ".", ","),
    'sp_mota' => $row['sp_mota'],
    'sp_soluong' => $row['sp_soluong'],
    'nsx_ten' => $row['nsx_ten'],
    'lsp_ten' => $row['lsp_ten'],
    'hsp_tentaptin' => $row['hsp_tentaptin'],
);
}
//KYLIE
    $sql4 = <<<EOT
    SELECT sp.sp_ma, sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_mota, sp.sp_soluong, nsx.nsx_ten, lsp.lsp_ten, MAX(hsp.hsp_tentaptin) AS hsp_tentaptin
    FROM `sanpham` sp
    JOIN `loaisanpham` lsp ON sp.lsp_ma = lsp.lsp_ma
    LEFT JOIN `hinhsanpham` hsp ON sp.sp_ma = hsp.sp_ma
    LEFT JOIN nhasanxuat nsx ON sp.nsx_ma=nsx.nsx_ma
    WHERE nsx.nsx_ma = 4
    GROUP BY sp.sp_ma, sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_mota, sp.sp_soluong, lsp.lsp_ten

    EOT;

    $rs = mysqli_query($conn, $sql4);

    $data4 = [];
    while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
        $data4[] = array(
        'sp_ma' => $row['sp_ma'],
        'sp_ten' => $row['sp_ten'],
        'sp_gia' => number_format($row['sp_gia'], 2, ".", ",") . ' vnđ',
        'sp_giacu' => number_format($row['sp_giacu'], 2, ".", ","),
        'sp_mota' => $row['sp_mota'],
        'sp_soluong' => $row['sp_soluong'],
        'nsx_ten' => $row['nsx_ten'],
        'lsp_ten' => $row['lsp_ten'],
        'hsp_tentaptin' => $row['hsp_tentaptin'],
    );
    }
    //LOVE BEAUTY
    $sql5 = <<<EOT
    SELECT sp.sp_ma, sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_mota, sp.sp_soluong, nsx.nsx_ten, lsp.lsp_ten, MAX(hsp.hsp_tentaptin) AS hsp_tentaptin
    FROM `sanpham` sp
    JOIN `loaisanpham` lsp ON sp.lsp_ma = lsp.lsp_ma
    LEFT JOIN `hinhsanpham` hsp ON sp.sp_ma = hsp.sp_ma
    LEFT JOIN nhasanxuat nsx ON sp.nsx_ma=nsx.nsx_ma
    WHERE nsx.nsx_ma = 5
    GROUP BY sp.sp_ma, sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_mota, sp.sp_soluong, lsp.lsp_ten

    EOT;

    $rs = mysqli_query($conn, $sql5);

    $data5 = [];
    while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
        $data5[] = array(
        'sp_ma' => $row['sp_ma'],
        'sp_ten' => $row['sp_ten'],
        'sp_gia' => number_format($row['sp_gia'], 2, ".", ",") . ' vnđ',
        'sp_giacu' => number_format($row['sp_giacu'], 2, ".", ","),
        'sp_mota' => $row['sp_mota'],
        'sp_soluong' => $row['sp_soluong'],
        'nsx_ten' => $row['nsx_ten'],
        'lsp_ten' => $row['lsp_ten'],
        'hsp_tentaptin' => $row['hsp_tentaptin'],
    );
    }


    //print_r($data); 
    //die;
    echo $twig->render('frontend/pages/brands.html.twig',[
        'dssp1' => $data1,
        'dssp2' => $data2,
        'dssp3' => $data3,
        'dssp4' => $data4,
        'dssp5' => $data5
    ]);
?>
