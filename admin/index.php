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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

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



</body>

</html>