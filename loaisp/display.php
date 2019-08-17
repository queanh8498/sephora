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

    require_once __DIR__ . "/../dbconnect.php";
    mysqli_set_charset($conn,"utf-8");

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
        'lsp_mota' => $row['lsp_mota'],
        
    );
}
    //print_r($data); 
    //die;
?>

<table class="table table-bodered table-hover">
<tr>
    <th>Mã </th>
    <th>Tên LSP</th>
    <th>Mô tả</th>
    <th>Chức năng</th>
    
</tr>
    <?php foreach ($data as $row) : ?>
    <tr>
        <td><?php echo $row['lsp_ma'];?></td>
        <td><?php echo $row['lsp_ten'];?></td>
        <td><?php echo $row['lsp_mota'];?></td>
        
        <td><a class="btn btn-primary" href="/sephora/loaisp/edit.php?lsp_ma=<?php $row['lsp_ma']; ?>">Sửa</a>
        <a class="btn btn-danger" href="/sephora/loaisp/delete.php?sp_ma=<?php $row['lsp_ma']; ?>">Xóa</a></td>
        
    </tr>
<?php endforeach; ?>

</table>
<br>
    <a href="?page=loaisp_them" class="btn btn-info">Thêm mới</a>
<br>
</body>
</html>

