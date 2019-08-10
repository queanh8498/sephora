<?php 

require_once __DIR__ . "/../dbconnect.php";

    //HERE DOCS
    $sql = <<<EOT
    SELECT * FROM loaisanpham;
EOT;

$rs = mysqli_query($conn, $sql);

$data = [];
while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
    $data[] = array(
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


//print_r($data); 
//die;
?>



<form name="frmInsertSP" id="frmInsertSP" method="post" action="">
    Ten SP: <input type="text" name="sp_ten" id="sp_ten" > <br>
    Gia SP<input type="text" name="sp_gia" id="sp_gia" > <br>
    Gia cu SP: <input type="text" name="sp_giacu" id="sp_giacu" > <br>
    Ngay cap nhat: <input type="text" name="sp_ngaycapnhat" id="sp_ngaycapnhat" > <br>
    So luong: <input type="text" name="sp_soluong" id="sp_soluong" > <br>
    Loai SP: 
    <select name="lsp_ten" id="lsp_ten"> 
    <?php foreach ($data as $row) : ?> 
        <option value="<?php echo $row['lsp_ma']; ?>"><?php echo $row['lsp_ten']; ?></option><br>
    <?php endforeach; ?>
    </select>

    NSX: <select name="nsx_ten" id="nsx_ten"> 
    <?php foreach ($dataNSX as $rowNSX) : ?> 
        <option value="<?php echo $rowNSX['nsx_ma']; ?>"><?php echo $rowNSX['nsx_ten']; ?></option><br>
    <?php endforeach; ?>
    </select>
    Khuyen mai: <br>
    <input type="submit" name="submitSave" id="submitSave" value="SAVE">

</form>