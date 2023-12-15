<?php
    $code = $_GET['code'];
    $sql_lietke = "SELECT * FROM chitiethoadon, sanpham WHERE chitiethoadon.id_sanpham = sanpham.id_sanpham AND chitiethoadon.madonhang = '$code'
    ORDER BY chitiethoadon.id_chitiet ASC";
    $query_lietke = mysqli_query($conn, $sql_lietke);
?>
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 100px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Lịch sử đơn hàng</h1>
    </div>
</div>

<!-- Page Header End -->
<div class="container-fluid">
    </p>
    <div class="row px-xl-12">
        <div class="col-lg-12 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>ID</th>
                        <th>Mã đơn</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Thành tiền</th>
                    </tr>
                    <?php
                           $i = 0;
                           $tongtien = 0;
                           while($row = mysqli_fetch_array($query_lietke)){
                               $i++;
                               $thanhtien = $row['soluongmua']*$row['giasp'];
                               $tongtien += $thanhtien;
                        
                    ?>
                    <tr>
                        <td> <?php echo $i ?></td>
                        <td><?php echo $row['madonhang'] ?></td>
                        <td><?php echo $row['tensanpham'] ?></td>
                        <td><?php echo $row['soluongmua'] ?></td>
                        <td><?php echo $row['giasp'] ?></td>
                        <td><?php echo $thanhtien ?></td>
                        <?php
                        }
                        ?>

                </thead>
                <tr>
                    <td colspan="5" align="right">Tổng tiền</td>
                    <td><?php echo $thanhtien ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
</div>

<!-- Cart End -->