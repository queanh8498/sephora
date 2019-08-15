<?php 

require_once __DIR__ . "/../dbconnect.php";
    
?>

<form name="frmInsertNSX" id="frmInsertNSX" method="post" action="">
    Tên nsx: <input type="text" name="nsx_ten" id="nsx_ten" class="form-control" > <br>

    <input type="submit" name="submitSave" id="submitSave" value="SAVE">

</form>

<?php
    
    if(isset($_POST['submitSave'])) {
        $lsp_ten = $_POST['nsx_ten'];

        $sqlInsert = "INSERT INTO nsx(nsx_ten) VALUES (N'$nsx_ten');";
        mysqli_query($conn, $sqlInsert);
        echo 'Lưu thành công!';
        // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
        header('location:display.php');
    }
    ?>