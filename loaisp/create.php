<?php 

require_once __DIR__ . "/../dbconnect.php";
    
?>

<form name="frmInsertLSP" id="frmInsertLSP" method="post" action="">
    Tên LSP: <input type="text" name="lsp_ten" id="lsp_ten" > <br>
    Mô tả LSP<input type="text" name="lsp_mota" id="lsp_mota" > <br>
    
    <input type="submit" name="submitSave" id="submitSave" value="SAVE">

</form>

<?php
    
    if(isset($_POST['submitSave'])) {
        $lsp_ten = $_POST['lsp_ten'];
        $lsp_mota = $_POST['lsp_mota'];

        $sqlInsert = "INSERT INTO loaisanpham(lsp_ten,lsp_mota) VALUES ('$lsp_ten','$lsp_mota');";
        mysqli_query($conn, $sqlInsert);
        echo 'Lưu thành công!';
        // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
        header('location:display.php');
    }
    ?>