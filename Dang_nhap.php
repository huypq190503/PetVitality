<?php
    // session_start();
    ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="./view/user/CSS/Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./CSS/Font-awesome/css/all.min.css">
    <link rel="stylesheet" href="./view/user/CSS/Dang_nhap.css">
    <!-- <script src="../view/user/JS/dangKy - dangNhap.js"></script> -->
</head>

<body>
    <!-- Header -->
    <?php
              if (isset($_SESSION['email'])) {
                // extract() để trích xuất các phần tử trong mảng $_SESSION['email'] thành các biến độc lập.
                extract($_SESSION['email'])
              ?>
                  <figure>
                    <blockquote class="blockquote">
                        <p>Wellcome.</p>
                    </blockquote>
                    <div class="blockquote-footer">
                        <cite title="Source Title"><?php echo $user ?></cite>
                    </div>
                    </figure>

                  <!-- <li>
                  <a href="index.php?act=quenmk">Quên mật khẩu</a>
                </li> -->

                <li>
                  <a href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a>
                </li>
                <?php
                if($role==1){
                ?>
                  <li>
                  <a href="../admin/index.php">Đăng nhập Admin</a>
                </li>
                <?php
                }
                ?>
                
                <li>
                  <a href="index.php?act=thoat">Thoát</a>
                </li>
              <?php
              } else {
          
          
              ?>

    <!-- Nội dung đăng nhập -->
    <div class="dangnhap--container col-12">
        <div class="dangnhap--title">ĐĂNG NHẬP</div>
        <div>Nếu bạn có tài khoản, xin vui lòng đăng nhập.</div>
        <form action="?act=dangNhap" method="post" class="col-12">
            <div class="dangnhap--sdt">
                <label for="sdt" class="col-12">Email <span>*</span></label>
                <input type="text" placeholder="Email" id="sdt" name="email" class="col-12 input">
            </div>

            <div class="dangnhap--matkhau">
                <label for="mk" class="col-12">Mật khẩu <span>*</span></label>
                <input type="password" placeholder="Mật khẩu" id="mk" name="pass" class="col-12 input">
            </div>
            <div class="btn--dangnhap center">
                <input type="submit" name="dangNhap" class="btn-primary" value="Đăng nhập">
            </div>
            <div class="dangnhap--dangky">
                Bạn chưa có tài khoản?
               <a href="Dang_ky.html">Đăng ký tại đây</a> 
            </div>
        </form>
    </div>
    <?php 
          } 
          ?>

    <!-- Footer -->

</body>

</html>