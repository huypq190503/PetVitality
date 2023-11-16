<?php
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

            // Controller user
            if(isset($_GET['act']) && $_GET['act'] != ""){
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