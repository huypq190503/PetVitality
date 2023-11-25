<?php
   ob_start();
   $cookie_name="nofi";
   $cookie_nofi="Bạn đã đăng ký thành công";
   ?>
  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="./view/user/CSS/Dang_ky.css">
    <link rel="stylesheet" href="./view/user/CSS/Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./view/user/CSS/Font-awesome/css/all.min.css">
    <script src="./view/JS/dangKy - dangNhap.js"></script>
</head>
<body>
    <!-- Header -->

    <!-- Nội dung đăng nhập -->
    
    <div class="dangky--container col-12">
    <div class="col-12" >
    <h2 class="thongbao" id="thongbao" style=" padding-top: 20px; ; color: red; ;font-size: 1vw;" > 
    <?php
        if(isset($thongbao)&& ($thongbao)!=""){
            echo $thongbao .' <a href="index.php?act=login">Đăng nhập tại đây</a> ';
        }
    ?>
    </div>
        <div class="dangky--title">ĐĂNG KÝ</div>
        <div>THÔNG TIN CÁ NHÂN</div>
        <form action="?act=sign_up" method="POST" class="col-12"> 
            <div class="dangky--ho">
                <label for="ho" class="col-12">Họ và tên <span>*</span></label>
                <input type="text" placeholder="Họ và tên" id="ho" name="user" class="col-12 input" require>
            </div>
            <div class="dangky--sdt">
                <label for="sdt" class="col-12">Số điện thoại <span>*</span></label>
                <input type="number" placeholder="Số điện thoại" id="sdt" name="tel" class="col-12 input" >
            </div>
            <div class="dangky--sdt">
                <label for="sdt" class="col-12">Email <span>*</span></label>
                <input type="text" placeholder="Email" id="sdt" name="email" class="col-12 input">
            </div>
            <div class="dangky--matkhau">
                <label for="mk" class="col-12">Mật khẩu <span>*</span></label>
                <input type="password" placeholder="Mật khẩu" id="mk" name="pass" class="col-12 input" >
            </div>
            <div class="dangky--diachi">
                <label for="diachi" class="col-12">Địa chỉ <span>*</span></label> 
                <input type="text" placeholder="Địa chỉ" id="diachi" name="address" class="col-12 input"    >
            </div>

            <div class="btn--dangky center">
                <input type="submit" class="btn-primary" name="sign_up"value="Đăng ký">
            </div>
            <div class="dangky--dangnhap">
                Bạn đã có tài khoản?
               <a href="index.php?act=login">Đăng nhập tại đây</a> 
            </div>
        </form>

    </div>
    <!-- Nội dung footer -->

</body>
</html>