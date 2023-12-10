<?php
    // Đảm bảo kết nối được thiết lập trước khi sử dụng
    include '../../connect/conn.php';

    if(isset($_GET['code'])){
        // Lấy mã đơn hàng từ tham số truyền vào
        $code = $_GET['code'];

        // Cập nhật trạng thái của đơn hàng thành 'Chưa xử lý'
        $sql_update = "UPDATE donhang SET trangthai = 0 WHERE madonhang = '$code'";
        $result_update = mysqli_query($conn, $sql_update);

        // Kiểm tra xem cập nhật thành công hay không trước khi chuyển hướng
        if ($result_update) {
            // Chuyển hướng người dùng đến trang liệt kê đơn hàng
            header('Location: ../../index.php?action=qldonhang&query=lietke');
        } else {
            // Xử lý lỗi nếu cập nhật không thành công
            echo 'Có lỗi xảy ra khi cập nhật trạng thái đơn hàng.';
        }
    }
?>
