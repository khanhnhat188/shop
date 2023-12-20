<?php
 require "admin/connect/conn.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/style_main.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Bán Hàng</title>
</head>

<body>
    <div class="wrapper">
        <?php
            session_start();
            include "page/header.php";
            include "page/menu_v1.php";
            include "page/main.php";
            include "page/footer.php";
        ?>
    </div>



    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {

        var back = $(".prev");
        var next = $(".next");
        var steps = $(".step");

        next.bind("click", function() {
            $.each(steps, function(i) {
                if (!$(steps[i]).hasClass('current') && !$(steps[i]).hasClass('done')) {
                    $(steps[i]).addClass('current');
                    $(steps[i - 1]).removeClass('current').addClass('done');
                    return false;
                }
            })
        });
        back.bind("click", function() {
            $.each(steps, function(i) {
                if ($(steps[i]).hasClass('done') && $(steps[i + 1]).hasClass('current')) {
                    $(steps[i + 1]).removeClass('current');
                    $(steps[i]).removeClass('done').addClass('current');
                    return false;
                }
            })
        });

    })
    </script>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
</body>

</html>