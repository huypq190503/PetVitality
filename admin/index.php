<!-- <?php
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
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
                        case "adddm":
                            // Kiem tra nguoi dung co click vao add hay khong
                            if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                                $tenloai=$_POST['tenloai'];
                                insert_danhmuc($tenloai);
                                $thongbao="Thêm thành công";
                                header("location: ?act=listdm");
                            }
                            
                            include "danhmuc/add.php";
                            break;
                            
                            // load danh sach danh muc
                        case "listdm":
                            $listdanhmuc=loadall_danhmuc();
                            include "danhmuc/list.php";
                            break; 
            
                        case "xoadm":
                            if(isset($_GET['id'])&&($_GET['id']>0)){
                                delete_danhmuc($_GET['id']);
                            }
                            $listdanhmuc=loadall_danhmuc();
                            include "danhmuc/list.php";
                            break;  
            
                        case "suadm":
                            if(isset($_GET['id'])&&($_GET['id']>0)){
                                $dm=loadone_danhmuc($_GET['id']);
                            }
                            include "danhmuc/update.php";
                            break; 
            
                        case "updatedm":
                            if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                                $tenloai=$_POST['tenloai'];
                                $id=$_POST['id'];
                                update_danhmuc($id,$tenloai);
                                $thongbao="Cập nhật thành công";
                            }
                            $listdanhmuc=loadall_danhmuc();
                            include "danhmuc/list.php";
                            break;

                        // Phần xử lí sản phẩm
                        case "addsp":
                            // Kiem tra nguoi dung co click vao add hay khong
                            if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                                $iddm=$_POST['iddm'];
                                $tensp=$_POST['tensp'];                              
                                $anh=$_FILES['anh']['name'];
                                $giasp=$_POST['giasp'];
                                $target_dir = "../upload/";
                                $target_file = $target_dir . basename($_FILES["anh"]["name"]);
                                if (move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
                                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                                } else {
                                    // echo "Sorry, there was an error uploading your file.";
                                }
            
                                insert_sanpham($tensp,$anh,$giasp,$iddm);
                                $thongbao="Thêm thành công";
                                header("location: ?act=listsp");
                            }
            
                            $listdanhmuc=loadall_danhmuc();
                            include "sanpham/add.php";
                            break;
            
                        case "listsp":
                            if(isset($_POST['listok'])&&($_POST['listok'])){
                                $kyw=$_POST['kyw'];
                                $iddm=$_POST['iddm'];
                            }else{
                                $kyw='';
                                $iddm=0;
                            }
                            $listdanhmuc=loadall_danhmuc();
                            $listsanpham=loadall_sanpham($kyw,$iddm);
                            include "sanpham/list.php";
                            break; 
            
                        case "xoasp":
                            if(isset($_GET['id'])&&($_GET['id']>0)){
                                delete_sanpham($_GET['id']);
                            }
                            $listsanpham=loadall_sanpham();
                            include "sanpham/list.php";
                            break;  
            
                        case "suasp":
                            if(isset($_GET['id'])&&($_GET['id']>0)){
                                $sp=loadone_sanpham($_GET['id']);
                            }
                            $listdanhmuc=loadall_danhmuc();
                            include "sanpham/update.php";
                            break; 
            
                        case "updatesp":
                            if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                                $id=$_POST['id'];
                                $iddm=$_POST['iddm'];
                                $tensp=$_POST['tensp'];                            
                                $anh=$_FILES['anh']['name'];
                                $giasp=$_POST['giasp'];
                                $target_dir = "../upload/";
                                $target_file = $target_dir . basename($_FILES["anh"]["name"]);
                                if (move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
                                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                                } else {
                                    // echo "Sorry, there was an error uploading your file.";
                                }
                                update_sanpham($id,$tensp,$giasp,$anh,$iddm);
                                $thongbao="Cập nhật thành công";
                            }
                            $listdanhmuc=loadall_danhmuc();
                            $listsanpham=loadall_sanpham("",0);
                            include "sanpham/list.php";
                            break;

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
                    // include "trangchu/trangchu.php";
                }
            ?>
        </div>
        <!-- footer -->
        <?php include "footer.php"; ?>
