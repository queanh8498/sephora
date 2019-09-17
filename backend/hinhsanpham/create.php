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
    Chọn File: <input type="file" name="hsp_tentaptin" id="hsp_tentaptin"> <br><br>
    
    Sản phẩm <select name="sp_ma" id="sp_ma"> 
    <?php foreach ($data as $row) : ?> 
        <option value="<?php echo $row['sp_ma']; ?>"><?php echo $row['sp_ten']; ?></option><br>
    <?php endforeach; ?>

    </select> 
    
    <br><br>
    
    <input type="submit" name="submitSave" id="submitSave" class="btn btn-primary" value="HOÀN TÂT">

</form>
<?php
    if(isset($_POST['submitSave'])){
        $sp_ma=$_POST['sp_ma'];
        $upload_dir="/sephora/uploads/";
        if($_FILES['hsp_tentaptin']['error']>0){
            echo "File bị lỗi"; die;
        }
        else{
            $hsp_tentaptin=$_FILES['hsp_tentaptin']['name'];
            move_uploaded_file($_FILES['hsp_tentaptin']['tmp_name'],  $upload_dir.$hsp_tentaptin);
            echo "Upload thành công";
        }
        $sqlInsert="INSERT INTO hinhsanpham(hsp_tentaptin, sp_ma) VALUES ('$hsp_tentaptin', $sp_ma);";
        $result=mysqli_query($conn,$sqlInsert);
        //var_dump(''); die;
        header('location:/sephora/backend/index.php?page=hinhsp_ds');
    }
?>

