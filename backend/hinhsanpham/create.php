<?php 

require_once __DIR__ ."/../../dbconnect.php";

    //HERE DOCS
    $sql = <<<EOT
    SELECT * FROM sanpham;
EOT;

$rs = mysqli_query($conn, $sql);

$data = [];
while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
    $data[] = array(
    'sp_ma' => $row['sp_ma'],
    'sp_ten' => $row['sp_ten'],
);
}

//print_r($data); 
//die;
?>

<form name="frmhinhSP" id="frmhinhSP" method="post" action="" enctype="multipart/form-data">
    Chọn File: <input type="file" name="hsp" id="hsp"> <br><br>
    
    Sản phẩm <select name="sp_ma" id="sp_ma"> 
    <?php foreach ($data as $row) : ?> 
        <option value="<?php echo $row['sp_ma']; ?>"><?php echo $row['sp_ten']; ?></option><br>
    <?php endforeach; ?>
    </select> <br><br>
    
    <input type="submit" name="submitSave" id="submitSave" value="SAVE">

</form>

<?php 
if(isset($_POST['submitSave'])){

    $sp_ma = $_POST['sp_ma'];

    $upload_dir = "./../../public/uploadfile/";
    

    if($_FILES['hsp']['error'] > 0 ){
        echo 'Lỗi load file !'; die;
    }else{
        $hsp = $_FILES['hsp']['name'];
        //print_r($hsp);die;
        move_uploaded_file($_FILES['hsp']['tmp_name'], $upload_dir.$hsp);
        echo 'Upload Thành công !';
    }

    $sqlInsert = "INSERT INTO hinhsanpham (hsp_tentaptin, sp_ma) VALUES ('$hsp', '$sp_ma');";
    $rs = mysqli_query($conn, $sqlInsert);

}
?>
