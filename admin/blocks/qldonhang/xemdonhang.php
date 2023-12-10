<?php
    $code = $_GET['code'];
    $sql_lietke = "SELECT * FROM chitiethoadon, sanpham WHERE chitiethoadon.id_sanpham = sanpham.id_sanpham AND chitiethoadon.madonhang = '$code'
    ORDER BY chitiethoadon.id_chitiet ASC";
    $query_lietke = mysqli_query($conn, $sql_lietke);
?>
<p class="lk"> Xem Đơn hàng</p>

<table id="table">
    <tr>
        <th width="7%">ID</th>
        <th>Mã đơn</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Giá</th>
        <th>Thành tiền</th>
    </tr>
    <?php
$i = 0;
$tongtien = 0;
while($row = mysqli_fetch_array($query_lietke)){
    $i++;
    $thanhtien = $row['soluongmua']*$row['giasp'];
    $tongtien += $thanhtien;
?>
    <tr>
        <td> <?php echo $i ?></td>
        <td><?php echo $row['madonhang'] ?></td>
        <td><?php echo $row['tensanpham'] ?></td>
        <td><?php echo $row['soluongmua'] ?></td>
        <td><?php echo $row['giasp'] ?></td>
        <td><?php echo $thanhtien ?></td>
    </tr>
    <tr>
        <td colspan="5" align="right">Tổng tiền</td>
        <td><?php echo $thanhtien ?></td>
    </tr>
<?php
}
?>
</table>