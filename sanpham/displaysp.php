day la display san pham 
<?php 
    require_once __DIR__ . "/../dbconnect.php";
    $sql = "select * from `sanpham`;";
    $rs = mysqli_query($conn, $sql);

    $data = [];
    while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
        $data[] = array(
        'sp_id' => $row['sp_id'],
        'sp_ten' => $row['sp_ten'],
        'sp_gia' => $row['sp_gia'],
        'sp_ngaycapnhat' => $row['sp_ngaycapnhat'],
        'sp_soluong' => $row['sp_soluong'],
    );
}
    //print_r($data);
    //die;
?>

<table border=1>
<tr>
    <th>Mã </th>
    <th>Tên SP</th>
    <th>Gía</th>
    <th>Ngày cập nhật</th>
    <th>Số lượng </th>
</tr>
    <?php foreach ($data as $row) : ?>
    <tr>
        <td><?php echo $row['sp_id'];?></td>
        <td><?php echo $row['sp_ten'];?></td>
        <td><?php echo $row['sp_gia'];?></td>
        <td><?php echo $row['sp_ngaycapnhat'];?></td>
        <td><?php echo $row['sp_soluong'];?></td>
    </tr>
<?php endforeach; ?>
    
</table>
