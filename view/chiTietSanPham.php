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
                            <label class="home-product-item__label"> Số lượng sản phẩm còn :</label>
                            <input class="home-product-item__input" value="1" type="button" id="quantity" name="quantity" readonly />

                        </div>
                        
                        <div class="home-product-item__sl">
                            <label class="home-product-item__label"> Khối lượng :</label>
                            <input type="radio" name="weight" id="" >200g</input>
                            <input type="radio" name="weight" id="">500g</input>
                            <input type="radio" name="weight" id="">1kg</input>


                        </div>

                        <!-- <form action="?act=addToCart" method="post" > -->
                        <div class="home-product-item__buy">
                            <input type="hidden" name="idsp" value="<?php echo $sanpham['id']?>">
                            <input type="hidden" name="name" value="<?php echo $sanpham['name']?>">
                            <input type="hidden" name="price" value="<?php echo ($sanpham['price']) ?>">
                            <input type="hidden" name="img" value="./upload/<?php echo $sanpham['img']?>">
                            <!-- <a href="#"><button class="home-product-item__buy btn-mua" >MUA NGAY</button> </a> -->
                            <input type="submit" data-id ="<?php echo $value['id']?>"
                            onclick="addToCart(<?php echo $sanpham['id']?>,'<?php echo $sanpham['name']?>',<?php echo $sanpham['price']?>)"
                            name="addToCart" class="home-product-item__buy btn-them" 
                            value="THÊM VÀO GIỎ HÀNG" ></input>
                            <!-- <a href="#"><button class="home-product-item__buy btn-them" name="addCart" >THÊM VÀO GIỎ HÀNG</button></a> -->
                        </div>
                        <!-- </form> -->

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
                    <?php foreach($sanpham_lq as $product):?>
                        <div class="col l-2-4 m-4 c-6">
                            <a class="home-product-item1" href="?act=productdetail&idsp=<?php echo $product['id']?>" target="_self">
                                <div class="home-product-item1__img" style="background-image: url(./upload/<?php echo $product['img']; ?>);">
                                </div>
                                <h4 class="home-product-item1__name"><?php echo $product['name']; ?></h4>
                                <div class="home-product-item1__price">
                                    <span class="home-product-item1__price-curent"><?php echo number_format($product['price']); ?>VNDđ</span>
                                    <!-- <span class="home-product-item1__price-old">590.000đ</span> -->
                                </div>
                            </a>
                        </div>
                        <?php endforeach;?>


                    </div>
                </div>

                   <!-- Bình luận -->
                <table class="table">
                <div class="card-header" style="font-size: 2rem;" >Bình luận</div>
                <tr>
                    <th scope="col">Nội dung</th>
                    <th scope="col">User</th>
                    <th scope="col">Day</th>
                    </tr>
                <tbody>
                <?php foreach($binhluan as $value): ?>

                    

                    <tr>
                        <td><?php echo $value['noidung']?></td>
                        <td><?php echo $value['user']?></td>
                        <td><?php echo date("d/m/Y", strtotime($value['ngaybinhluan'])) ?></td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
                </table>

                    <!-- Thêm bình luận -->
                        <!-- Kiểm tra đã đăng nhập chưa  -->
                            <?php
                            if (isset($_SESSION['email'])) {
                                extract($_SESSION['email'])
                            ?>
                            
                        <div class="box_search">
                                <form action="?act=chiTietSanPham&idsp=<?php echo $sanpham['id']; ?>" method="POST">
                                    <input type="hidden" name="idpro" value="<?php echo $sanpham['id']; ?>">
                                    <input type="hidden" name="user" value="<?php echo $id; ?>">
                                    <input type="text" name="noidung">
                                    <input type="submit" name="guibinhluan" value="Gửi bình luận">
                                </form>
                            </div>
                            <?php
                            } else {
                                echo "Vui lòng"." <a href='?act=login' style='color:red !important ;'> đăng nhập</a>"." để bình luận";
                            }
                ?>


            </div>
        </div>
</div>  


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>

    let totalProduct = document.getElementById('totalProduct');
                

    function addToCart(productId, productName, productPrice){
        console.log(productId, productName, productPrice);
        // Sử dụng jQuery 
        $.ajax({
            type: "POST",
            // Đường dẫn tới tệp PHP xử lí dữ liệu 
            url:'./view/GioHang/addToCart.php',
            data: {
                id : productId,
                name : productName,
                price : productPrice
            },
            success:function(response){
                totalProduct.innerText = response;
                alert('Bạn đã thêm sản phẩm vào giỏ hàng thành công !!');
            },
            error:function(error){
                console.log(error);
            }

        });

    }

</script>
