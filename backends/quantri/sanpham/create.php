<?php
// Include file cấu hình ban đầu của `Twig`
require_once __DIR__.'/../../../bootstrap.php';
// Truy vấn database
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__.'/../../../dbconnect.php');


    mysqli_set_charset($conn,"utf-8");

    //HERE DOCS
    $sql = <<<EOT
    SELECT * FROM loaisanpham;
EOT;

$rs = mysqli_query($conn, $sql);

$dataLSP = [];
while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
    $dataLSP[] = array(
    'lsp_ma' => $row['lsp_ma'],
    'lsp_ten' => $row['lsp_ten'],
);
}

    $sqlNSX = <<<EOT
    SELECT * FROM nhasanxuat;
EOT;

    $rsNSX = mysqli_query($conn, $sqlNSX);

    $dataNSX = [];
    while ($rowNSX = mysqli_fetch_array($rsNSX, MYSQLI_ASSOC)) {
    $dataNSX[] = array(
    'nsx_ma' => $rowNSX['nsx_ma'],
    'nsx_ten' => $rowNSX['nsx_ten'],
);
}

if(isset($_POST['submitSave'])) 
{
    $sp_ten = $_POST['sp_ten'];
    $sp_gia = $_POST['sp_gia'];
    $sp_giacu = $_POST['sp_giacu'];
    $sp_mota = $_POST['sp_mota'];
    $sp_soluong = $_POST['sp_soluong'];
    $lsp_ma = $_POST['lsp_ma'];
    $nsx_ma = $_POST['nsx_ma'];

    $errors = [];
    //KTRA TÊN SP
    // required
    // empty= '' or NULL
    if (empty($sp_ten)) {
        $errors['sp_ten'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'value' => $sp_ten,
            'msg' => 'Vui lòng nhập tên Sản phẩm'
        ];
    }
    // minlength 3
    if (!empty($sp_ten) && strlen($sp_ten) < 3) {
        $errors['sp_ten'][] = [
            'rule' => 'minlength',
            'rule_value' => 3,
            'value' => $sp_ten,
            'msg' => 'Tên Sản phẩm phải có ít nhất 3 ký tự'
        ];
    }
    //KTRA GIÁ
    if (empty($sp_gia)) {
        $errors['sp_gia'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'value' => $sp_gia,
            'msg' => 'Vui lòng nhập Đơn Gía Sản phẩm'
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

    $sql = "INSERT INTO `sanpham`(sp_ten, sp_gia, sp_giacu, sp_mota, sp_soluong, lsp_ma, nsx_ma) VALUES ('$sp_ten', $sp_gia, $sp_giacu, '$sp_mota', $sp_soluong, $lsp_ma, $nsx_ma);";
    mysqli_query($conn,$sql);
    //print_r($sql);
    mysqli_close($conn);
    
   header("location:/sephora.com/backends/quantri/sanpham/display.php");
}
}
    echo $twig->render('frontend/quantri/sanpham/create.html.twig',[
        'danhsachLSP' => $dataLSP,
        'danhsachNSX' => $dataNSX

]);
?>
