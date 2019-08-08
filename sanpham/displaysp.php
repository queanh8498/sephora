day la display san pham 
<?php 
    require_once __DIR__ . "/../dbconnect.php";
    //HERE DOCS
    $sql = <<<EOT
    SELECT sp.sp_ma,sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_soluong, lsp.lsp_ten, nsx.nsx_ten, km.km_ten
    FROM sanpham sp
    JOIN loaisanpham lsp ON sp.lsp_ma=lsp.lsp_ma
    JOIN nhasanxuat nsx ON sp.nsx_ma=nsx.nsx_ma
    LEFT JOIN khuyenmai km ON km.km_ma=sp.km_ma ;    
    
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
        'km_ten' => $row['km_ten'],
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
    <th>Gía cu</th>
    <th>Số lượng </th>
    <th>Ten LSP</th>
    <th>NSX</th>
    <th>KHUYEN MAI</th>
    
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
        <td><?php echo $row['km_ten'];?></td>
        
        <!--<td><a href="/sephora/sanpham/updatesp.php?sp_ma=<?php $row['sp_ma']; ?>">Sửa</a></td>
        <td><a href="/sephora/sanpham/deletesp.php?sp_ma=<?php $row['sp_ma']; ?>">Xóa</a></td>-->
        
    </tr>
<?php endforeach; ?>

</table>
