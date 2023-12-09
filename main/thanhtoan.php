<?php
    include('../admin/connect/conn.php');
    include('../mail/sendmail.php');
    session_start();

    $id_dangky = $_SESSION['id_dangky'];
    $mahoadon = rand(0,9999);
    $insert_hoadon = "INSERT INTO donhang (id_dangky, madonhang, trangthai) VALUES ('$id_dangky', '$mahoadon', '1')";
    $query_hoadon = mysqli_query($conn, $insert_hoadon);
    if ($query_hoadon) {
        foreach ($_SESSION['cart'] as $key => $value) {
            $id_sanpham = $value['id'];
            $soluong = $value['soluong'];
            $insert_chitiet = "INSERT INTO chitiethoadon (madonhang, id_sanpham, soluong) VALUES ('$mahoadon', '$id_sanpham', '$soluong')";
            $query_chitiet = mysqli_query($conn, $insert_chitiet);
        }
    $tieu_de = "Đơn hàng của bạn đã được tiếp nhận";
    $noi_dung = "<p>Cảm ơn bạn đã đặt hàng với mã đơn hàng: $mahoadon. Chúng tôi sẽ liên hệ với bạn sớm nhất có thể để xác nhận đơn hàng.<br><br>Trân trọng!</p>";
    $noi_dung = "đơn hàng gồm các sản phẩm: <br>";
    foreach ($_SESSION['cart'] as $key => $value) {
        $noi_dung .= $value['tensanpham'] . " - " . $value['soluong'] . " cái<br>";
    }
    $email = $_SESSION['email'];
    $mail = new Mailer();
    $mail->maildathang($tieu_de, $noi_dung, $email);
    }
unset($_SESSION['cart']);
header("location:../index.php");