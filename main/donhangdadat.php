<?php
include('./admin/connect/conn.php');

if(isset($_GET['vnp_Amount'])){

    $vnp_Amount = $_GET['vnp_Amount'];
    $vnp_BankCode = $_GET['vnp_BankCode'];
    $vnp_BankTranNo = $_GET['vnp_BankTranNo'];
    $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
    $vnp_PayDate = $_GET['vnp_PayDate'];
    $vnp_TmnCode = $_GET['vnp_TmnCode'];
    $vnp_TransactionNo = $_GET['vnp_TransactionNo'];
    $vnp_CardType = $_GET['vnp_CardType'];
    $mahoadon = $_SESSION['mahoadon'];
    
    //insert database vnpay
    $insert_vnpay = "INSERT INTO vnpay(vnp_Amount,vnp_BankCode,vnp_BankTranNo,vnp_OrderInfo,vnp_PayDate,vnp_TmnCode,vnp_TransactionNo,vnp_CardType,mahoadon) VALUES ('$vnp_Amount','$vnp_BankCode','$vnp_BankTranNo','$vnp_OrderInfo','$vnp_PayDate','$vnp_TmnCode','$vnp_TransactionNo','$vnp_CardType','$mahoadon')";
    $cart_query = mysqli_query($conn,$insert_vnpay);
    
    
    if($cart_query){
        //insert gio hàng
        echo '<h3>Giao dịch thanh toán bằng VNPAY thành công</h3>';
        echo '<p>Vui lòng vào trang <a target="_blank" href="index.php?quanly=lichsudonhang">lịch sử đơn hàng</a> để xem chi tiết đơn hàng của bạn</p>';
    }else{
        echo 'Giao dịch VNPAY thất bại';
    }
}
?>