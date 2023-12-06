<?php
    $sql_danhmuc = "SELECT * FROM danhmuc ORDER BY tendanhmuc DESC";
    $query_danhmuc = mysqli_query($conn, $sql_danhmuc);  
?>

<div class="menu">
    <ul class="list_menu">
        <li><a class="one" href="index.php">Trang chủ</a></li>
        <?php
            while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
        ?>
        <li><a class="one" href="index.php?quanly=dmsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
        <?php
            }
        ?>
        <li><a class="one" href="index.php?quanly=giohang">Giỏ hàng</a></li>
        <li><a class="one" href="admin/login.php">Đăng nhập</a></li>
    </ul>
    <div class="topnav">
        <div class="search-container">
            <form method="POST" action="index.php?quanly=timkiem">
            <input type="text" placeholder="Tìm kiếm.." name="tukhoa">
            <button type="submit" name="timkiem"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
</div>

