<?php
            include "./view/_header.php";  
            include "./view/_menu.php";  
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="./view/user/CSS/detail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./view/user/CSS/grid.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./view/user/CSS/Font-awesome/css/all.min.css">
    <!-- <script src="../JS/Giohang_themSP.js"></script> -->
</head>
   
<!-- Trang chi tiết sản phẩm  -->
<div class="app">
    <div class="app__container">
            <div class="grid wide">
                <div class="row sm-gutter ">
                    <div class="col l-5 ">
                        <div class="home-product-item">
                            <div class="item-img">
                                <img src="./upload/<?php echo $sanpham['img'] ?>" class="home-product-item__img" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col l-7 ">
                        <h2 class="home-product-item__name"><?php echo $sanpham['name'] ?></h2>
                        <div class="home-product-item__price">
                            <span class="home-product-item__price-curent"><?php echo number_format($sanpham['price']); ?> VNĐ</span>
                            <!-- <span class="home-product-item__price-old">590.000đ</span> -->
                        </div>
                        <div class="home-product-item__sl">
                            <label class="home-product-item__label"> Số lượng:</label>
                            <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                            <input class="home-product-item__input" value="1" type="number" name="quantity" min="1" />
                            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
                        </div>
                        <div class="home-product-item__sl">
                            <label class="home-product-item__label"> Khối lượng :</label>
                            <input type="radio" name="gioitinh" checked>200kg
                            <input type="radio" name="gioitinh">500kg
                            <input type="radio" name="gioitinh">1kg
                        </div>
                        <div class="home-product-item__buy">
                            <a href="#"><button class="home-product-item__buy btn-mua" onclick="muaNgay()">MUA NGAY</button> </a>
                            <a href="#"><button class="home-product-item__buy btn-them" onclick="them()">THÊM VÀO GIỎ HÀNG</button></a>
                        </div>
                    </div>
                </div>
                <div class="motasp">
                    <div class="home-product-item__mota">
                        <button class="home-product-item__mota btn-mota">MÔ TẢ SẢN PHẨM</button>
                    </div>
                    <div class="text1">
                        <span class="inline">Thành Phần:</span> <br> Sữa bột nguyên kem, Sữa bột gầy, Nondairy creamer, Maltodextrin,Sucrose,Whey protein concentrate,Hương dùng trong thực phẩm,Chất xơ Inulin, Lysine, Nano - Precipitated Calcium Carbonate,Vitamin
                        C, Vitamin K1, Vitamin B6, Vitamin B1, VitaminB2, Vitamin D3, Vitamin A, Vitamin B12, Vitamin Axit Pantothenic, Biotine, Axit Folic... <br>
                    </div>
                    <div class="text1">
                        <span class="inline">Dinh dưỡng:</span> <br> - Canxi nano và vitamin D : Kích thước siêu nhỏ giú hấp thụ tối ưu vào xương, giúp xương và rang chắc khỏe, đặc biệt không tạo ra sỏi thận như thức ăn thông thường. <br> - Vitamin A
                        : Tốt cho mắt và ngăn biến chứng võng mạc. <br> - Biotine : Giúp cho da khỏe mạnh và bộ lông bóng mượt. <br> - Lnulin :chất xơ tự nhiên giúp hệ tiêu hóa khỏe mạnh. <br> - Lysine : Kích thích them ăn. <br> - Folic acid : Hỗ trợ
                        phát triển trí não. <br>
                    </div>
                    <div class="text1">
                        <span class="inline"> Hướng dẫn sử dụng:</span> <br> *Pha với nước ấm khoảng 40 - 50°C <br>

                        <span class="inline">- Mèo con dưới 1 tháng tuổi:</span> Hòa 3 muỗng sữa bột ( khoảng 15gr ) vào 30ml nước ấm, chia thành 4-6 lần, dung bình cho bú hoặc để mèo tự ăn hết trong ngày <br>
                        <span class="inline">- Mèo con từ 1 – 2 tháng tuổi:</span> Hòa 6 muỗng sữa bột (khoảng 30gr) với 60ml nước ấm, chia thành 3-3 lấn ăn trong ngày . <br>
                        <span class="inline">- Mèo trên 2 tháng tuổi:</span> Cho ăn khoảng 2-3 lần/ ngày như bữa phụ xen kẽ với các bữa chính, mỗi lần cho ăn bằng cách hòa 2 muỗng sữa bột (khoảng 10gr) với 20ml nước ấm để tự ăn. <br>
                        <span class="inline">- Mèo đang ốm/ còi/ đang mang thai:</span> cho ăn khoảng 3 lần/ ngày như bữa phụ xen kẽ với các bữa chính, mỗi lần cho ăn bằng cách hòa 2 muỗng sữa bột (khoảng 10gr)
                        <br>
                    </div>
                    <div class="text1">
                        <span class="inline"> Bảo quản:</span> <br> - Nơi khô ráo thoáng mát. <br> - Sữa đã pha, bảo quản trong tủ lạnh được 24h. <br>
                    </div>
                </div>
                <div class="home-product1">
                    <h3 class="prodct-lq">Sản phẩm liên quan</h3>
                    <div class="row sm-gutter">
                        <!-- <h3>Sản phẩm liên quan</h3> -->
                        <!-- Product item -->
                        <!-- <div class="col l-2-4 m-4 c-6">
                            <a class="home-product-item1" href="Detail1.html" target="_self">
                                <div class="home-product-item1__img" style="background-image: url(https://bizweb.dktcdn.net/thumb/large/100/432/370/products/sua-bot-cho-meo-dr-kyan-precaten-anh.jpg?v=1626752115000);">
                                </div>
                                <h4 class="home-product-item1__name">Sữa cho mèo Dr.Kyan Precaten</h4>
                                <div class="home-product-item1__price">
                                    <span class="home-product-item1__price-curent">500.000đ</span>
                                    <span class="home-product-item1__price-old">590.000đ</span>
                                </div>
                            </a>
                        </div> -->

                    </div>
                </div>

                <h3 class="card">Bình luận</h3>

            </div>
        </div>
</div>  
