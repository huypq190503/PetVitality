<!-- Cắt phần header  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="./view/user/CSS/Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./view/user/CSS/header.css">
</head>
<body>
    <!-- <div class="header">
        <img src="./upload/header.jpg" alt="SunPet">
        <div class="header--overlay"></div>
    </div> -->
    <div class="web--header">
            <div class="web--header--1">
                <div class="header--logo">
                    <img src="./upload/logo_white.png" alt="">
                    <p>PETVITALITY</p>
                </div>
                <div class="header--common">
                    <!-- <div class="header--contact">
                        <div class="header--phone">
                            <i class="fas fa-phone"></i>
                            (+84) 012345678
                        </div>
                        <hr style="margin-top: 10px; margin-bottom: 10px;">
                        <div class="header--email">
                            <i class="fas fa-envelope"></i>
                            sunpet@gmail.com
                        </div>
                    </div> -->
                    <div class="header--cart">
                        <a href="Gio_hang.html">
                            <i class="fas fa-shopping-bag"></i>
                        </a>
                    </div>
                    
                    <div class="btn-group dropdown__hover user--position dropdown">
                        <button class="btn" type="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"><i class="fas fa-user"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-content ">
                            <a class="dropdown-item " href="index.php?act=sign_up" id="dangky">Đăng ký</a>
                        
                            <a class="dropdown-item" href="index.php?act=login" id="dangnhap">Đăng nhập</a>
                            
                            <a class="dropdown-item" href="Xemthongtin.html" id="xemthongtin">Xem thông tin</a>
                           
                            <a class="dropdown-item" href="#" id="dangxuat" onclick="dangXuat()">Đăng xuất</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
</body>
</html>