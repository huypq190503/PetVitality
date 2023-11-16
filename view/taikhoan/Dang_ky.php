<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="../CSS/Dang_ky.css">
    <link rel="stylesheet" href="../CSS/Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/Font-awesome/css/all.min.css">
    <script src="../JS/dangKy - dangNhap.js"></script>
</head>
<body>
    <!-- Header -->
    <div class="frame--header--container">
        <iframe src="Header.html" frameborder="0" class="frame--header" scrolling="no"></iframe>
    </div>
    <!-- Nội dung đăng nhập -->
    <div>
        <div>
        <div>  
            <div class="boxtitle">ĐĂNG KÝ THÀNH VIÊN</div>
                <div>
                    <form action="index.php?act=dangky" method="POST">
                        <div>
                            Email
                            <input type="email" name="email">
                        </div>
                        <div>
                            Tên đăng nhập 
                            <input type="text" name="user">
                        </div>
                        <div>
                            Mật khẩu 
                            <input type="password" name="pass">
                        </div>
                        <div>
                            <input type="submit" name="dangky" value="ĐĂNG KÝ">
                            <input type="reset" value="NHẬP LẠI">
                        </div>
                    </form>  
                    <h2>
                    <?php
                        if(isset($thongbao)&&($thongbao!="")){
                            echo $thongbao;
                        }
                    ?> 
                    </h2> 
            </div>
        </div>
            
        </div>
    </div>
    <!-- Nội dung footer -->
    <div class="frame--footer--container">
        <iframe src="Footer.html" frameborder="0" class="frame--footer" scrolling="no"></iframe>
    </div>
</body>
</html>