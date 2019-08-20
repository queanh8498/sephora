<?php 
    require_once __DIR__ . "/../dbconnect.php";


    $sp_ma = $_GET['sp_ma'];

    $sqlDelete = "DELETE FROM sanpham WHERE sp_ma = $sp_ma;";

    $result= mysqli_query($conn, $sqlDelete);
    //print_r($sanpham);

    header('location:/sephora?page=sanpham_ds');

?>
