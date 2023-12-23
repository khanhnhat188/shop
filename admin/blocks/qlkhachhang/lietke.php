<?php
    $sql_lietke = "SELECT * FROM dangky ORDER BY id_dangky DESC";
    $query_lietke = mysqli_query($conn, $sql_lietke);
?>
<p class="lk">Khách Hàng</p>

<table id="table">
  <tr>
    <th width="7%">Thứ tự</th>
    <th>Tên khách hàng</th>
    <th>Email</th>
    <th>Điện thoại</th>
    <th>Địa chỉ</th>
  </tr>
<?php
$i = 0;
while($row = mysqli_fetch_array($query_lietke)){
    $i++;
?>
  <tr>
    <td> <?php echo $i ?></td>
    <td><?php echo $row['tenkhachhang'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['dienthoai'] ?></td>
    <td><?php echo $row['diachi'] ?></td>
  </tr>
<?php
}
?>
</table> 

