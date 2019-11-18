<?php
// Include file cấu hình ban đầu của `Twig`
require_once __DIR__.'/../../../bootstrap.php';
// Truy vấn database
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__.'/../../../dbconnect.php');


    mysqli_set_charset($conn,"utf-8");

    if(isset($_POST['submitSave'])) {
        $lsp_ten = $_POST['lsp_ten'];
        $lsp_mota = $_POST['lsp_mota'];

    // Kiểm tra ràng buộc dữ liệu bên server(Validation). Tránh hacker lam bậy!
    // Tạo biến lỗi để chứa thông báo lỗi
    $errors = [];
    // required
    // empty= '' or NULL
    if (empty($lsp_ten)) {
        $errors['lsp_ten'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'value' => $lsp_ten,
            'msg' => 'Vui lòng nhập tên Loại Sản phẩm'
        ];
    }
    // minlength 3
    if (!empty($lsp_ten) && strlen($lsp_ten) < 3) {
        $errors['lsp_ten'][] = [
            'rule' => 'minlength',
            'rule_value' => 3,
            'value' => $lsp_ten,
            'msg' => 'Tên Loại Sản phẩm phải có ít nhất 3 ký tự'
        ];
    }
    // maxlength 50
    if (!empty($lsp_ten) && strlen($lsp_ten) > 50) {
        $errors['lsp_ten'][] = [
            'rule' => 'maxlength',
            'rule_value' => 50,
            'value' => $sp_ten,
            'msg' => 'Tên Loại Sản phẩm không được vượt quá 50 ký tự'
        ];
    }
    // Nếu như có lỗi -> thông báo lỗi ra màn hình
    if (!empty($errors)) { ?>
<div id="thongbao" class="alert alert-danger face fixed-top" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <ul>
        <?php foreach($errors as $fields) : ?>
            <?php foreach($fields as $field) : ?>
            <li><?= $field['msg']; ?></li>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </ul>
</div>
    <?php
    }
    else {
        $sqlInsert = "INSERT INTO loaisanpham(lsp_ten,lsp_mota) VALUES ('$lsp_ten','$lsp_mota');";
        mysqli_query($conn, $sqlInsert);
        echo 'Lưu thành công!';
        // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
        header("location:/sephora.com/backends/quantri/loaisp/display.php");
    }
}

    echo $twig->render('frontend/quantri/loaisp/create.html.twig',[
]);
?>/
