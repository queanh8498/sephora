<?php 
    require_once __DIR__ . "/../../dbconnect.php";


    $sp_ma = $_GET['sp_ma'];

    $sqlSelect = "SELECT * FROM sanpham WHERE sp_ma=$sp_ma;";

    $result= mysqli_query($conn, $sqlSelect);

    $sanpham = [];
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $sanpham = array(
            'sp_ma' => $row['sp_ma'],
            'sp_ten' => $row['sp_ten'],
            'sp_gia' => $row['sp_gia'],
            'sp_giacu' => $row['sp_giacu'],
            'sp_ngaycapnhat' => $row['sp_ngaycapnhat'],
            'sp_soluong' => $row['sp_soluong'],
            'lsp_ma' => $row['lsp_ma'],
            'nsx_ma' => $row['nsx_ma'],
        );
    }

    $sql = <<<EOT
    SELECT * FROM loaisanpham;
EOT;

$rs = mysqli_query($conn, $sql);

$dataLSP = [];
while ($rowLSP = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
    $dataLSP[] = array(
    'lsp_ma' => $rowLSP['lsp_ma'],
    'lsp_ten' => $rowLSP['lsp_ten'],
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
    //print_r($sanpham);

?>

<form name="frmSuaSP" id="frmSuaSP" method="post" action="">
    Mã SP: <input type="text" name="sp_ma" readonly value=<?php echo $sanpham['sp_ma']?>> <br>
    Tên SP: <input type="text" name="sp_ten" value=<?php echo $sanpham['sp_ten']?>> <br>
    Gía SP: <input type="text" name="sp_gia" value=<?php echo $sanpham['sp_gia']?>> <br>
    Gia cu: <input type="text" name="sp_giacu" value=<?php echo $sanpham['sp_giacu']?>> <br>
    Ngày cập nhật SP: <input type="text" name="sp_ngaycapnhat" value=<?php echo $sanpham['sp_ngaycapnhat']?>> <br>
    Số lượng: <input type="text" name="sp_soluong" value=<?php echo $sanpham['sp_soluong']?>> <br>
    Loai SP: 
    <select name="lsp_ma" id="lsp_ma"> 
    <?php foreach ($data as $rowLSP) : 
        if ($rowLSP['lsp_ma'] == $sanpham['lsp_ma']){ ?> 
        <option value="<?php echo $rowLSP['lsp_ma']; ?>" selected><?php echo $rowLSP['lsp_ten']; ?></option><br>
        <?php
        } else
        ?>
        <option value="<?php echo $rowLSP['lsp_ma']; ?>" ><?php echo $rowLSP['lsp_ten']; ?></option><br>
        <?php 
     endforeach; 
     ?>
    </select> <br>

    NSX: <select name="nsx_ma" id="nsx_ma"> 
    <?php foreach ($dataNSX as $rowNSX) : 
        if ($rowNSX['nsx_ma'] == $sanpham['nsx_ma']){ ?> 
        <option value="<?php echo $rowNSX['nsx_ma']; ?>" selected><?php echo $rowNSX['nsx_ten']; ?></option><br>
        <?php
        } else
        ?>
        <option value="<?php echo $rowNSX['nsx_ma']; ?>" ><?php echo $rowNSX['nsx_ten']; ?></option><br>
        <?php 
     endforeach; 
     ?>
    </select> <br>
    <input type="submit" name="btnSua" value="Lưu">
</form>

<?php
    if (isset($_POST['btnSua'])){
        $sp_ten = $_POST['sp_ten'];
        $sp_gia = $_POST['sp_gia'];
        $sp_giacu = $_POST['sp_giacu'];
        $sp_ngacapnhat = $_POST['sp_ngaycapnhat'];
        $sp_soluong = $_POST['sp_soluong'];
        $lsp_ma = $_POST['lsp_ma'];
        $nsx_ma = $_POST['nsx_ma'];

        $sqlUpdate = "UPDATE sanpham SET sp_ten=N'$sp_ten' ,sp_gia=$sp_gia ,sp_giacu=$sp_giacu,sp_ngaycapnhat= $sp_ngacapnhat,sp_soluong=$sp_soluong, lsp_ma=$lsp_ma,nsx_ma=$nsx_ma WHERE sp_ma= $sp_ma;";
        $rs = mysqli_query($conn, $sqlUpdate);
        echo "Lưu thành công !";

        header('location:displaysp.php');
    }
?>

