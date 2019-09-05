<?php
// Include file cấu hình ban đầu của `Twig`
require_once __DIR__.'/bootstrap.php';
// Thực hiện LOGIC code
// Giả sử lấy dữ liêu rồi SELECT * FROM configs/settings
$hoten = 'QueAnh';
$sdt = '01111';
$dc = '30.4';
// Yêu cầu `Twig` vẽ giao diện được viết trong file `vidu3.html.twig`
// với dữ liệu truyền vào file giao diện được đặt tên là ``
echo $twig->render('gioithieu_table.html.twig', 
    // Dữ liệu được đổ vào template
    [
        'ht' => $hoten,
        'sdt' => $sdt,
        'dc' => $dc,
    ]
);