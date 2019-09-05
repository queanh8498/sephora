<?php
require_once __DIR__ . "/../../dbconnect.php";

if (isset($_SESSION['kh_tendangnhap']) ){
    
    $_SESSION['kh_tendangnhap']='';
    header('location:dangnhap.php');

}

?>