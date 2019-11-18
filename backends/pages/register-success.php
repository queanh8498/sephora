<?php
require_once __DIR__.'/../../bootstrap.php';
include_once(__DIR__.'/../../dbconnect.php');

$kh_tendangnhap = $_GET['kh_tendangnhap'];
$sqlSelect = "SELECT * FROM `khachhang` WHERE kh_tendangnhap='$kh_tendangnhap';";

$resultSelect = mysqli_query($conn, $sqlSelect);
$khachhangRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC); // 1 record

echo $twig->render('frontend/pages/register-success.html.twig', ['khachhang' => $khachhangRow] );

echo $twig->render('frontend/pages/header.html.twig', ['khachhang' => $khachhangRow] );