<?php 
    require_once __DIR__ . "/../../dbconnect.php";


    $lsp_ma = $_GET['lsp_ma'];

    $sqlSelect = "SELECT * FROM loaisanpham WHERE lsp_ma=$lsp_ma;";

    $result= mysqli_query($conn, $sqlSelect);

    $loaisanpham = mysqli_fetch_array($result, MYSQLI_ASSOC);

?>

<form name="frmSuaLSP" id="frmSuaLSP" method="post" action="">
    Mã LSP: <input type="text" name="lsp_ma" readonly value=<?php echo $loaisanpham['lsp_ma']?>> <br>
    Tên LSP: <input type="text" name="lsp_ten" value=<?php echo $loaisanpham['lsp_ten']?>> <br>
    Mô tả LSP: <input type="text" name="lsp_mota" value=<?php echo $loaisanpham['lsp_mota']?>> <br>
    <input type="submit" name="btnSua" value="Lưu" class="btn btn-outline-primary">
</form>

<?php
    if (isset($_POST['btnSua'])){
        $lsp_ten = $_POST['lsp_ten'];
        $lsp_mota = $_POST['lsp_mota'];

        $sqlUpdate = "UPDATE loaisanpham SET lsp_ten=N'$lsp_ten' ,lsp_mota=N'$lsp_mota' WHERE lsp_ma= $lsp_ma;";
        mysqli_query($conn, $sqlUpdate);
        echo "Lưu thành công !";

        header('location:/sephora?page=loaisp_ds');
    }
?>

