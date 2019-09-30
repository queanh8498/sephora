<?php
// Include file cấu hình ban đầu của `Twig`
require_once __DIR__.'/../../bootstrap.php';
// Truy vấn database
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__.'/../../dbconnect.php');

include_once(__DIR__.'/../app/helpers.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Biến dùng lưu thông báo message
$message = '';
// 2. Nếu người dùng có bấm nút Đăng nhập thì thực thi câu lệnh UPDATE

if(isset($_POST['btnDangKy']))
{   
    $kh_tendangnhap = $_POST['kh_tendangnhap'];
    $kh_matkhau = sha1($_POST['kh_matkhau']);
    $kh_ten = $_POST['kh_ten'];
    $kh_gioitinh = $_POST['kh_gioitinh'];
    $kh_diachi = $_POST['kh_diachi'];
    $kh_dienthoai = $_POST['kh_dienthoai'];
    $kh_email = $_POST['kh_email'];
    $kh_ngaysinh = $_POST['kh_ngaysinh'];
    $kh_thangsinh = $_POST['kh_thangsinh'];
    $kh_namsinh = $_POST['kh_namsinh'];
    $kh_cmnd = $_POST['kh_cmnd'];
    $kh_makichhoat =sha1(time());;
    $kh_trangthai = 0;
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
    
    if (empty($kh_ngaysinh)) {
        $errors['kh_ngaysinh'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'value' => $kh_ngaysinh,
            'msg' => 'Vui lòng nhập ngày sinh của bạn !'
        ];
    }
    if (empty($kh_thangsinh)) {
        $errors['kh_thangsinh'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'value' => $kh_thangsinh,
            'msg' => 'Vui lòng nhập tháng sinh của bạn !'
        ];
    }
    if (empty($kh_namsinh)) {
        $errors['kh_namsinh'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'value' => $kh_namsinh,
            'msg' => 'Vui lòng nhập năm sinh của bạn !'
        ];
    }
    if (empty($kh_email)) {
        $errors['kh_email'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'value' => $kh_email,
            'msg' => 'Vui lòng nhập email của bạn !'
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
    $sqlInsert = "INSERT INTO khachhang (kh_tendangnhap, kh_matkhau, kh_ten, kh_gioitinh, kh_diachi, kh_dienthoai, kh_email, kh_ngaysinh, kh_thangsinh, kh_namsinh, kh_cmnd, kh_makichhoat, kh_trangthai, kh_quantri) VALUES 
                                    ('$kh_tendangnhap', '$kh_matkhau', '$kh_ten', $kh_gioitinh, '$kh_diachi', '$kh_dienthoai', '$kh_email', $kh_ngaysinh, $kh_thangsinh, $kh_namsinh, '$kh_cmnd', '$kh_makichhoat', $kh_trangthai, $kh_quantri);";
    //var_dump($sqlInsert); die;
    $resultInsert = mysqli_query($conn, $sqlInsert);

    // Đóng kết nối
    mysqli_close($conn);
    // Gởi mail kích hoạt tài khoản
    $mail = new PHPMailer(true);                               // Passing `true` enables exceptions
    try {
        //Server settings
        //$mail->SMTPDebug = 2;                                // Enable verbose debug output
        $mail->isSMTP();                                       // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                        // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                                // Enable SMTP authentication
        $mail->Username = 'tranlenhatminh97@gmail.com';     // SMTP username
        $mail->Password = 'tqeizahmkrpxcpyc';                  // SMTP password
        $mail->SMTPSecure = 'tls';                             // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                     // TCP port to connect to
        $mail->CharSet = "UTF-8";
    
        // Bật chế bộ tự mình mã hóa SSL
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        //Recipients
        $mail->setFrom('tranlenhatminh97@gmail.com', '[Hỗ trợ khách hàng] - Thông tin tài khoản!');
        $mail->addAddress($kh_email);                          // Add a recipient
        $mail->addReplyTo('anhb1606911@student.ctu.edu.vn', 'Người quản trị Website');
        
        $mail->isHTML(true);                                    // Set email format to HTML
        $mail->Subject = 'Thông báo kích hoạt tài khoản';
        $siteUrl = siteURL();
        $body = <<<EOT
        <table>
            <tr>
                <td><h1 style="color: black; font-size: 16px; text-align: center;">S E P H O R A</h1>
                    <img src="https://res.cloudinary.com/drdoqfhly/image/upload/v1530887094/gg-1_synrgy.jpg" width="300px" height="150px" />
                </td>
            </tr>
            <tr>
                <td>
                    Xin chào $kh_ten, cám ơn bạn đã đăng ký Hệ thống của chúng tôi. Vui lòng click vào liên kết sau để kích hoạt tài khoản!
                    <a href="http://localhost/sephora/backends/pages/kichhoattaikhoan.php?kh_tendangnhap=$kh_tendangnhap&kh_makichhoat=$kh_makichhoat">Kích hoạt tài khoản</a>
                </td>
            </tr>
            <tr>
                <td>
                    <ul>
                        <li>Xem chúng tôi qua <a href="https://facebook.com/fanpagecuaban">Facebook</a></li>
                        <li>Xem chúng tôi qua <a href="https://twitter.com/fanpagecuaban">Twitter</a></li>
                    </ul>
                </td>
            </tr>
        </table>
EOT;
        $mail->Body    = $body;
    
        $mail->send();
    } catch (Exception $e) {
        echo 'Lỗi khi gởi mail: ', $mail->ErrorInfo;
    }

    // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Đăng ký thành công
    header("location:register-success.php?kh_tendangnhap=$kh_tendangnhap");
}
}
    // Yêu cầu `Twig` vẽ giao diện được viết trong file `frontend/pages/register.html.twig`
    echo $twig->render('frontend/pages/register.html.twig', ['message' => $message]);
