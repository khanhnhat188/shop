<?php
    $sql_ct = "SELECT * FROM sanpham, danhmuc where sanpham.id_danhmuc=danhmuc.id_danhmuc AND sanpham.id_sanpham='$_GET[id]' LIMIT 1";
    $query_ct = mysqli_query($conn, $sql_ct);
    while($row_ct = mysqli_fetch_array($query_ct)){
?>
<!--Hiển thị chi tiết sản phẩm -->

<body>
    <form method="POST" action="main/themgiohang.php?idsanpham=<?php echo $row_ct['id_sanpham'] ?>">
        <div class="container-fluid py-5">
            <div class="row px-xl-5">
                <div class="col-lg-5 pb-5">
                    <div id="product-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner border">
                            <img class="" style="width: 500px; height: 500px;" src="<?php echo $row_ct['hinhanh']; ?>"
                                alt="Product Image">
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 pb-5">
                    <h3 class="font-weight-semi-bold"><?php echo $row_ct['tensanpham']; ?></h3>
                    <h3 class="font-weight-semi-bold mb-4"><?php echo number_format($row_ct['giasp'],0,',','.').'đ';?></h3>
                    <p class="mb-4"><?php echo $row_ct['tomtat']; ?></p>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <button class="them" name="themgiohang" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add
                            To Cart</button>
                    </div>
                </div>
            </div>
            <div class="row px-xl-5">
                <div class="col">
                    <div class="nav nav-tabs border-secondary mb-4">
                        <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Thông tin sản phẩm</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <?php echo $row_ct['noidung']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php
}
?>

</body>
<!-- Shop Detail End -->

<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

<!-- Phần giao diện sản phẩm -->