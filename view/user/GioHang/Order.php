<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt hàng</title>
    <link rel="stylesheet" href="./view/user/CSS/Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./view/user/CSS/Gio_hang.css">
    <link rel="stylesheet" href="./view/user/CSS/Dat_hang.css">
    <link rel="stylesheet" href="./view/user/CSS/header.css">
    <link rel="stylesheet" href="./view/user/CSS/Font-awesome/css/all.min.css">
    <script src="./view/user/JS/datHang.js"></script>
</head>

<body>

<?php 
            if(isset($_SESSION['email']) && (is_array($_SESSION['email']))){
                extract($_SESSION['email']);
                // var_dump($_SESSION['email']);
                // die();
            }else{
                $user ="";
                $tel ="";
                $address ="";

            }    
    ?>
    <!-- Pop up thay đổi thông tin đặt hàng -->
    <div class="pop-up-change" id="pop-up">
        <div class="pop-up-content">
            <div>
                <label for="" class="khachhang--title">THÔNG TIN KHÁCH HÀNG</label>
                <button class="btn--close" onclick="anFormThayDoi()">X</button>
                <div class="form--row">
                    <label for="">Họ tên: </label>
                    <input type="text" value="<?=$user?>" name="user" id="change-hoten">
                </div>
                <div class="form--row">
                    <label for="">Số điện thoại: </label>
                    <input type="text" value="<?=$tel?>" name="tel" id="change-sdt">
                </div>
                <div class="form--row">
                    <label for="">Địa chỉ: </label>
                    <input type="text" value="<?=$address?>" name="address" id="change-diachi">
                </div>
                <div class="form--row">
                    <label for="">Phương thức thanh toán: </label>
                    <label for="">Thanh toán khi giao hàng</label>
                </div>
                <a href="#" class="form--row">
                    <button class="btn--change" >Thay đổi</button>
                </a>
            </div>
        </div>
    </div>
    <!-- Header -->
    <div class="header col-12">
        <img src="./upload/header.jpg" alt="SunPet">
        <a href="index.php">
            <div class="header--overlay"></div>
        </a>
    </div>

    <!-- Nội dung đơn hàng -->
    <div class="donhang--container col-12">
        <div class="row col-12 donhang--title">
            THÔNG TIN ĐƠN HÀNG
        </div>

        <!-- Thông tin khách hàng  -->
        <div class="row col-12 donhang--khachhang1" id="donhang--khachhang1">
            <div class="col-9">
            <div>
                <label for="" class="khachhang--title">THÔNG TIN KHÁCH HÀNG</label>
                <!-- <button class="btn--close" onclick="anFormThayDoi()">X</button> -->
                <div class="form--row">
                    <label for="">Họ tên: </label>
                    <input type="text" value="<?=$user?>" name="user" id="change-hoten">
                </div>
                <div class="form--row">
                    <label for="">Số điện thoại: </label>
                    <input type="text" value="<?=$tel?>" name="tel" id="change-sdt">
                </div>
                <div class="form--row">
                    <label for="">Địa chỉ: </label>
                    <input type="text" value="<?=$address?>" name="address" id="change-diachi">
                </div>
                <div class="form--row">
                    <label for="">Phương thức thanh toán: </label>
                    <input for="" value="Thanh toán khi nhận hàng " ></input>
                </div>
                <!-- <a href="#" class="form--row">
                    <button class="btn--change" >Thay đổi</button>
                </a> -->
            </div>
            </div>
            <div class="col-3 btn--thaydoi">
                <div class="col-12">
                    <button onclick="hienThiFormThayDoi()">Thay đổi</button>
                </div>
            </div>
        </div>




        <!-- Load nội dung từ giỏ hàng -->
        <div class="giohang--bgr col-sm-12 col-md-12 col-lg-12">
            <section class="giohang1 col-md-12 col-lg-12 col-sm-12">
                <div class="title">
                    SẢN PHẨM
                </div>
                <div class="giohang-container">
                    <div class="giohang--head">
                        <div class="col-2">Ảnh sản phẩm</div>
                        <div class="col-4">Tên sản phẩm</div>
                        <div class="col-2">Đơn giá</div>
                        <div class="col-2">Số lượng</div>
                        <div class="col-2">Thành tiền</div>
                    </div>
                    <div id="giohang1">  
                    <?php 
                        $tong =0;
                        $i = 0;
                        foreach ($_SESSION['cart'] as $cart) {
                            $ttien = (int)$cart[2] * $cart[4];
                            $tong += $ttien;
                            // $hinh = $img_path.$cart[3];
                            // var_dump($_SESSION['cart']);
                            // die;
                            echo '
                       
                        <div class="giohang--item">

                            <div class="giohang--anhsp col-2">
                                <img src="'.$cart[3].'" alt="sanpham">
                            </div>

                            <div class="tensp col-4">
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
                            
                        </div>
                        ';
                        $i +=1;
                    }
                    echo '
                    
                </div>
            </div>
            
            <div class="row giohang--pttt">
                <div class="col-4 bold">

                </div>
                <div class="col-lg-4 col-md-4 bold">
                    <div class="tongtien">Tổng tiền: <span id="tongtien1">'.number_format($tong).' VNĐ </div>
                </div>
            </div>
            ';
            ?>

                <div class="row giohang1--footer">
                    <div class="col-lg-12 col-md-12 bold">
                        <button class="btn-tienhanhdathang" onclick="datHang()">Đặt hàng</button>
                    </div>
                </div>
            </section>


        </div>

    </div>

    <!-- Footer -->
 
</body>

</html>