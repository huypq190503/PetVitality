<?php
    session_start();
    ob_start();
    include "model/pdo.php";
    include "model/account.php";
    include "model/sanpham.php";
    include "model/danhmuc.php";
    
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
            $loadSanPhamDanhMucCho =load_sanpham_danhmuc_cho();
            $loadSanPhamDanhMucMeo =load_sanpham_danhmuc_meo();
            $loadSanPhamNoiBat=loadall_sanpham_top10();
            // Controller user
            if(isset($_GET['act']) ){
                $act = $_GET['act'];
                switch($act){
/*---------------------------------Chi tiết sản phẩm-------------------------------------- */                     
                    case 'productdetail':
                            if(isset($_GET['id_sp'])&&($_GET['id_sp']!="")){
                                $id_sp=$_GET['id_sp'];
                                $list_ctsp=display_ctsp($id_sp); 
                               
                            }
                            include "view/productdetail.php";
                            break;

/*---------------------------------Đăng nhập-------------------------------------- */                     
                     case 'sign_up':{
                        $error=[];
                        if(isset($_POST["sign_up"])&&($_POST["sign_up"])){
                            $user=$_POST['user'];
                            $pass=$_POST['pass'];
                            $email=$_POST['email'];
                            $tel=$_POST['tel'];
                            $address=$_POST['address'];
                            $regex='/^0\d{9}$/';
                             
                            if(empty($user))
                            {   
                                $error['user']="Vui lòng nhập họ và tên ";  
                            }
                            if(empty($pass))
                            {   
                                $error['pass']="Vui lòng nhập mật khẩu ";  
                            }
                            if(empty($email))
                            {
                                $error["email"]="Vui lòng nhập  email ";
                            } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                                $error["email"]=" Email không hợp lệ";
                            }
                            if(empty($tel))
                            {
                                $error["tel"]=" Vui lòng nhập số điện thoại ";
                            }else if( !preg_match($regex,$tel)){
                                $error["tel"] = " Số điện thoại không hợp lệ";
                            }
                            if(empty($address))
                            {   
                                $error['address']="Vui lòng nhập Địa chỉ ";  
                            }
                            if(!$error){
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
                        include "./view/cart.php";
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
                            $id_sp = $_POST['id_sp'];
                            $name_sp = $_POST['name_sp'];
                            $price = $_POST['price'];
                            $img = $_POST['img'];
                            $soluong =$_POST['quantity'];
                            $weight =$_POST['weight'];
                            $genre =$_POST['genre'];
                            $list_ctsp=display_ctsp($id_sp); 
                            if($soluong>$list_ctsp[0]['quantity']){
                                header("Location: ?act=productdetail&id_sp=$id_sp");
                                $nofi="Chọn quá số lượng";
                             }else{
                                $addsp = [$id_sp,$img,$name_sp,$price,$soluong,$weight,$genre];
                                array_push($_SESSION['cart'],$addsp);
                                function total_quantity($n){
                                    if(isset($addsp[0])&&isset($addsp[5])&&isset($addsp[6])){
                                        for($i=0;$i<$addsp[$soluong];$i++){
                                            if($addsp[$soluong]+$n>$list_ctsp[0]['quantity']){
                                                $nofi="Số lượng đã quá giới hạn";
                                            }else{
                                               return $addsp[$soluong]+$n;
                                            }
                                        }
                                       
                                    }else{
                                        return $n;
                                    }   
                                }
                             }
                        }
                       
                        include "./view/cart.php";
                        // include "./view/user/GioHang/Cart.php";
                        break;
                    }
                    case 'order' :{
                        if(isset($_POST['order']) && ($_POST['order'] > 0)){
                            $order = $_POST['order'];
                            $id_sp = $_POST['id_sp'];
                            $name_sp = $_POST['name_sp'];
                            $price = $_POST['price'];
                            $img = $_POST['img'];
                            $soluong =$_POST['quantity'];
                            $weight =$_POST['weight'];
                            $genre =$_POST['genre'];
                            $addsp = [$id_sp,$img,$name_sp,$price,$soluong,$weight,$genre];
                            
                        }
                        include "./view/order.php";
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
    