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
<div class="container-fluid mb-5">
    <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="height: 410px;">
                <img class="img-fluid"
                    src="https://salt.tikicdn.com/ts/tka/21/fc/3b/0952d26f198a46d3e4c8051527917725.png" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 700px;">
                        <!-- <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4> -->
                        <!--                         <h3 class="display-4 text-white font-weight-semi-bold mb-4">Nước Hoa</h3>
                        <a href="index.php?quanly=dmsanpham&id=3" class="btn btn-light py-2 px-3">Mua ngay</a> -->
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="height: 410px;">
                <img class="img-fluid"
                    src="https://salt.tikicdn.com/ts/tka/b5/a9/70/3f1f7a345bcd0105ef9841a149c0d344.png" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 700px;">
                        <!--                         <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                        <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                        <a href="" class="btn btn-light py-2 px-3">Shop Now</a> -->
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-prev-icon mb-n2"></span>
            </div>
        </a>
        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-next-icon mb-n2"></span>
            </div>
        </a>
    </div>
</div>

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
    <div class="row px-xl-5 pb-3">
        <?php
            while ($row = mysqli_fetch_array($query_product)) {
        ?>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div
                    class="card-header product-img position-relative overflow-hidden bg-transparent border text-center p-0">
                    <img class="img-thumbnail" style="width: 264px; height: 264px;" src="<?php echo $row['hinhanh'] ?>"
                        alt="">
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
<div id="sub-banner" class="row m-2">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
        <div class="sub-banner">
            <a href="https://hasaki.vn/thuong-hieu/unilever.html?utm_medium=banner&amp;utm_source=website&amp;utm_campaign=unilever-khuyen-mai-hot&amp;utm_term=unilever-khuyen-mai-hot_06102023"
                target="_blank" rel="sponsored">
                <img src="https://media.hcdn.vn/hsk/1696582256unilever-sub-banner-desktop-427x140.jpg" alt=""
                    class="sub-banner_img loading" data-was-processed="true">
            </a>

        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
        <div class="sub-banner">
            <a href="https://hasaki.vn/thuong-hieu/rohto.html?utm_medium=banner&amp;utm_source=website&amp;utm_campaign=rohto&amp;utm_term=rohto_27092023"
                target="_parent" rel="sponsored">
                <img src="https://media.hcdn.vn/hsk/1687766948rohto-427x140.jpg" alt="" class="sub-banner_img loading"
                    data-was-processed="true">
            </a>

        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
        <div class="sub-banner">
            <a href="https://hasaki.vn/thuong-hieu/l-oreal-cpd.html?utm_medium=banner&amp;utm_source=website&amp;utm_campaign=loreal-sale-dam-sau&amp;utm_term=loreal-sale-dam-sau_27092023"
                target="_blank" rel="sponsored">
                <img src="https://media.hcdn.vn/hsk/1695882634l-oreal-cpd-427x140.jpg" alt=""
                    class="sub-banner_img loading" data-was-processed="true">
            </a>

        </div>
    </div>
</div>

<!--    Phân trang -->

<?php
    $sql_trang = mysqli_query($conn,"SELECT * FROM sanpham");
    $row_count = mysqli_num_rows($sql_trang);
    $trang = ceil($row_count/8);
 ?>
<!-- Phân trang -->
<!-- <div style="clear:both;"></div>
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <?php
        for ($i = 1; $i <= $trang; $i++) {
            $active_class = ($i == $page) ? 'active' : '';
            echo "<li class='page-item $active_class'><a class='page-link' href='index.php?trang=$i'>$i</a></li>";
        }
        ?>
    </ul>
</nav> -->