<?php
    if(isset($_POST['timkiem'])){
        $tukhoa=$_POST['tukhoa'];
    }
    $sql_product = "SELECT * FROM sanpham where sanpham.tensanpham like '%".$tukhoa."%'";
    $query_product = mysqli_query($conn, $sql_product);
    
?>

<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2"><?php echo $_POST['tukhoa'] ?></span></h2>
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

