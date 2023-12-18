<?php 
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
} 

?>
<?php
include 'connect/conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
    <!-- Morris.js CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">


    <title>Admin</title>
</head>

<body>
    <div class="container">
    <a href="index.php"><h3 class="title_admin">QUẢN TRỊ</h3></a>
    <div class="wrapper">
        <?php
                include "blocks/header.php";
                include "blocks/menu.php";
                include "blocks/main.php";
            ?>
    </div>
<!--     <script type="text/javascript">
    $(document).ready(function() {
        thongke();
        var char = new Morris.Area({

            element: 'myfirstchart',

            xkey: 'date',

            ykeys: ['date', 'order', 'sales', 'quantity'],

            labels: ['Đơn hàng', 'Doanh thu', 'Số lượng bán ra', 'Số lượng']
        });
        /* 
                $('.select-date').change(function() {
                    var thoigian = $(this).val();
                    if (thoigian == '7ngay') {
                        var text = '7 ngày qua';
                    } else if (thoigian == '28ngay') {
                        var text = '28 ngày qua';
                    } else if (thoigian == '90ngay') {
                        var text = '90 ngày qua';
                    } else {
                        var text = '365 ngày qua';
                    }

                    $.ajax({
                        url: "thongke.php",
                        method: "POST",
                        dataType: "JSON",
                        data: {
                            thoigian: thoigian
                        },
                        success: function(data) {
                            char.setData(data);
                            $('#text-date').text(text);
                        }
                    });
                }) */

        function thongke() {
            var text = '365 ngày qua';
            $('#text-date').text(text);
            $.ajax({
                url: "thongke.php",
                method: "POST",
                dataType: "JSON",
                success: function(data) {
                    char.setData(data);
                    $('#text-date').text(text);
                }
            });
        }
    });
    </script> -->

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <!-- Datatables js -->
    <script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>

</div>
</body>

</html>