<?php
if (isset($_GET['trang'])) {
    $page = $_GET['trang'];
} else {
    $page = 1;
}

if ($page == '' || $page == 1) {
    $begin = 0;
} else {
    $begin = ($page * 8) - 8;
}

// Lấy id từ tham số id trong URL
$id_danhmuc = (isset($_GET['id'])) ? mysqli_real_escape_string($conn, $_GET['id']) : '';

$sql_product = "SELECT * FROM sanpham WHERE sanpham.id_danhmuc='$id_danhmuc' AND tinhtrang='1' ORDER BY id_sanpham DESC LIMIT $begin, 8";
$query_product = mysqli_query($conn, $sql_product);

$sql_cate = "SELECT * FROM danhmuc WHERE danhmuc.id_danhmuc='$id_danhmuc' LIMIT 1";
$query_cate = mysqli_query($conn, $sql_cate);
$row_title = mysqli_fetch_array($query_cate);
?>


<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2"><?php echo $row_title['tendanhmuc'] ?></span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        <?php
            while ($row = mysqli_fetch_array($query_product)) {
        ?>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div
                    class="card-header product-img position-relative overflow-hidden bg-transparent border text-center p-0">
                    <img class="img-thumbnail" style="width: 264px; height: 264px;"
                        src="<?php echo $row['hinhanh'] ?>" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3" style="word-wrap: break-word;">
                        <?php echo number_format($row['giasp'],0,',','.').'đ'; ?>
                    </h6>
                    <div class="d-flex justify-content-center">
                        <h6><?php echo $row['tensanpham']; ?></h6>
                    </div>
                </div>

                <div class="card-footer justify-content-between bg-light border text-center">
                    <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham']; ?>"
                        class="btn btn-sm text-dark p-0">
                        <i class="fas fa-eye text-primary mr-1"></i>View Detail
                    </a>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>
<!-- Products End -->

 <!--    Phân trang -->

<!-- Phân trang -->
<div style="clear:both;"></div>
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <?php
        $sql_trang = mysqli_query($conn, "SELECT * FROM sanpham WHERE sanpham.id_danhmuc='$id_danhmuc'");
        $row_count = mysqli_num_rows($sql_trang);
        $trang = ceil($row_count / 8);

        for ($i = 1; $i <= $trang; $i++) {
            $active_class = ($i == $page) ? 'active' : '';
            echo "<li class='page-item $active_class'><a class='page-link' href='index.php?quanly=dmsanpham&id=$id_danhmuc&trang=$i'>$i</a></li>";
        }
        ?>
    </ul>
</nav>
