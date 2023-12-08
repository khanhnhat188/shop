<?php
  session_start();
?>
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 150px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shopping Cart</p>
        </div>
    </div>
</div>
<!-- Page Header End -->
<div class="container-fluid">
<p class="m-2"><?php if (isset($_SESSION['dangky'])) {
    echo "Xin chào ".$_SESSION['dangky'];
} ?></p>
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng cộng</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php
                     $tongtien = 0; // Khởi tạo biến tổng tiền
                     if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                         $i = 0;
                         foreach ($_SESSION['cart'] as $cart_item) {
                             $thanhtien = $cart_item['soluong'] * $cart_item['giasp'];
                             $tongtien += $thanhtien;
                             $i++;
                        ?>
                    <tr>
                        <td class="align-middle">
                            <?php echo $cart_item['tensanpham']; ?>
                        </td>
                        <td class="align-middle">
                            <img src="<?php echo $cart_item['hinhanh']; ?>" alt="" style="width: 50px;">
                        </td>
                        <td class="align-middle"><?php echo number_format($cart_item['giasp']); ?></td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <div class="input-group-btn">
                                    <a href="main/themgiohang.php?tru=<?php echo $cart_item['id']; ?>"
                                        class="btn btn-sm btn-primary btn-minus"><i class="fa fa-minus"></i></a>
                                </div>
                                <input type="text" class="form-control form-control-sm bg-secondary text-center"
                                    value="<?php echo $cart_item['soluong']; ?>">
                                <div class="input-group-btn">
                                    <a href="main/themgiohang.php?cong=<?php echo $cart_item['id']; ?>"
                                        class="btn btn-sm btn-primary btn-plus"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle"><?php echo number_format($thanhtien); ?></td>
                        <td class="align-middle"><a href="main/themgiohang.php?xoa=<?php echo $cart_item['id']; ?>"
                                class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a></td>
                    </tr>
                    <?php
                            }
                        }
                        ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <!-- Kiểm tra nếu có sản phẩm trong giỏ hàng thì hiển thị summary, ngược lại hiển thị 0 -->
            <?php if (!empty($_SESSION['cart'])) : ?>
            <form class="mb-5" action="">
                <div class="input-group">
                    <input type="text" class="form-control p-4" placeholder="Mã giảm giá">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Áp dụng</button>
                    </div>
                </div>
            </form>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Thông tin</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Tổng cộng</h6>
                        <h6 class="font-weight-medium"><?php echo number_format($tongtien); ?></h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Phí vận chuyển</h6>
                        <h6 class="font-weight-medium"><?php ?></h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold"><?php echo number_format($tongtien); ?></h5>
                    </div>
                    <?php
                        if (isset($_SESSION['dangky'])) {
                    ?>
                    <button class="btn btn-block btn-primary my-3 py-3">Thanh toán</button>
                    <?php
                        }else {
                    ?>
                    <a href="./index.php?quanly=dangky">Đăng ký để thanh toán</a>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <?php else : ?>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Thông tin</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Tổng cộng</h6>
                        <h6 class="font-weight-medium">0.00</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Phí vận chuyển</h6>
                        <h6 class="font-weight-medium">0.00</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold">0.00</h5>
                    </div>
                    <button class="btn btn-block btn-primary my-3 py-3" disabled>Thanh toán</button>
                </div>
            </div>
            <?php endif; ?>
            <!-- Kết thúc kiểm tra -->

        </div>
    </div>
</div>
<!-- Cart End -->