<?php
// Include file cấu hình ban đầu của `Twig`
require_once __DIR__.'/../../../bootstrap.php';
// Truy vấn database
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__.'/../../../dbconnect.php');


    mysqli_set_charset($conn,"utf-8");   

if(isset($_POST['submitSave'])) 
{
    $kh_tendangnhap = $_POST['kh_tendangnhap'];
    $kh_matkhau = sha1($_POST['kh_matkhau']);
    $kh_ten = $_POST['kh_ten'];
    $kh_gioitinh = $_POST['kh_gioitinh'];
    $kh_diachi = $_POST['kh_diachi'];
    $kh_email = $_POST['kh_email'];
    $kh_dienthoai = $_POST['kh_dienthoai'];
    $kh_cmnd = $_POST['kh_cmnd'];
    $kh_trangthai = $_POST['kh_trangthai'];
    $kh_quantri = isset($_POST['kh_quantri']) ? $_POST['kh_quantri'] : '0';

    $errors = [];
    //KTRA TÊN ĐĂNG NHẬP
    // required
    // empty= '' or NULL
    if (empty($kh_tendangnhap)) {
        $errors['kh_tendangnhap'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'value' => $kh_tendangnhap,
            'msg' => 'Vui lòng nhập tên ĐĂNG NHẬP'
        ];
    }
    // maxlength 10
    if (!empty($kh_tendangnhap) && strlen($kh_tendangnhap) > 10) {
        $errors['kh_tendangnhap'][] = [
            'rule' => 'maxlength',
            'rule_value' => 10,
            'value' => $kh_tendangnhap,
            'msg' => 'TÊN ĐĂNG NHẬP không được vượt quá 10 ký tự !'
        ];
    }
    //KTRA Mật khẩu
    if (empty($kh_matkhau)) {
        $errors['kh_matkhau'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'value' => $kh_matkhau,
            'msg' => 'Vui lòng nhập Mật khẩu !'
        ];
    }
    // maxlength 16
    if (!empty($kh_matkhau) && strlen($kh_matkhau) > 16) {
        $errors['kh_matkhau'][] = [
            'rule' => 'maxlength',
            'rule_value' => 16,
            'value' => $kh_matkhau,
            'msg' => 'Mật khẩu không được vượt quá 16 ký tự'
        ];
    }
    //KTRA Tên KH
    if (empty($kh_ten)) {
        $errors['kh_ten'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'value' => $kh_ten,
            'msg' => 'Vui lòng nhập Tên của bạn !'
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
    
    $sql = "INSERT INTO `khachhang`(kh_tendangnhap, kh_matkhau, kh_ten, kh_gioitinh, kh_diachi, kh_email, kh_dienthoai,kh_cmnd,kh_trangthai,kh_quantri) VALUES
     ('$kh_tendangnhap', '$kh_matkhau', '$kh_ten', '$kh_gioitinh', '$kh_diachi', '$kh_email', '$kh_dienthoai','$kh_cmnd',$kh_trangthai,$kh_quantri);";
    mysqli_query($conn,$sql);
    //print_r($sql);
    mysqli_close($conn);
    
   header("location:/sephora/backends/quantri/khachhang/display.php");
}
}

    echo $twig->render('frontend/quantri/khachhang/create.html.twig',[
]);
?>
