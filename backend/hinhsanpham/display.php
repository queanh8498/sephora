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
    SELECT sp.sp_ma,sp.sp_ten, sp.sp_gia, hsp.hsp_ma, hsp.hsp_tentaptin
    FROM hinhsanpham hsp
    JOIN sanpham sp ON hsp.sp_ma=sp.sp_ma;
EOT;

    $rs = mysqli_query($conn, $sql);

    $data = [];
    while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
        $data[] = array(
        'hsp_ma' => $row['hsp_ma'],
        'sp_ten' => $row['sp_ten'],
        'sp_gia' => $row['sp_gia'],
        'hsp_tentaptin' => $row['hsp_tentaptin'],
    );
}
    //print_r($data); 
    //die;
?>
<br>

<table class="table table-bodered table-hover">
<tr>
    <th>Mã hình</th>
    <th>Tên SP</th>
    <th>Gía</th>
    <th>Hình SP </th>
    <th>Chức năng</th>
    
</tr>
    <?php foreach ($data as $rowSP) : ?>
    <tr>
        <td><?php echo $rowSP['hsp_ma'];?></td>
        <td><?php echo $rowSP['sp_ten'];?></td>
        <td><?php echo $rowSP['sp_gia'];?></td>
        
        <td>
        <img src="/sephora/uploads/<?= $rowSP['hsp_tentaptin']; ?>" class="img-thumbnail">
        </td>

        
        <td><a class="btn btn-primary" href="/sephora/hinhsanpham/edit.php?hsp_ma=<?php $rowSP['hsp_ma']; ?>">Sửa</a>
        <button class="btn btn-danger btn-delete" data-hsp-ma="<?php echo $rowSP['hsp_ma']; ?>">XÓA</button>       
        </td> 
    </tr>
<?php endforeach; ?>
</table>

<a href="/sephora/backend/index.php?page=hinhsp_them" class="btn btn-primary">
    <i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm Hình SẢN PHẨM 
</a> 
</body>
</html>
