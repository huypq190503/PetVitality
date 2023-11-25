<?php
    session_start();
    ob_start();
    include "model/pdo.php";
    include "model/account.php";
    include "model/sanpham.php";
    include "model/binhluan.php";
    // include "./view/_menu.php";   
?>

    <!-- <div class="container"> -->


        <!-- main -->
        <?php 
            $loadSanPhamDanhMucCho =load_sanpham_danhmuc_cho();
            $loadSanPhamDanhMucMeo =load_sanpham_danhmuc_meo();
            // Controller user
            if(isset($_GET['act']) ){
                $act = $_GET['act'];
                switch($act){
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
                            // else if( $pass >= 6){
                            //     $error['pass']= "Mật khẩu bạn phải đủ 6 ký tự";
                            // }
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
                    case 'product':{
                        include "./view/product.php";
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
    