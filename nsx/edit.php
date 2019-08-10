<?php 
    require_once __DIR__ . "/../dbconnect.php";


    $nsx_ma = $_GET['nsx_ma'];

    $sqlSelect = "SELECT * FROM nhasanxuat WHERE nsx_ma=$nsx_ma;";

    $result= mysqli_query($conn, $sqlSelect);

    $nsx = mysqli_fetch_array($result, MYSQLI_ASSOC);

?>

<form name="frmSuaNSX" id="frmSuaLSP" method="post" action="">
    Mã LSP: <input type="text" name="nsx_ma" readonly value=<?php echo $nsx['nsx_ma']?>> <br>
    Tên LSP: <input type="text" name="nsx_ten" value=<?php echo $nsx['nsx_ten']?>> <br>
    <input type="submit" name="btnSua" value="Lưu">
</form>

<?php
    if (isset($_POST['btnSua'])){
        $lsp_ten = $_POST['nsx_ten'];

        $sqlUpdate = "UPDATE nhasanxuat SET nsx_ten=N'$nsx_ten' WHERE nsx_ma= $nsx_ma;";
        $rs = mysqli_query($conn, $sqlUpdate);
        echo "Lưu thành công !";

        header('location:display.php');
    }
?>

