<?php
    include '../../connect/conn.php';
    if(isset($_GET['trangthai'])){
        $code = $_GET['code'];
        $sql_update = "UPDATE donhang SET trangthai = 0 WHERE madonhang = '$code'";
        mysqli_query($conn, $sql_update);
        header('Location: ../index.php?action=donhang&query=lietke');
    }
?>