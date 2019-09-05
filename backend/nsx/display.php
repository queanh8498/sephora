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
    SELECT * FROM nhasanxuat;
 
EOT;

    $rs = mysqli_query($conn, $sql);

    $data = [];
    while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
        $data[] = array(
        'nsx_ma' => $row['nsx_ma'],
        'nsx_ten' => $row['nsx_ten'],
    );
}
    //print_r($data); 
    //die;
?>
<br>
<a href="?page=nsx_them" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a>
<table class="table table-bodered table-hover">
<tr>
    <th>Mã </th>
    <th>Tên NSX</th>
    <th>Chức năng</th>
</tr>
    <?php foreach ($data as $row) : ?>
    <tr>
        <td><?php echo $row['nsx_ma'];?></td>
        <td><?php echo $row['nsx_ten'];?></td>
        
        <td><a class="btn btn-primary" href="/sephora/nsx/edit.php?lsp_ma=<?php $row['nsx_ma']; ?>">Sửa</a>
        <button class="btn btn-danger btn-delete" data-nsx-ma="<?php echo $row['nsx_ma']; ?>">XÓA</button> 
        
    </tr>
<?php endforeach; ?>

</table>

</body>
</html>

