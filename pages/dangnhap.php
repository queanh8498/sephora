<?php 

require_once __DIR__ . "/../dbconnect.php";

?>

<form name= "frmDN" id="frmDN" method="post">

Tên đăng nhập: <input type="text" name="kh_tendangnhap" id="kh_tendangnhap" class="form-control"><br><br>
Mật khẩu: <input type="password" name="kh_matkhau" id="kh_matkhau" class="form-control"><br><br>

 <button name="btnLuu" id="btnLuu" class="btn btn-primary">
        <i class="fa fa-heartbeat" aria-hidden="true"></i> LOGIN
    </button>
</form>

<?php
    if (isset($_POST['btnLuu'])){
        $kh_tendangnhap=$_POST['kh_tendangnhap'];
        $kh_matkhau= sha1($_POST['kh_matkhau']);

        $sql= <<<EOT
        SELECT * FROM khachhang WHERE kh_tendangnhap='$kh_tendangnhap' AND kh_matkhau='$kh_matkhau';
EOT;

    $rs = mysqli_query($conn, $sql);
    //var_dump($sqlInsert);die;

    $ktra = mysqli_fetch_array($rs, MYSQLI_ASSOC);
    if(empty ($ktra)){
        echo 'Dang nhap khong thanh cong. Vui long kiem tra lai nhe !';
    }else {
        echo 'Dang nhap thanh cong roi neeee !!!';
        header('location:../index.php');


        //luu session
        $_SESSION['kh_tendangnhap'] = $kh_tendangnhap;
    }
    
}
?>