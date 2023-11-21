<?php
    session_start();
    ob_start();
    include "model/pdo.php";
    include "model/taikhoan.php";
?>

    <div class="container">
        <!-- header -->
        <?php include "./view/_header.php";?>
        <!-- menu -->
        <?php include "./view/_menu.php";?>

        <!-- main -->
        <?php 

                // $listsanpham=danhsach_sanpham();
                $loadSanPhamDanhMucCho =load_sanpham_danhmuc_cho();
                $loadSanPhamDanhMucMeo =load_sanpham_danhmuc_meo();
            // Controller user
            if(isset($_GET['act']) ){
                $act = $_GET['act'];
                switch($act){
                    
                    default: {
                        include "./view/home.php";
                        break;
                    }
                }
            }else{
                include "./view/home.php";
            }
        ?>

        <!-- footer -->
        <?php include "./view/_footer.php";?>
    </div>