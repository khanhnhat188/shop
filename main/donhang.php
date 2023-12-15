<?php
    $id_dangky = $_SESSION['id_dangky'];
    $sql_lietke = "SELECT * FROM donhang, dangky WHERE donhang.id_dangky = dangky.id_dangky AND donhang.id_dangky = '$id_dangky' ORDER BY donhang.madonhang DESC";
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
                        <th width="7%">ID</th>
                        <th>Mã đơn</th>
                        <th>Tên khách hàng</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Trạng thái</th>
                        <th>Ngày đặt</th>
                        <th>Hình thức thanh toán</th>
                        <th>Quản lý</th>
                    </tr>
                    <?php
                        $i = 0;
                        while($row = mysqli_fetch_array($query_lietke)){
                            $i++;
                    ?>
                    <tr>
                        <td> <?php echo $i ?></td>
                        <td><?php echo $row['madonhang'] ?></td>
                        <td><?php echo $row['tenkhachhang'] ?></td>
                        <td><?php echo $row['diachi'] ?></td>
                        <td><?php echo $row['dienthoai'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        
                        <td>
                            <?php
                                if($row['trangthai'] == 1){
                                    echo 'Chưa xử lý';
                                }else{
                                    echo 'Đã xử lý';
                                }
                            ?>
                        <td><?php echo $row['ngaydat'] ?></td>
                        <th><?php echo $row['hinhthucthanhtoan'] ?></th>
                        <td>
                            <a href="index.php?quanly=xemdonhang&code=<?php echo $row['madonhang'] ?>">Xem</a>
                        </td>
                        <?php
                        }
                        ?>

                </thead>
                <tbody class="align-middle">

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<!-- Cart End -->