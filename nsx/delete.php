<?php 
    require_once __DIR__ . "/../dbconnect.php";


    $nsx_ma = $_GET['nsx_ma'];

    $sqlDelete = "DELETE FROM loaisanpham WHERE nsx_ma = $nsx_ma;";

    $result= mysqli_query($conn, $sqlDelete);
    //print_r($sanpham);

    header('location:/sephora?page=sanpham_ds');

?>
