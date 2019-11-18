<?php
require_once __DIR__.'/../../bootstrap.php';

include_once(__DIR__.'/../../dbconnect.php');

$message = '';

if (isset($_SESSION['username'])){
    
    unset($_SESSION['username']);

    $message = 'Đăng xuất thành công !';
    //header('location:login.php');
}
    else {
        $message = 'Người dùng chưa Đăng nhập! Bạn không thể Đăng xuất !';
    }
    echo $twig->render('frontend/pages/logout.html.twig', ['message' => $message]);
?>