<?php 
    require_once __DIR__ . "/../dbconnect.php";


    $sp_ma = $_GET['sp_ma'];

    echo "Đang sửa sp có mã " . $sp_ma . "<br>";
    $sqlSelect = "SELECT * FROM sanpham WHERE sp_ma=$sp_ma;";

    $result= mysqli_query($conn, $sqlSelect);

    $sanpham = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //print_r($sanpham);

?>

<form name="frmSuaSP" id="frmSuaSP" method="post" action="">
    Mã SP: <input type="text" name="sp_ma" readonly value=<?php echo $sanpham['sp_ma']?>> <br>
    Tên SP: <input type="text" name="sp_ten" value=<?php echo $sanpham['sp_ten']?>> <br>
    Gía SP: <input type="text" name="sp_gia" value=<?php echo $sanpham['sp_gia']?>> <br>
    Ngày cập nhật SP: <input type="text" name="sp_ngaycapnhat" value=<?php echo $sanpham['sp_ngaycapnhat']?>> <br>
    Số lượng: <input type="text" name="sp_soluong" value=<?php echo $sanpham['sp_soluong']?>> <br>
    <input type="submit" name="btnSua" value="Lưu">
</form>

<?php
    if (isset($_POST['btnSua'])){
        $sp_ten = $_POST['sp_ten'];
        $sp_gia = $_POST['sp_gia'];
        $sp_ngacapnhat = $_POST['sp_ngaycapnhat'];
        $sp_soluong = $_POST['sp_soluong'];

        $sqlUpdate = "UPDATE sanpham SET sp_ten=N'$sp_ten' ,sp_gia=N'$sp_gia' ,sp_ngaycapnhat= N'$sp_ngacapnhat',sp_soluong=N'$sp_soluong' WHERE sp_ma= $sp_ma;";
        $rs = mysqli_query($conn, $sqlUpdate);
        echo "Lưu thành công !";

        header('location:displaysp.php');
    }
?>

