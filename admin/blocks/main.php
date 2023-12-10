<div class="clear"></div>
    <?php
    
        if(isset($_GET['action']) && isset($_GET['query'])){
            $tam = $_GET['action'];
            $query = $_GET['query'];
        }else{
            $tam = '';
            $query = '';
        }
        if($tam == 'qldmsanpham' && $query == 'them'){
            include 'blocks/qldmsanpham/them.php';
            include 'blocks/qldmsanpham/lietke.php';
        }elseif($tam == 'qldmsanpham' && $query == 'sua'){
            include 'blocks/qldmsanpham/sua.php';
        }elseif($tam == 'qlsanpham' && $query == 'them'){
            include 'blocks/qlsanpham/them.php';
            include 'blocks/qlsanpham/lietke.php';
        }elseif($tam == 'qlsanpham' && $query == 'sua'){
            include 'blocks/qlsanpham/suasp.php';
        }elseif($tam == 'qldonhang' && $query == 'lietke'){
            include 'blocks/qldonhang/lietke.php';
        }elseif($tam == 'donhang' && $query == 'xemdonhang'){
            include 'blocks/qldonhang/xemdonhang.php';
        }else{
            include 'blocks/dashboard.php';
        }
        
    ?>
</div>