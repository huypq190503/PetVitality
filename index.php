<?php
    include "model/pdo.php";
    include "model/account.php";
    // include "./view/_menu.php";   
?>

    
        <?php 

            // Controller user
            if(isset($_GET['act']) ){
                $act = $_GET['act'];
                switch($act){
<<<<<<< HEAD
                    case 'test':
                        include "./view/_slider.php";
                        break;  
                    
=======
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
                    case 'login':
                        if(isset($_POST['login'])&&($_POST['login'])){
                            $email=$_POST['email'];
                            $pass=$_POST['pass'];
                            if(empty($email))
                            {
                                $error["email"]="Vui lòng nhập  email ";
                            } 
                            // else if($email !=  ){
                            //     $error["email"]="Tài khoản hoặc mật khẩu không đúng";
                            // }
                            if(empty($pass))
                            {   
                                $error['pass']="Vui lòng nhập mật khẩu ";  
                            }
                            // else if($pass != ){
                            //     $error["pass"]="Tài khoản hoặc mật khẩu không đúng";
                            // }
                            if(!$error){
                                $login_account=login_account($email,$pass);
                                if(is_array($login_account)){
                                    $_SESSION['email']=$login_account;
                                    // $nofi="Đăng nhập thành công";
                                    header('Location: index.php'); 
                                }                      
                                else{
                                        $nofi="Đăng nhập không thành công.Vui lòng kiểm tra lại";
                                } 
                            }
                        }
                        
                        include "./view/login.php";
                        break;
                    case 'product':
                        include "./view/product.php";
                        break;
>>>>>>> bb5abb7c371e3255a7980a1bc68af05c18236e7e
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
    