<?php
    session_start();
    ob_start();
    include "model/pdo.php";
    include "model/account.php";
    include "model/sanpham.php";
    include "model/danhmuc.php";
    include "model/comment.php";
    include "model/order.php";

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    
    // include "./view/_menu.php";   
?>

    <!-- <div class="container"> -->


        <!-- main -->
        <?php            
            


            $danhSachDanhMuc = loadall_danhmuc();
            $danhSachSanPham = list_sanpham();
            $loadSanPhamDanhMucCho =load_sanpham_danhmuc_cho();
            $loadSanPhamDanhMucMeo =load_sanpham_danhmuc_meo();
            $loadSanPhamNoiBat=loadall_sanpham_top10();
            // Controller user
            if(isset($_GET['act']) ){
                $act = $_GET['act'];
                switch($act){
                  
                    
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
                    case 'update_user':{
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
                        include "./view/update_user.php";
                        break;
                    }
/*---------------------------------Trang sản phầm-------------------------------------- */                     
                    case 'product':{
                        if(isset($_POST['btn_search'])&&($_POST['btn_search']!="")){
                            $search=$_POST['search'];
                        }else{
                            $search="";
                        }
                        display_search($search="");
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
/*---------------------------------Chi tiết sản phẩm-------------------------------------- */   
                    case 'productdetail':{
                        if(isset($_POST['guibinhluan'])&&$_POST['guibinhluan']){
                            $noidung = $_POST['noidung'];
                            $idpro = $_POST['idpro'];
                            $iduser = $_POST['user'];
                            insert_binhluan($noidung,$iduser,$idpro);
                            
                        }

                        if(isset($_GET['id_sp'])&&($_GET['id_sp']!="")){
                            $id_sp=$_GET['id_sp'];
                            
                            $product=display_sanpham($id_sp);
                            $product_bienthe=display_chitietsanpham($id_sp); 

                            $id_ctsp=array_column($product_bienthe,'id_ctsp'); 

                            $quantity=array_column($product_bienthe,'quantity');   
                            $listquantity=array_sum($quantity);
                             
                            $weight=array_column($product_bienthe,'weight'); 
                            $listweight=array_unique($weight);

                            $genre=array_column($product_bienthe,'genre');
                            $listgenre=array_unique($genre); 
                            // sản phẩm cùng loại
                            $sanpham=loadone_sanpham($id_sp);
                            $ditto_product=loadone_sanpham_cungloai($id_sp,$sanpham['iddm']);
                            // Bình luận
                            $binhluan = loadall_binhluan($_GET['id_sp']); 
                            include "./view/productdetail.php";
                            // var_dump($ditto_product);
                        }else{
                            include "./view/home.php";            
                        }
                        
                        
                     
                        break;
                    }

/*---------------------------------Giỏ hàng-------------------------------------- */ 
                    case 'viewCart' :{
                        if (!empty($_SESSION['cart'])) {
                            $cart = $_SESSION['cart'];

                            // Tạo mảng chứa ID các sản phẩm trong giỏ hàng
                            $productId = array_column($cart, 'id');
                            // var_dump($productId);
                            
                            // Chuyển đôi mảng id thành một chuỗi để thực hiện truy vấn
                            $idList = implode(',', $productId);
                            // var_dump($idList);                            
                            
                            // Lấy sản phẩm trong bảng sản phẩm theo id
                            $dataDb = loadone_sanphamCart($idList);
                            // var_dump($dataDb);
                        } 
                        include "./view/Cart/viewCart.php";
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
                    case 'order' :{
                            if (isset($_SESSION['cart'])) {
                                $cart = $_SESSION['cart'];
                                // print_r($cart);
                                if (isset($_POST['order_confirm'])) {
                                    $txthoten = $_POST['user'];
                                    $txttel = $_POST['tel'];
                                    $txtemail = $_POST['email'];
                                    $txtaddress = $_POST['address'];
                                    $pttt = $_POST['pttt'];
                                    // date_default_timezone_set('Asia/Ho_Chi_Minh');
                                    // $currentDateTime = date('Y-m-d H:i:s');
                                    if (isset($_SESSION['user'])) {
                                        $id_user = $_SESSION['user']['id'];
                                    } else {
                                        $id_user = 0;
                                    }
                                    $idBill = addOrder($id_user, $txthoten, $txttel, $txtemail, $txtaddress, $_SESSION['resultTotal'], $pttt);
                                    foreach ($cart as $item) {
                                        addOrderDetail($idBill, $item['id'], $item['price'], $item['quantity'], $item['price'] * $item['quantity']);
                                    }
                                    unset($_SESSION['cart']);
                                    $_SESSION['success'] = $idBill;
                                    header("Location: index.php?act=success");
                                }
                                include "./view/Cart/order.php";
                            } else {
                                header("Location: index.php?act=viewCart");
                            }
                            break;
                        }
                        case "success":{
                            if (isset($_SESSION['success'])) {
                                include 'view/success.php';
                            } else {
                                header("Location: index.php");
                            }
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
    