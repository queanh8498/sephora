<?php
require_once __DIR__.'/../../bootstrap.php';

include_once(__DIR__.'/../../dbconnect.php');

$message = '';

if(isset($_POST['btnDangKy']))
{   
    $kh_tendangnhap = $_POST['kh_tendangnhap'];
    $kh_matkhau = sha1($_POST['kh_matkhau']);
    $kh_ten = $_POST['kh_ten'];
    $kh_gioitinh = $_POST['kh_gioitinh'];
    $kh_diachi = $_POST['kh_diachi'];
    $kh_dienthoai = $_POST['kh_dienthoai'];
    $kh_trangthai = 1;
    $kh_quantri = 0;

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
    
    //KTRA Mật khẩu
    if (empty($kh_matkhau)) {
        $errors['kh_matkhau'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'value' => $kh_matkhau,
            'msg' => 'Vui lòng nhập Mật khẩu !'
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
    $sqlInsert = "INSERT INTO khachhang (kh_tendangnhap, kh_matkhau, kh_ten, kh_gioitinh, kh_diachi, kh_dienthoai,kh_trangthai, kh_quantri) VALUES 
                                    ('$kh_tendangnhap', '$kh_matkhau', '$kh_ten', $kh_gioitinh, '$kh_diachi', '$kh_dienthoai', $kh_trangthai, $kh_quantri);";
    //var_dump($sqlInsert); die;
    $resultInsert = mysqli_query($conn, $sqlInsert);

    // Đóng kết nối
    mysqli_close($conn); 
    
    header("location:register-success.php?kh_tendangnhap=$kh_tendangnhap");
}
}
    echo $twig->render('frontend/pages/register.html.twig', ['message' => $message]);
