<!-- Cắt phần header  -->
<?php 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet</title>
    <link rel="stylesheet" href="./view/user/CSS/Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./view/user/CSS/header.css">
    <style>
    .error {
      color: red;
      font-weight: bold;
    }

    .success {
      color: green;
      font-weight: bold;
    }
  </style>
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
                        <?php
                        if (isset($_SESSION['email'])) {
                            // extract() để trích xuất các phần tử trong mảng $_SESSION['email'] thành các biến độc lập.
                            extract($_SESSION['email'])
                        ?><cite class="text-center" title="Source Title"><p>Welcome : <?php echo $user ?></p></cite>
                         <li><a class="dropdown-item" href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a></li>                       
                        <?php if($role==1){
                        ?>
                        <li><a class="dropdown-item" href="./admin/index.php">Đăng nhập Admin</a></li>
                        <?php
                        }
                        ?><li><a class="dropdown-item" href="index.php?act=log_out">Thoát</a></li>
                    <?php
                    } else {
                    ?>  
                            <a class="dropdown-item " href="index.php?act=sign_up" id="dangky">Đăng ký</a>
                        
                            <a class="dropdown-item" href="index.php?act=login" id="dangnhap">Đăng nhập</a>
                            
                            <!-- <a class="dropdown-item" href="Xemthongtin.html" id="xemthongtin">Xem thông tin</a> -->
                           
                            <!-- <a class="dropdown-item" href="#" id="dangxuat" onclick="dangXuat()">Đăng xuất</a> -->
                        </div>
                        <?php 
          } 
          ?>
                    </div>
                </div>
            </div>
        </div>
   
</body>
</html>