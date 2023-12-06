<?php
  session_start();
?>
<h4>Giỏ hàng</h4>
<table id="table">
  <tr>
    <th>ID</th>
    <th>Mã SP</th>
    <th>Tên sản phẩm</th>
    <th>Hình ảnh</th>
    <th>Số lượng</th>
    <th>Giá sản phẩm</th>
    <th>Thành tiền</th>
    <th>Quản lý</th>
  </tr>
<?php
  if (isset($_SESSION['cart'])) {
      $i=0;
      $tongtien=0;
      foreach ($_SESSION['cart'] as $cart_item) {
        $thanhtien=$cart_item['soluong']*$cart_item['giasp'];
        $tongtien+=$thanhtien;
        $i++;
?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $cart_item['masp']; ?></td>
    <td><?php echo $cart_item['tensanpham']; ?></td>
    <td><img width="150px" src=<?php echo $cart_item['hinhanh']; ?>></td>
    <td>
      <a href="main/themgiohang.php?cong=<?php echo $cart_item['id']; ?>"><i class="fa-solid fa-plus"></i></a>
      <span class="soluong"><?php echo $cart_item['soluong']; ?></span>
      <a href="main/themgiohang.php?tru=<?php echo $cart_item['id']; ?>"><i class="fa-solid fa-minus"></i></a>
    </td>
    <td><?php echo number_format($cart_item['giasp'],0,',','.').'đ'; ?></td>
    <td><?php echo number_format($thanhtien,0,',','.').'đ' ?></td>
    <td><a href="main/themgiohang.php?xoa=<?php echo $cart_item['id']; ?>">Xóa</a></td>
  </tr>
  
<?php
        }
?>
    <tr>
        <td colspan="8">
            <p style="float: left;">Tổng tiền <?php echo number_format($tongtien,0,',','.').'đ' ?></p>
            <p style="float: right;"><a href="main/themgiohang.php?xoatatca=1">Xóa tất cả </a></p>
        </td>
    </tr>
<?php
    }else{
?>

  <tr>
    <td colspan="8"><p>Hiện tại giỏ hàng trống</p></td>
  </tr>

<?php
    } 
?>
</table>