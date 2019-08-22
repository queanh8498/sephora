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
    SELECT sp.sp_ma,sp.sp_ten, sp.sp_gia, hsp.hsp_tentaptin
    FROM sanpham sp
    JOIN hinhsanpham hsp ON hsp.sp_ma=sp.sp_ma;
EOT;

    $rs = mysqli_query($conn, $sql);

    $data = [];
    while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
        $data[] = array(
        'sp_ma' => $row['sp_ma'],
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
    <th>Mã </th>
    <th>Tên SP</th>
    <th>Gía</th>
    <th>Hình SP </th>
    <th>Chức năng</th>
    
</tr>
    <?php foreach ($data as $row) : ?>
    <tr>
        <td><?php echo $row['sp_ma'];?></td>
        <td><?php echo $row['sp_ten'];?></td>
        <td><?php echo $row['sp_gia'];?></td>
        <td>
        <img src="/sephora/public/uploadfile/<?= $row['hsp_tentaptin']; ?>">
        </td>
        
        <td><a class="btn btn-primary" href="/sephora/hinhsanpham/edit.php?sp_ma=<?php $row['sp_ma']; ?>">Sửa</a>
        <button class="btn btn-danger btn-delete" data-sp-ma="<?php echo $row['sp_ma']; ?>">XÓA</button>        
    </tr>
<?php endforeach; ?>

</table>

</body>
</html>

