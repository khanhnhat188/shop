<div id=main>
    <div class="maincontent">
        <!--Thân trang-->
        <?php
        if(isset($_GET['quanly'])){
            $tam=$_GET['quanly'];
        }else{
            $tam='';
        }
        if($tam=='dmsanpham'){
            include("main/danhmuc.php");
        }elseif($tam=='lienhe'){
            include("main/lienhe.php");
        }elseif($tam=='sanpham'){
            include("main/sanpham.php");
        }elseif($tam=='giohang'){
            include("main/giohang.php");
        }elseif($tam=='dangky'){
            include("main/dangky.php");
        }elseif($tam=='dangnhap'){
            include("main/dangnhap.php");
        }elseif($tam=='thanhtoan'){
            include("main/thanhtoan.php");
        }elseif($tam=='timkiem'){
            include("main/search.php");
/*         }elseif($tam=='thongitnthanhtoan'){
            include("main/thongitnthanhtoan.php"); */
        }elseif($tam=='donhangdadat'){
            include("main/donhangdadat.php");
        }elseif($tam=='donhang'){
            include("main/donhang.php");
        }elseif($tam=='xemdonhang'){
            include("main/xemdonhang.php");

        }else{
            include("main/index.php");
        }
        ?>
    </div>
</div>