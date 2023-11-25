<!DOCTYPE html>
<html lang="en">
    <?php
        // session_start();
        // ob_start();
    ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="./view/user/CSS/Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./view/user/CSS/Font-awesome/css/all.min.css">
    <link rel="stylesheet" href="./view/user/CSS/Gio_hang.css">
    <link rel="stylesheet" href="./view/user/CSS/header.css">


</head>


    

<body>
    <!-- Header -->
    <a href="index.php">
        <div class="header">
         <img src="./upload/header.jpg" alt="SunPet">
         <div class="header--overlay"></div>
     </div></a>

    <!-- Giỏ hàng -->
    <div class="giohang--bgr" id="dsGioHang">
    <?php
              if (isset($_SESSION['email'])) {
                extract($_SESSION['email'])
              ?>
        <section class="giohang1 col-md-12 col-lg-12 col-sm-12">
            <div class="title">
                GIỎ HÀNG CỦA BẠN
            </div>

            <div class="giohang-container">
                <div class="giohang--head">
                    <div class="col-2">Ảnh sản phẩm</div>
                    <div class="col-3">Tên sản phẩm</div>
                    <div class="col-2">Đơn giá</div>
                    <div class="col-2">Số lượng</div>
                    <div class="col-2">Thành tiền</div>
                    <div class="col-1">Xóa</div>
                </div>
                <!-- List Sp  -->

                <div id="giohang1">  
                    <?php 
                        $tong =0;
                        $i = 0;
                        foreach ($_SESSION['cart'] as $cart) {
                            $ttien = (int)$cart[2] * $cart[4];
                            $tong += $ttien;
                            $xoasp = '<a href ="?act=delCart&idCart='.$i.'" > <button class="far fa-trash-alt btn-xoa"></button> </a>';
                            // $hinh = $img_path.$cart[3];
                            // var_dump($_SESSION['cart']);
                            // die;
                            echo '
                       
                        <div class="giohang--item">

                            <div class="giohang--anhsp col-2">
                                <img src="'.$cart[3].'" alt="sanpham">
                            </div>

                            <div class="tensp col-3">
                                <a href="#">'.$cart[1].'</a><br>
                            </div>

                            <div class="giohang--dongia col-2">
                                <p>'.number_format($cart[2]).' VNĐ</p>
                            </div>

                            <div class="giohang--soluong col-2">
                                <button class="fas fa-minus btn-giam"></button>
                                <span class="soluong">'.$cart[4].'</span>
                                <button class="fas fa-plus btn-tang"></button>
                            </div>

                            <div class="giohang--thanhtien col-2">
                                <p>'. number_format($ttien).' VNĐ</p>
                            </div>
                            
                            <div class="giohang--xoa col-1">'.$xoasp.'</div>
                        </div>
                        ';
                        $i +=1;
                    }
                    echo '
                    
                </div>
            </div>
            
            <div class="row giohang--pttt">
                <div class="col-4 bold">
                    <div>Phương thức thanh toán</div>
                    <form action="?act=order" method="post" class="input--cod " >
                        <input type="radio" value="COD" name ="order" checked> Thanh toán khi giao hàng <br>
                        <input type="radio" value="COD" name ="order"> Thanh toán trực tuyến
                    </form>
                </div>
                <div class="col-lg-4 col-md-4 bold">
                    <div class="tongtien">Tổng tiền: <span id="tongtien1">'.number_format($tong).' VNĐ </div>
                </div>
            </div>
            ';
            ?>


            <div class="row giohang1--footer col-12">
                <div class="col-4 bold">
                    <a href="?act=product">
                        <button class="btn-tieptucmuahang">Tiếp tục mua hàng</button>
                    </a>
                </div>
                <div class="col-4 bold">
                    <a href="?act=order">
                        <button name="order" class="btn-tienhanhdathang">Tiến hành đặt hàng</button>
                    </a>
                </div>
            </div>
            
        </section>


    </div>

    <!-- Footer -->
    <!-- <div class="frame--footer--container">
        <iframe src="Footer.html" frameborder="0" class="frame--footer" scrolling="no"></iframe>
    </div> -->

    <?php
              } else {
                echo "Vui lòng" ."<a href='?act=login' style='color : red' > đăng nhập </a>". "để hiện giỏ hàng !!";

              }
?>

</body>

</html>