<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php 

    require_once __DIR__ . "/../../dbconnect.php";
    mysqli_set_charset($conn,"utf-8");

    //HERE DOCS
    $sql = <<<EOT
    SELECT sp.sp_ma,sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_soluong, lsp.lsp_ten, nsx.nsx_ten
    FROM sanpham sp
    JOIN loaisanpham lsp ON sp.lsp_ma=lsp.lsp_ma
    LEFT JOIN nhasanxuat nsx ON sp.nsx_ma=nsx.nsx_ma;
 
EOT;

    $rs = mysqli_query($conn, $sql);

    $data = [];
    while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
        $data[] = array(
        'sp_ma' => $row['sp_ma'],
        'sp_ten' => $row['sp_ten'],
        'sp_gia' => $row['sp_gia'],
        'sp_giacu' => $row['sp_giacu'],
        'sp_soluong' => $row['sp_soluong'],
        'lsp_ten' => $row['lsp_ten'],
        'nsx_ten' => $row['nsx_ten'],
    );
}
    //print_r($data); 
    //die;
?>
<br>
<a href="?page=sanpham_them" class="btn btn-info">Thêm mới</a>
<table class="table table-bodered table-hover">
<tr>
    <th>Mã </th>
    <th>Tên SP</th>
    <th>Gía</th>
    <th>Gía cu</th>
    <th>Số lượng </th>
    <th>Ten LSP</th>
    <th>NSX</th>
    
</tr>
    <?php foreach ($data as $row) : ?>
    <tr>
        <td><?php echo $row['sp_ma'];?></td>
        <td><?php echo $row['sp_ten'];?></td>
        <td><?php echo $row['sp_gia'];?></td>
        <td><?php echo $row['sp_giacu'];?></td>
        <td><?php echo $row['sp_soluong'];?></td>
        <td><?php echo $row['lsp_ten'];?></td>
        <td><?php echo $row['nsx_ten'];?></td>
        
        <td><a class="btn btn-primary" href="/sephora/backend/?page=sanpham_sua&sp_ma=<?php echo $row['sp_ma']; ?>">Sửa</a>
        <button class="btn btn-danger btn-delete" data-sp-ma="<?php echo $row['sp_ma']; ?>">XÓA</button>        
    </tr>
<?php endforeach; ?>

</table>

</body>
</html>

