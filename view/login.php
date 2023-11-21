<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="./view/user/CSS/Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./view/user/CSS/Font-awesome/css/all.min.css">
    <link rel="stylesheet" href="./view/user/CSS/Dang_nhap.css">
    <script src="../JS/dangKy - dangNhap.js"></script>
</head>

<body>
    <!-- Header -->
    <!-- <div class="frame--header--container">
        <iframe src="Header.html" frameborder="0" class="frame--header" scrolling="no"></iframe>
    </div> -->

    <!-- Nội dung đăng nhập -->
    <div class="dangnhap--container col-12">
        <div class="dangnhap--title">ĐĂNG NHẬP</div>
        <div>Nếu bạn có tài khoản, xin vui lòng đăng nhập.</div>
        <form action="index.php" method="POST" class="col-12">
            <div class="dangnhap--sdt">
                <label for="sdt" class="col-12">Email <span><?= isset($error['email'])?  $error['email'] : "*" ;?></span></label>
                <input type="text" placeholder="Email" id="sdt" name="email" class="col-12 input">
            </div>

            <div class="dangnhap--matkhau">
                <label for="mk" class="col-12">Mật khẩu <span><?= isset($error['pass'])?  $error['pass'] : "*" ;?></span></label>
                <input type="password" placeholder="Mật khẩu" id="mk" name="pass" class="col-12 input">
            </div>
            <div class="btn--dangnhap center">
                <input type="submit" class="btn-primary" value="Đăng nhập">
            </div>
            <div class="dangnhap--dangky">
                Bạn chưa có tài khoản?
               <a href="index.php?act=sign_up">Đăng ký tại đây</a> 
            </div>
            </div>
        </form>
    </div>


    <!-- Footer -->
</body>

</html>