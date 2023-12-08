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
    <title>Bán Hàng</title>
</head>
<body>
    <div class="wrapper"> 
        <?php
            include "page/header.php";
            include "page/menu.php";
            include "page/main.php";
            include "page/footer.php";
        ?>
    </div>



<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>
</html>