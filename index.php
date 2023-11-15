<?php
    include "model/pdo.php";
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
                    case "login":{
                        include "login.php";
                        break;
                    }
                    case "detailsp": {
                        include "detail.php";
                        break;
                    }
                    case "searchdm":{
                        include "./view/home.php";
                        break;
                    }
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