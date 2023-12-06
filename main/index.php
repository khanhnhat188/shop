<?php
if(isset($_GET['trang'])){
    $page = $_GET['trang'];
}else{
    $page = '';
}
if($page == '' || $page == '1'){
    $begin = 0;
}else{
    $begin = ($page * 8) - 8;
}
?>
<?php
    $sql_product = "SELECT * FROM sanpham, danhmuc where sanpham.id_danhmuc=danhmuc.id_danhmuc AND tinhtrang='1'  ORDER BY sanpham.id_sanpham DESC limit $begin, 8";
    $query_product = mysqli_query($conn, $sql_product);
    
?>

<!-- Featured Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
            </div>
        </div>
    </div>
</div>
<!-- Featured End -->

<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h1 class="section-title px-5"><span class="px-2">Sản phẩm mới nhất</span></h1>
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

 <?php
    $sql_trang = mysqli_query($conn,"SELECT * FROM sanpham");
    $row_count = mysqli_num_rows($sql_trang);
    $trang = ceil($row_count/8);
 ?>
<!-- Phân trang -->
<div style="clear:both;"></div>
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <?php
        for ($i = 1; $i <= $trang; $i++) {
            $active_class = ($i == $page) ? 'active' : '';
            echo "<li class='page-item $active_class'><a class='page-link' href='index.php?trang=$i'>$i</a></li>";
        }
        ?>
    </ul>
</nav>
