<?php
    $sql_danhmuc = "SELECT * FROM danhmuc ORDER BY tendanhmuc DESC";
    $query_danhmuc = mysqli_query($conn, $sql_danhmuc);  
?>
<?php
    if(isset($_GET['dangxuat']) && $_GET['dangxuat']==1){
        unset($_SESSION['dangky']);
    }
?>

<body>


    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar js-sticky-header site-navbar-target" role="">

        <div class="container">
            <div class="row align-items-center position-relative">
                <div class="col-12">
                    <nav class="site-navigation text-right ml-auto " role="navigation">
                        <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                            <li><a href="index.php" class="nav-link">Trang chủ</a></li>
                            <li class="has-children">
                                <a href="#about-section" class="nav-link">Danh mục</a>
                                <ul class="dropdown arrow-top">
                                <?php
                                    while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                                ?>
                                    <li><a href="index.php?quanly=dmsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
                                <?php
                                    }
                                ?>
                                </ul>
                            </li>
                            <?php
                                if (isset($_SESSION['dangky'])) {
                            ?>
                            <li><a href="index.php?quanly=donhang" class="nav-link">Lịch sử đơn hàng</a></li>
                            <li><a href="index.php?dangxuat=1" class="nav-link">Đăng xuát</a></li>
                            <?php
                                } else {
                            ?>
                            <li><a href="index.php?quanly=dangnhap" class="nav-link">Đăng nhập</a></li>
                            <li><a href="index.php?quanly=dangky" class="nav-link">Đăng ký</a></li>
                            <?php
                                }
                            ?>
                        </ul>
                    </nav>

                </div>

                <div class="toggle-button d-inline-block d-lg-none"><a href="#"
                        class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
                </div>

            </div>
        </div>

    </header>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/main.js"></script>
</body>

</html>