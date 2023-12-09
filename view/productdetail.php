
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
    <link rel="stylesheet" href="./view/user/CSS/productdetail.css">
    <!-- <script src="../JS/Giohang_themSP.js"></script> -->
</head>
<script>


</script>
<body>
    <a href="index.php">
        <div class="header">
         <img src="./upload/header.jpg" alt="SunPet">
         <div class="header--overlay"></div>
     </div></a>
        <div class="app">
        <div class="app__container">
            <div class="grid wide">
                <div class="row sm-gutter ">
                    <div class="col l-5 ">
                        <div class="home-product-item">     
                                <div class="item-img">
                                    <img  src="./upload/<?= $product[0]['img'];?>" class="home-product-item__img" alt="">
                                </div>
                        </div>
                    </div>
                    <div class="col l-7 ">
                        <h2 class="home-product-item__name"><?= $product[0]['name'] ?></h2>
                        <div class="home-product-item__price">
                            <span class="home-product-item__price-curent"><?= number_format($product[0]['price']); ?> VNĐ</span>
                            <!-- <span class="home-product-item__price-old">590.000đ</span> -->
                        </div>
                        <div class="home-product-item__sl">
                            <label class="home-product-item__label"> Số lượng </label>
                            <input class="home-product-item__input" value="1" type="number" id="quantity" name="quantity"/>
                        </div>
                        
                        <div class="home-product-item__sl">                    
                            <label class="home-product-item__label"> Khối lượng :</label>
                            <?php
                                $number = 1; 
                                foreach ($listweight as $weight):
                                    $uniqueID = "weight_" . $number; 
                                ?>
                                    <button id="<?= $uniqueID ?>" data-php-value="<?= $weight ?>"><?php echo $weight; ?></button>
                                    <script>
                                        document.getElementById("<?= $uniqueID ?>").addEventListener("click", function(){
                                            var productWeight = parseInt(this.getAttribute("data-php-value"));
                                            console.log(productWeight);
                                            window.productWeightForAddToCart = productWeight;
                                        });
                                    </script>
                                <?php
                                    $number++; 
                                endforeach;
                            ?>
                        </div>

                        <div class="home-product-item__sl">                    
                            <label class="home-product-item__label">Loại :</label>
                            <?php
                                $number = 1; 
                                foreach ($listgenre as $genre):
                                    $uniqueID = "genre_" . $number; 
                                ?>
                                    <button id="<?= $uniqueID ?>" data-php-value="<?= $genre ?>"><?php echo $genre; ?></button>
                                    <script>
                                        document.getElementById("<?= $uniqueID ?>").addEventListener("click", function(){
                                            var productGenre = this.getAttribute("data-php-value");
                                            console.log(productGenre);
                                            window.productGenreForAddToCart = productGenre;
                                        });
                                    </script>
                                <?php
                                    $number++; 
                                endforeach;
                            ?>

                        <div class="home-product-item__buy">   
                        <button data-id="<?= $product[0]['id'] ?>"
                            onclick="addToCart(<?= $product[0]['id'] ?>, '<?= $product[0]['name'] ?>', <?= $product[0]['price'] ?>)"
                            name="addToCart" class="home-product-item__buy btn-them">THÊM VÀO GIỎ HÀNG</button>
                        </div>
                       

                    </div>
                </div>
                    <div class="motasp">
                        <?=$product[0]['description']?>
                    </div>
                </div>
                <div class="home-product1">
                    <h3 class="prodct-lq">Sản phẩm liên quan</h3>
                    <div class="row sm-gutter">
                        <?php foreach($ditto_product as $product):?>
                            <div class="col l-2-4 m-4 c-6">
                                <a class="home-product-item1" href="?act=productdetail&id_sp=<?php echo $product['id']?>" target="_self">
                                    <div class="home-product-item1__img" style="background-image: url(./upload/<?php echo $product['img']; ?>);">
                                    </div>
                                    <h4 class="home-product-item1__name"><?php echo $product['name']; ?></h4>
                                    <div class="home-product-item1__price">
                                        <span class="home-product-item1__price-curent"><?php echo number_format($product['price']); ?>VND</span>
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
                                <form action="?act=productdetail&id_sp=<?php echo $product[0]['id']; ?>" method="POST">
                                    <input type="hidden" name="idpro" value="<?php echo  $product[0]['id']; ?>">
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
    <?php include "./view/_footer.php";?>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>

    function addToCart(productId, productName, productPrice,productQuantity,productWeight,productGenre){
        var productQuantity = parseInt(document.getElementById("quantity").value);
        var productWeight=window.productWeightForAddToCart;
        var productGenre=window.productGenreForAddToCart;
        // console.log(productId, productName, productPrice,productQuantity,productWeight,productGenre);
        // Sử dụng jQuery 
        
        $.ajax({
            type: "POST",
            // Đường dẫn tới tệp PHP xử lí dữ liệu 
            url:'./view/Cart/addToCart.php',
            data: {
                id : productId,
                name : productName,
                price : productPrice,
                quantity: productQuantity,
                weight: productWeight,
                genre: productGenre
            },
            success:function(response){
                alert('Bạn đã thêm sản phẩm vào giỏ hàng thành công !! ');

            },
            error:function(error){
                console.log(error);
            }
        });
    }
    
</script>
