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
    }
    unset($_SESSION['cart']);
header("location:../index.php");