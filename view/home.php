<!-- Trang hiển thị sản phẩm khi vào trang  -->
    <?php
            include "./view/_header.php";  
            include "./view/_menu.php";  
    ?>

<style>
    .image{
    position: relative;
    overflow: hidden;
}
.image:hover .text{
    bottom: 0;
}

.images img{
    width: 100%;
    
}

 
.text{
    padding-top: 15px;
    text-align: center;
    position: absolute;
    bottom: -160px;
    transition: 0.5s ease-in-out;
    background-color: white;
    width: 100%;

}

.text a{
    color: #000;
    font-size: 24px;
    text-decoration: none;
}

.text a:hover{
    color: #ffa800;
}
.price{
    font-size: 20px;
    padding: 25px 0;
}

a.book{
    font-size: 20px;
    display: block;
    padding: 10px 0;
    /* background-color: #000; */
    color: white;
}

.images{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr ;
    gap: 30px;


}
.themgh{
    color: red;
}
</style>

<div class="web--container">
        <!-- banner 1 -->
        <?php
            include "./view/_slider.php";              
            ?>
        <!-- <div class="web--banner">
            <img src="./upload/banner1.png" alt="">
        </div> -->
        <!-- chúng tôi có gì cho thú cưng? -->
        <div class="web--dogcat">
            <div class="web--content">
                <p>Chúng tôi có gì cho thú cưng của bạn</p>
            </div>
            <div class="web--dogcat--detail">
                <div class="web--dog">
                    <img src="./upload/dogava.jpg" class="rounded-circle" alt="">
                    <p><a href="../HTML/Product.html">Dành cho chó cưng</a></p>
                </div>
                <div class="web--cat">
                    <img src="./upload/catava.jpg" class="rounded-circle" alt="">
                    <p><a href="../HTML/Product.html">Dành cho mèo yêu</a></p>
                </div>
            </div>
        </div>
        <!-- Sản phẩm nổi bật -->
        <div class="web--special">
            <p>SẢN PHẨM NỔI BẬT</p>
            <div class="web--special--block justify-content-center ">
                <div class="special--product--item images">
                <?php foreach($loadSanPhamNoiBat as $value): ?>
                    <div class="special--product--detail image">
                    <img src="./upload/<?php echo $value['img']; ?>" alt="">

                    <section class="text">
                        <a href="?act=chiTietSanPham&idsp=<?php echo $value['id']?>">
                        <?php echo $value['name']; ?></a>
                        <section class="price">
                        Giá : <?php echo number_format($value['price']); ?> VNĐ
                        </section>
                        <input type="submit" class="book" 
                        data-id ="<?php echo $value['id']?>"
                        onclick="addToCart(<?php echo $value['id']?>,'<?php echo $value['name']?>',<?php echo $value['price']?>)"
                        style="color:orangered" value="THÊM VÀO GIỎ HÀNG"></input>
                    </section>
                    </div>
                
                <?php endforeach; ?>
                </div>

            </div>
        </div>
        <!-- bé yêu ăn gì -->
        <div class="web--eatwhat">
            <div class="web--eatwhat--content">
                <p>BÉ YÊU ĂN GÌ?</p>
            </div>
            <div class="web--eatdogcat">
                <!-- In sản phẩm danh mục chó  -->
                <div class="web--eatdog">
                    <div class="web--eatdog--block">
                        <p>Chó</p>
                    </div>
                    <div class="web--eatdog--detail1 ">
                        <?php foreach($loadSanPhamDanhMucCho as $value): ?>
                        
                        <div class="special--product--detail1">
                            <div class="special--product--img">
                                <img src="./upload/<?php echo $value['img']; ?>" alt="">
                            </div>
                            <a href="?act=chiTietSanPham&idsp=<?php echo $value['id']?>">
                            <div class="special--product--name">
                                <p><?php echo $value['name']; ?></p>
                            </div>
                            </a>    
                            <div class="special--product--price justify-content-center">
                                <p>Giá : <?php echo number_format($value['price']); ?> VNĐ</p>
                            </div>
                            <input type="submit" class="book" 
                        data-id ="<?php echo $value['id']?>"
                        onclick="addToCart(<?php echo $value['id']?>,'<?php echo $value['name']?>',<?php echo $value['price']?>)"
                        style="color:orangered" value="THÊM VÀO GIỎ HÀNG"></input>
                        </div>
                   


                        <?php endforeach; ?>        
                    </div>
                </div>
                <!-- In sản phẩm danh mục mèo  -->
                <div class="web--eatcat ">
                    <div class="web--eatcat--block">
                        <p>Mèo</p>
                    </div>
                    <div class="web--eatcat--detail1 col-">
                    <?php foreach($loadSanPhamDanhMucMeo as $value): ?>
                       
                        <div class="special--product--detail1">
                            <div class="special--product--img">
                                <img src="./upload/<?php echo $value['img']; ?>" alt="">
                            </div>
                            <a href="?act=chiTietSanPham&idsp=<?php echo $value['id']?>">
                            <div class="special--product--name">
                                <p><?php echo $value['name']; ?></p>
                            </div></a>
                            <div class="special--product--price justify-content-center">
                                <p>Giá : <?php echo number_format($value['price']); ?> VNĐ</p>
                            </div>
                            <input type="submit" class="book" 
                        data-id ="<?php echo $value['id']?>"
                        onclick="addToCart(<?php echo $value['id']?>,'<?php echo $value['name']?>',<?php echo $value['price']?>)"
                        style="color:orangered" value="THÊM VÀO GIỎ HÀNG"></input>
                        </div>
                    
                        <?php endforeach; ?>        
                    </div>
                </div>
            </div>
            <div class="button--more">
                <button type="button" class="web__button--eatdogcat" name="more"><a href="?act=product">XEM
                        THÊM</a></button>
            </div>
        </div>
        <!-- Footer -->
        <div class="web--discount">
            <img src="./upload/discount.png" alt="">
        </div>
        </div>
        <script src="https://uhchat.net/code.php?f=69535a"></script>

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