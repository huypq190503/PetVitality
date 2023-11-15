<!-- <?php
    include "../model/pdo.php";
?> -->
<!-- Controller : Admin -->

    <div id="wrapper">
        <!-- header -->
        <?php include "header.php"; ?>
        <!-- menu -->
        <?php include "menu.php"; ?>
        <!-- main -->
        <div id="page-wrapper">
            <!-- main web -->
            <?php 
            
                // Controller
                if(isset($_GET['act']) && $_GET['act'] != ""){
                    $act = $_GET['act'];
                    switch($act){

                        // case có thể tự đặt 

                        case "trangchu":{
                            include "trangchu/trangchu.php";
                            break;
                        }
                        // Phần xử lí danh mục 
                        case "dsdm":{
                            include "danhmuc/list-danhmuc.php";
                            break;
                        }
                        case "adddm":{
                            include "danhmuc/add-danhmuc.php";
                            break;
                        }
                        case "editdm":{
                            include "danhmuc/edit-danhmuc.php";
                            break;
                        }
                        case "deletedm":{
                            break;
                        }

                        // Phần xử lí sản phẩm
                        case "dssp":{
                            include "sanpham/list-sanpham.php";
                            break;
                        }
                        case "addsp":{
                            include "sanpham/add-sanpham.php";
                            break;
                        }
                        case "editsp":{
                            include "sanpham/edit-sanpham.php";
                            break;
                        }
                        case "deletesp":{
                            break;
                        }

                        // Phần xử lí người dùng
                        case "dskh":{
                            include "khachhang/list-khachhang.php";
                            break;
                        }
                        case "addkh":{
                            include "khachhang/add-khachhang.php";
                            break;
                        }
                        case "editkh":{
                            include "khachhang/edit-khachhang.php";
                            break;
                        }
                        case "deletekh":{
                            break;
                        }
                        default: {
                            include "trangchu/trangchu.php";
                            break;
                        }
                    }
                }else{
                    include "trangchu/trangchu.php";
                }
            ?>
        </div>
        <!-- footer -->
        <?php include "footer.php"; ?>
