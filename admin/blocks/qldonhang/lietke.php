<?php
    $sql_lietke = "SELECT * FROM donhang, dangky WHERE donhang.id_dangky = dangky.id_dangky ORDER BY dangky.id_dangky ASC";
    $query_lietke = mysqli_query($conn, $sql_lietke);
?>
<p class="lk">Đơn hàng</p>

<table id="table">
  <tr>
    <th width="7%">ID</th>
    <th>Mã đơn</th>
    <th>Tên khách hàng</th>
    <th>Địa chỉ</th>
    <th>Số điện thoại</th>
    <th>Email</th>
    <th>Hình thức thanh toán</th>
    <th>Trạng thái</th>
    <th>Ngày đặt</th>
    <th>Quản lý</th>
  </tr>
<?php
$i = 0;
while($row = mysqli_fetch_array($query_lietke)){
    $i++;
?>
  <tr>
    <td> <?php echo $i ?></td>
    <td><?php echo $row['madonhang'] ?></td>
    <td><?php echo $row['tenkhachhang'] ?></td>
    <td><?php echo $row['diachi'] ?></td>
    <td><?php echo $row['dienthoai'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['hinhthucthanhtoan'] ?></td>
    <td>
        <?php
            if($row['trangthai'] == 1){
                echo '<a href="blocks/qldonhang/xyly.php?&code='.$row['madonhang'].'">Chưa xử lý</a>';
            }else{
                echo 'Đã xử lý';
            }
        ?>
    </td>
    <td><?php echo $row['ngaydat'] ?></td>
    <td>
        <a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['madonhang'] ?>">Xem</a>
    </td>
<?php
}
?>
</table> 

