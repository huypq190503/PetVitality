<?php
    session_start();
    ob_start();
    include "model/pdo.php";
    include "model/account.php";
    include "model/danhmuc.php";
    include "model/sanpham.php";
    include "model/binhluan.php";
    // include "./view/_menu.php";   
?>

    <!-- <div class="container"> -->


        <!-- main -->
        <?php            
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            // if (!isset($_SESSION['cart'])) {
            //     $_SESSION['cart'] = [];
            // }
            // unset($_SESSION['mycart']); 
            // die;  

            $danhSachDanhMuc = loadall_danhmuc();
            $danhSachSanPham = danhsach_sanpham();
            $loadSanPhamDanhMucCho = load_sanpham_danhmuc_cho();
            $loadSanPhamDanhMucMeo = load_sanpham_danhmuc_meo();
            $loadSanPhamNoiBat=loadall_sanpham_top10();
            // Controller user
            if(isset($_GET['act']) ){   
                $act = $_GET['act'];
                switch($act){
/*---------------------------------Chi tiết sản phẩm-------------------------------------- */                     
                    case 'chiTietSanPham':{
                        if(isset($_POST['guibinhluan'])&& $_POST['guibinhluan']){
                            $noidung = $_POST['noidung'];
                            $idpro = $_POST['idpro'];
                            $iduser = $_POST['user'];
                            insert_binhluan($noidung,$iduser,$idpro);
                        }
                        
                        if(isset($_GET['idsp']) && $_GET['idsp'] > 0){
                            $sanpham = loadone_sanpham($_GET['idsp']);
                            // $sanpham_lq = sanpham_lienquan($_GET['idsp'],$sanpham['id_dm']);
                            $dsbl = loadall_binhluan($_GET['idsp']);                           
                            // tangluotxem($_GET['idsp']);
                            include "./view/chiTietSanPham.php";
                        }else{
                            include "./view/home.php";            
                        }
                    break;

                    }
/*---------------------------------Đăng nhập-------------------------------------- */                     
                    case 'sign_up':{
                        $error=[];
                        if(isset($_POST["sign_up"])&&($_POST["sign_up"])){
                            $email = $_POST['email'];
                            $pass = $_POST['pass'];
                            $user = $_POST['user'];
                            $tel = $_POST['tel'];
                            $address = $_POST['address'];
                            if(checkEmailExists($email) == true) {
                                $thongbao ="Đã tồn tại email !";
                                // include "./view/sign_up.php";
                            }else{  
                            insert_account($user,$pass,$email,$address,$tel);
                            $thongbao = "Đăng ký thành công !! ";
                            } 
                        }
                        include "./view/sign_up.php";
                        break;
                    }
                    case 'login':{
                        if (isset($_POST['login']) && ($_POST['login'] > 0)) {
                            $email = $_POST['email'];
                            $pass = $_POST['pass'];
                            $checkemail = checkemail($email, $pass);
                            if (is_array($checkemail)) {
                                $_SESSION['email'] = $checkemail;
                                header("location:index.php");
                            } else {
                                $thongbao = "Tài khoản hoặc mật khẩu không đúng";
                                // include "./view/sign_up.php";
                            }
                        }  
                        
                        include "./view/login.php";
                        break;
                    }
                    case 'log_out':{
                        session_unset();
                        header("location:index.php");
                        break;
                    }
                    case 'edit_user':{
                        if (isset($_POST['update']) && ($_POST['update'] > 0)) {
                            $pass = $_POST['pass'];
                            $user = $_POST['user'];
                            $address = $_POST['address'];
                            $tel = $_POST['tel'];
                            $id = $_POST['id'];
                            $email = $_POST['email'];
                            $checkemail = checkemail($email, $pass);
                            update_account($id, $user, $pass, $email, $address, $tel);
                            $_SESSION['email'] = checkemail($email, $pass);
                            $thongbao = "Cập nhật thành công";
                            // header("location:index.php?act=edit_taikhoan");
                        }
                        include "./view/user/TaiKhoan/thongTin.php";
                        break;
                    }
/*---------------------------------Trang sản phầm-------------------------------------- */                     
                    case 'product':{
                        $danhSachSanPham=loadall_sanpham_home((isset($_GET['filter']) ? $_GET['filter'] : ''));
                        // $danhSachSanPhamTheoDanhMuc=sanpham_theodanhmuc((isset($_GET['iddm']) ? $_GET['iddm'] : ''));
                        // if(isset($_GET['iddm']) && $_GET['iddm'] > 0){
                        //     $dssp = sanpham_theodanhmuc($_GET['iddm']);
                        // }
                        include "./view/product.php";
                        break;
                    }
                    case 'product_cate':{
                        if(isset($_GET['iddm']) && $_GET['iddm'] > 0){
                        $danhSachSanPham = sanpham_theodanhmuc($_GET['iddm']);
                        }
                        include "./view/product.php";
                        break;
                    }

/*---------------------------------Giỏ hàng-------------------------------------- */ 
                    case 'viewCart' :{
                        include "./view/user/GioHang/ViewCart.php";
                        break;
                    }
                    case "delCart":{
                        if(isset($_GET['idCart'])){
                            // Xóa theo id 
                        array_splice($_SESSION['cart'],$_GET['idCart'],1);
                        }else{
                            $_SESSION['cart']=[];
                        }
                        header('Location: index.php?act=viewCart');
                        break;
                    }
                    case 'addToCart' :{
                        if(isset($_POST['addCart']) && ($_POST['addCart'] > 0)){
                            $id = $_POST['idsp'];
                            $name = $_POST['name'];
                            $price = $_POST['price'];
                            $img = $_POST['img'];
                            $soluong = 1;
                            $ttien = (int)$price * $soluong;
                            $addsp = [$id,$name,$price,$img,$soluong,$ttien];
                            array_push($_SESSION['cart'],$addsp);

                        }
                        include "./view/user/GioHang/ViewCart.php";
                        // include "./view/user/GioHang/Cart.php";
                        break;
                    }
                    case 'order' :{
                        if(isset($_POST['order']) && ($_POST['order'] > 0)){
                            $order = $_POST['order'];
                            var_dump($order);
                            die();
                        }
                        include "./view/user/GioHang/Order.php";
                        // include "./view/user/GioHang/Cart.php";
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
        // ?>

        <!-- footer -->
    