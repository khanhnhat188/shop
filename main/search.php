<?php
    if(isset($_POST['timkiem'])){
        $tukhoa=$_POST['tukhoa'];
    }
    $sql_product = "SELECT * FROM sanpham where sanpham.tensanpham like '%".$tukhoa."%'";
    $query_product = mysqli_query($conn, $sql_product);
    
?>
<!-- Hiển thị sản phẩm tìm kiếm -->
<h3>Tìm kiếm: <?php echo $_POST['tukhoa'] ?> </h3>
    <ul class="product_list">
        <?php
            while ($row = mysqli_fetch_array($query_product)) {
        ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                <img src="admin/blocks/qlsanpham/img/<?php echo $row['hinhanh'] ?>">
                <p class="title_prouduct"><?php echo $row['tensanpham'] ?></p>
                <p class="price_product">Giá: <?php echo number_format($row['giasp'],0,',','.'). 'VND'?></p>
            </a>
        </li>
        <?php
            }
        ?>
    </ul>