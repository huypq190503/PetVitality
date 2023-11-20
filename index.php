<?php
    session_start();
    ob_start();
    include "model/pdo.php";
    include "model/sanpham.php";
    include "model/taikhoan.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./view/user/CSS/home.css">
    <link rel="stylesheet" href="./view/user/CSS/Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./view/user/CSS/Font-awesome/css/all.css">
    <link rel="stylesheet" href="./view/user/CSS/detail.css">
    <link rel="stylesheet" href="./view/user/CSS/grid.css">
    <!-- <link rel="stylesheet" href="./view/user/CSS/Product.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
    <style>
    </style>
</head>
    <body>
    <div class="web--container">
        <!-- header -->
        <?php include "./view/_header.php";?>
        <!-- menu -->
        <?php include "./view/_menu.php";?>

        <!-- main -->
        <?php 

                // $listsanpham=danhsach_sanpham();
                $loadSanPhamDanhMucCho =load_sanpham_danhmuc_cho();
                $loadSanPhamDanhMucMeo =load_sanpham_danhmuc_meo();
            // Controller user
            if(isset($_GET['act']) && $_GET['act'] != ""){
                $act = $_GET['act'];
                switch($act){

                    case 'chiTietSanPham':{
                        if(isset($_GET['idsp']) && $_GET['idsp'] > 0){
                            $sanpham = loadone_sanpham($_GET['idsp']);
                            // $sanpham_lq = sanpham_lienquan($_GET['idsp'],$sanpham['id_dm']);
                            // $binhluan = loadall_binhluan($_GET['idsp']);                           
                            // tangluotxem($_GET['idsp']);
                            include "./view/chiTietSanPham.php";
                        }else{
                            include "./view/home.php";            
                        }
                    break;

                    }
                    case 'dangNhap':{
                        if (isset($_POST['dangNhap']) && ($_POST['dangNhap'] > 0)) {
                            $email = $_POST['email'];
                            $pass = $_POST['pass'];
                            $checkemail = checkemail($email, $pass);
                            if (is_array($checkemail)) {
                                $_SESSION['email'] = $checkemail;
                                header("location:index.php");
                            } else {
                                $thongbao = "Tài khoản hoặc mật khẩu không đúng";
                                // include "./taikhoan/dangky.php";
                            }
                        }                        
                        include "Dang_nhap.php";
                        break;
                    }
                    case 'trangSanPham':{
                        # code...
                        include "./view/trangSanPham.php";
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

    </body>

</html>