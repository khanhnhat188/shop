<?php
    session_start();
    include('../admin/connect/conn.php');
    require('../mail/sendmail.php');
    require('../admin/carbon/vendor/autoload.php');
    require_once('config_vnpay.php');
    use Carbon\Carbon;

    $now = Carbon::now('Asia/Ho_Chi_Minh');
    $id_dangky = $_SESSION['id_dangky'];
    $mahoadon = str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
    // Lấy giá trị hình thức thanh toán từ $_POST
    if(isset($_POST['payment'])) {
        $hinhthucthanhtoan = $_POST['payment'];
    } else {
        // Xử lý nếu không có giá trị được chọn (mặc định hoặc xử lý khác tùy thuộc vào yêu cầu của bạn)
        $hinhthucthanhtoan = 'Không xác định';
    }
    $tongtien = 0; // Khởi tạo biến tổng tiền
    foreach ($_SESSION['cart'] as $value) {
            $thanhtien = $value['soluong'] * $value['giasp'];
            $tongtien += $thanhtien;
    }

    if($hinhthucthanhtoan == 'cash'){    
    // Thực hiện lưu đơn hàng vào CSDL, bảng donhang
    $insert_hoadon = "INSERT INTO donhang (id_dangky, madonhang, trangthai, ngaydat, hinhthucthanhtoan) VALUES ('$id_dangky', '$mahoadon', '1', '$now', '$hinhthucthanhtoan')";
    $query_hoadon = mysqli_query($conn, $insert_hoadon);
    if ($query_hoadon) {
        foreach ($_SESSION['cart'] as $key => $value) {
            $id_sanpham = $value['id'];
            $soluong = $value['soluong'];
            $insert_chitiet = "INSERT INTO chitiethoadon (madonhang, id_sanpham, soluongmua) VALUES ('$mahoadon', '$id_sanpham', '$soluong')";
            $query_chitiet = mysqli_query($conn, $insert_chitiet);
        }
    }
    header("location:../index.php");

    }elseif($hinhthucthanhtoan=='vnpay'){
        // Tích hợp thanh toán VNPAY
        $vnp_TxnRef = $mahoadon;
        $vnp_OrderInfo = 'Thanh toán đơn hàng số '.$mahoadon;
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $tongtien * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $vnp_ExpireDate = $expire;
    
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate"=>$vnp_ExpireDate,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                $_SESSION['mahoadon'] = $mahoadon;
                $insert_hoadon = "INSERT INTO donhang (id_dangky, madonhang, trangthai, ngaydat, hinhthucthanhtoan) VALUES ('$id_dangky', '$mahoadon', '1', '$now', '$hinhthucthanhtoan')";
                $query_hoadon = mysqli_query($conn, $insert_hoadon);
                if ($query_hoadon) {
                    foreach ($_SESSION['cart'] as $key => $value) {
                        $id_sanpham = $value['id'];
                        $soluong = $value['soluong'];
                        $insert_chitiet = "INSERT INTO chitiethoadon (madonhang, id_sanpham, soluongmua) VALUES ('$mahoadon', '$id_sanpham', '$soluong')";
                        $query_chitiet = mysqli_query($conn, $insert_chitiet);
                    }
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
            
            // vui lòng tham khảo thêm tại code demo
            }
    }
    // Gửi mail thông báo đơn hàng
    $tieu_de = "Đơn hàng của bạn đã được tiếp nhận";
    $noi_dung = "<p>Cảm ơn bạn đã đặt hàng với mã đơn hàng: $mahoadon. Chúng tôi sẽ liên hệ với bạn sớm nhất có thể để xác nhận đơn hàng.<br><br>Trân trọng!</p>";
    $noi_dung = "Đơn hàng gồm các sản phẩm: <br>";
    foreach ($_SESSION['cart'] as $key => $value) {
        $noi_dung .= $value['tensanpham'] . " - " . $value['soluong'] . " cái<br>";
        $noi_dung .= "Tổng tiền: " . number_format($value['soluong'] * $value['giasp']) . " VNĐ<br>";
    }   

/*     
    $email = $_SESSION['email'];
    $mail = new Mailer();
    $mail->maildathang($tieu_de, $noi_dung, $email); */

unset($_SESSION['cart']);
