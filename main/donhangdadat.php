<p>Đơn hàng </p>
<?php
if (isset($_SESSION['dangky'])) {
    $id_dangky = $_SESSION['id_dangky'];
    

    // Chạy câu truy vấn SQL
    $sql_khachhang = "SELECT * FROM dangky WHERE id_dangky = ?";
    $stmt = $conn->prepare($sql_khachhang);
    $stmt->bind_param("i", $id_dangky);
    $stmt->execute();

    // Lấy kết quả
    $result = $stmt->get_result();
    
    // Kiểm tra xem có dữ liệu hay không
    if ($result->num_rows > 0) {
        // Lấy dữ liệu từ kết quả
        $row_khachhang = $result->fetch_assoc();

        // In thông tin hoặc sử dụng thông tin theo nhu cầu của bạn
        echo "Họ và tên: " . $row_khachhang['tenkhachhang'];
        echo "Email: " . $row_khachhang['email'];
        echo "Điện thoại: " . $row_khachhang['dienthoai'];
        echo "Địa chỉ: " . $row_khachhang['diachi'];

        // Thêm các trường khác tương tự...
    } else {
        echo "Không có dữ liệu cho id_dangky = $id_dangky";
    }

}

?>