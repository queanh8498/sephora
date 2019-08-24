<?php 

require_once __DIR__ . "/../dbconnect.php";

?>

<form name= "frmDK" id="frmDK" method="post">

Tên đăng nhập: <input type="text" name="kh_tendangnhap" id="kh_tendangnhap" ><br><br>
Mật khẩu: <input type="password" name="kh_matkhau" id="kh_matkhau" ><br><br>
Họ tên: <input type="text" name="kh_ten" id="kh_ten" ><br><br>
giới tính: <select name="kh_gioitinh" id="kh_gioitinh"><br><br>
    <option value="0">Nam</option><br>
    <option value="1">Nữ</option><br>
    <option value="2">Không công bố</option><br>
    </select><br>
Địa chỉ: <input type="text" name="kh_diachi" id="kh_diachi" ><br><br>
Số điện thoại: <input type="text" name="kh_dienthoai" id="kh_dienthoai" ><br><br>
Email: <input type="text" name="kh_email" id="kh_email" ><br><br>
Ngày sinh: <input type="text" name="kh_ngaysinh" id="kh_ngaysinh" ><br><br>
Tháng sinh: <input type="text" name="kh_thangsinh" id="kh_thangsinh" ><br><br>
Năm sinh: <input type="text" name="kh_namsinh" id="kh_namsinh" ><br><br>
CMND: <input type="text" name="kh_cmnd" id="kh_cmnd" ><br><br>
Mã kích hoạt: <input type="text" name="kh_makichhoat" id="kh_makichhoat" ><br><br>
Trạng thái: 
    <select name="kh_trangthai" id="kh_trangthai">
    <option value="0">Chưa kích hoạt</option>
    <option value="1">Đã kích hoạt</option>
    </select><br><br>
Có quyền quản trị: <input type="checkbox" name="kh_quantri" id="kh_quantri" value="1" >

 <input type="submit" name="btnSave" id="btnSave" value="Save" >

</form>

<?php
    if (isset($_POST['btnSave'])){
        $kh_tendangnhap=$_POST['kh_tendangnhap'];
        $kh_matkhau=sha1($_POST['kh_matkhau']);
        $kh_ten=$_POST['kh_ten'];
        $kh_gioitinh=$_POST['kh_gioitinh'];
        $kh_diachi=$_POST['kh_diachi'];
        $kh_dienthoai=$_POST['kh_dienthoai'];
        $kh_email=$_POST['kh_email'];
        $kh_ngaysinh=$_POST['kh_ngaysinh'];
        $kh_thangsinh=$_POST['kh_thangsinh'];
        $kh_namsinh=$_POST['kh_namsinh'];
        $kh_cmnd=$_POST['kh_cmnd'];
        $kh_makichhoat=$_POST['kh_makichhoat'];
        $kh_trangthai=$_POST['kh_trangthai'];
        $kh_quantri= isset($_POST['kh_quantri']) ? $_POST['kh_quantri'] : 0;

        $sqlInsert= "INSERT INTO khachhang(kh_tendangnhap, kh_matkhau, kh_ten, kh_gioitinh, kh_diachi, kh_dienthoai, kh_email, kh_ngaysinh, kh_thangsinh, kh_namsinh, kh_cmnd, kh_makichhoat, kh_trangthai, kh_quantri) VALUES ('kh_tendangnhap', 'kh_matkhau', 'kh_ten', kh_gioitinh, 'kh_diachi', 'kh_dienthoai', 'kh_email', kh_ngaysinh, kh_thangsinh, kh_namsinh, 'kh_cmnd', kh_makichhoat, kh_trangthai, kh_quantri);";
        var_dump($sqlInsert);die;
    $rs = mysqli_query($conn, $sqlInsert);
    }

?>