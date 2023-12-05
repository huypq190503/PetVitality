<!-- <?php
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/account.php";
    include "../model/comment.php";
    include "../model/order.php";
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
                        case "dashboard":{
                            // Kiem tra nguoi dung co click vao add hay khong
                            $listsanpham=list_sanpham();
                            include "./dashboard/dashboard.php";
                            break;
                        }    
                        // Phần xử lí danh mục 
                        case "adddm":{
                            // Kiem tra nguoi dung co click vao add hay khong
                            if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                                $tenloai=$_POST['tenloai'];
                                insert_danhmuc($tenloai);
                                $thongbao="Thêm thành công";
                                header("location: ?act=listdm");
                            }
                            
                            include "danhmuc/add.php";
                            break;
                        }    
                            // load danh sach danh muc
                        case "listdm":{
                            $listdanhmuc=loadall_danhmuc();
                            include "danhmuc/list.php";
                            break; 
                        }
                        case "xoadm":{
                            if(isset($_GET['id'])&&($_GET['id']>0)){
                                delete_danhmuc($_GET['id']);
                            }
                            $listdanhmuc=loadall_danhmuc();
                            include "danhmuc/list.php";
                            break;  
                        }
                        case "suadm":{
                            if(isset($_GET['id'])&&($_GET['id']>0)){
                                $dm=loadone_danhmuc($_GET['id']);
                            }
                            include "danhmuc/update.php";
                            break;
                        }
                        case "updatedm":{
                            if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                                $tenloai=$_POST['tenloai'];
                                $id=$_POST['id'];
                                update_danhmuc($id,$tenloai);
                                $thongbao="Cập nhật thành công";
                            }
                            $listdanhmuc=loadall_danhmuc();
                            include "danhmuc/list.php";
                            break;
                        }
                        // Phần xử lí sản phẩm
                        case "addsp":{
                            // Kiem tra nguoi dung co click vao add hay khong
                            if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                                $iddm=$_POST['iddm'];
                                $name_pro=$_POST['name_pro'];                              
                                $img_pro=$_FILES['img_pro']['name'];
                                $price_sp=$_POST['price_sp'];
                                $weight=$_POST['weight'];
                                $genre=$_POST['genre'];
                                $id_sp=$_POST['id_sp'];
                                $quantity=$_POST['quantity'];
                                $description=$_POST['description'];
                                $target_dir = "../upload/";
                                $target_file = $target_dir . basename($_FILES["img_pro"]["name"]);
                                if (move_uploaded_file($_FILES["img_pro"]["tmp_name"], $target_file)) {
                                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                                } else {
                                    // echo "Sorry, there was an error uploading your file.";
                                }
                                if(isset($name_pro)&&isset($img_pro)&&isset($price_sp)&&isset($iddm)){
                                    $id_sp=insert_sanpham($name_pro,$img_pro,$price_sp,$description,$iddm);
                                }
                                if(!empty($quantity)&&!empty($weight)&&!empty($genre)){
                                    insert_chitietsanpham($quantity,$weight,$genre,$id_sp);
                                }
                                $thongbao="Thêm thành công";
                                header("location: ?act=listsp");
                            }
                          
                            $listdanhmuc=loadall_danhmuc();
                            include "sanpham/add.php";
                            break;
                        }
                        case "listsp":{
                            // Tìm kiếm sản phẩm 
                            if(isset($_POST['listok'])&&($_POST['listok'])){
                                $kyw=$_POST['kyw'];
                                $iddm=$_POST['iddm'];
                            }
                            else{
                                $kyw='';
                                $iddm=0;
                            }
                            
                            $listdanhmuc=loadall_danhmuc();
                            $listsanpham=loadall_sanpham($kyw,$iddm);
                        
                            // $list_sp=list_sp();
                            // var_dump($list_sp);
                            // $list_ctsp=list_ctsp();
                           
                           
                            include "sanpham/list.php";
                            break; 
                        }
                        case "xoasp":{
                            if(isset($_GET['id'])&&($_GET['id']>0)){
                                delete_bienthe($_GET['id']);
                                delete_sanpham($_GET['id']);

                            }
                            $listsanpham=loadall_sanpham();
                            include "sanpham/list.php";
                            break;  
                        }
                        case "xoa_bienthe":{
                            if(isset($_GET['id'])&&($_GET['id']>0)){
                                delete_bienthe($_GET['id']);
                                delete_sanpham($_GET['id']);

                            }
                            $listsanpham=loadall_sanpham();
                            include "sanpham/list_bienthe.php";
                            break;  
                        }
                        
                        case "suasp":{
                            if(isset($_GET['id'])&&($_GET['id']>0)){
                                $id_sp=$_GET['id'];
                                $product=display_sanpham($id_sp);
                                $product_bienthe=display_chitietsanpham($id_sp);
                                
                                // hiển thị chuỗi khối lượng
                                $arr_weight=array_column($product_bienthe,'weight'); 
                                $list_weight=array_unique($arr_weight);
                                $str_weight=implode(",",$list_weight);
                                // hiển thị chuỗi số lượng
                                $arr_quantity=array_column($product_bienthe,'quantity'); 
                                $list_quantity=array_unique($arr_quantity);
                                $str_quantity=implode(",",$list_quantity);
                                // hiển thị chuỗi loại
                                $arr_genre=array_column($product_bienthe,'genre');
                                $list_genre=array_unique($arr_genre); 
                                $str_genre=implode(",",$list_genre);   
                                 
                            }
                            if(isset($_POST['capnhat'])){
                                    $id=$_POST['id'];
                                    $name_pro=$_POST['name_pro'];                              
                                    $img_pro=$_FILES['img_pro']['name'];
                                    $price_sp=$_POST['price_sp'];
                                    $new_quantity=$_POST['quantity'];
                                    $new_weight=$_POST['weight'];
                                    $new_genre=$_POST['genre'];
                                    $id_sp=$_POST['id_sp'];
                                    $iddm=$_POST['iddm'];
                                    $description=$_POST['description'];
                                    $img_pro = null;
                                    if($_FILES['img_pro']['name'] != ""){
                                        $photo = time() . "_" . $_FILES['img_pro']['name'];
                                        move_uploaded_file($_FILES['img_pro']['tmp_name'], "../upload/$img_pro");
                                    }
                                    $product=display_ctsp($_POST['id']);
                                // hiển thị chuỗi khối lượng
                                $arr_weight=array_column($product,'weight'); 
                                $list_weight=array_unique($arr_weight);
                                    update_bienthe($other_quantity,$other_weight, $other_genre);
                                
                                    // $thongbao="Cập nhật thành công";
                                    header("location: ?act=listsp");

                                }
                                $listdanhmuc=loadall_danhmuc();
                                // $listsanpham=loadall_sanpham("",0);
                                include "sanpham/update.php";
                                break;
                        }    
                        case "list_bienthe":
                                if(isset($_GET['id'])&&($_GET['id']>0)){
                                    $id_sp=$_GET['id'];
                                    $product=display_sanpham($id_sp);
                                    $product_bienthe=display_chitietsanpham($id_sp);
                                }
                                include "sanpham/list_bienthe.php";
                                
                                break;   
                        case "xoa_bienthe":{
                             if(isset($_GET['id_ctsp']))
                            {
                                delete_bienthe($_GET['id_ctsp']);
                               
                            }
                                // $id=list_ctsp();
                                $list_bienthe=list_bienthe();
                                include "sanpham/list_bienthe.php";
                                break;  
                                }
                        // Phần xử lí người dùng
                        case "list_account":{   
                                    $list_account=list_account();
                            include "./account/list_account.php";
                            break;
                        }
                        case "xoa_acc":{
                            if(isset($_GET['id'])&&($_GET['id']>0)){
                                delete_account($_GET['id']);
                            }
                            $list_account=list_account();
                            include "./account/list_account.php";
                            break;  
                        }
                        // End user
                        // Bình luận 
                        case "dsbl":{
                            $danhSachBinhLuan = danhsach_binhluan();
                            // var_dump($danhSachBinhLuan);
                            include "./comment/list_comment.php";
                            break;
                        }
                        case "deletebl":{

                            if(isset($_GET['idbl']) && $_GET['idbl'] > 0){
                                delete_binhluan($_GET['idbl']);
                                header("location: ?act=dsbl");
                            }
                            break;
                        }
                        // End bình luận 

                        case "dsdh":{
                            // $danhSachBinhLuan = danhsach_binhluan();
                            $danhSachDonHang =danhsach_donhang();
                            // var_dump($danhSachBinhLuan);
                            include "./cart/list_cart.php";
                            break;
                        }
                        case "deletedh":{

                            if(isset($_GET['idbl']) && $_GET['idbl'] > 0){
                                delete_binhluan($_GET['idbl']);
                                header("location: ?act=dsbl");
                            }
                            break;
                        }
                        // case"thongke":{
                        //     $listthongke = loadall_thongke();
                        //     include 'thongke/list.php';
                        //     break;
                        // }

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
      
            </div>
