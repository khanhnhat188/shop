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
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
    <!-- Morris.js CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">


    <title>Admin</title>
</head>

<body>
    <h3 class="title_admin">QUẢN TRỊ</h3>
    <div class="wrapper">
        <?php
                include "blocks/header.php";
                include "blocks/menu.php";
                include "blocks/main.php";
            ?>
    </div>
    <script type="text/javascript">
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
    </script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</body>

</html>