<!-- Trang hiển thị sản phẩm khi vào trang  -->
    <?php
            include "./view/_header.php";  
            include "./view/_menu.php";  
    ?>

<div class="web--container">
        <!-- banner 1 -->
        <div class="web--banner">
            <img src="./upload/banner1.png" alt="">
        </div>
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
            <div class="web--special--block justify-content-center">
                <div class="special--product--item">
                    <a href="../HTML_Chitiet_sanpham/Detail1.html"><div class="special--product--detail">
                        <div class="special--product--img">
                            <img src="./upload/1-1.jpg" alt="">
                        </div>
                        <div class="special--product--name">
                            <p>Sữa bột cho mèo 110g Dr.Kyan Precaten</p>
                        </div>
                        <div class="special--product--price justify-content-center">
                            <p>Giá: 500.000đ</p>
                        </div>
                    </div></a>
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
                        <p>Chó cưng</p>
                    </div>
                    <div class="web--eatdog--detail1 ">
                        <?php foreach($loadSanPhamDanhMucCho as $value): ?>
                        <a href="?act=chiTietSanPham&idsp=<?php echo $value['id']?>">
                        <div class="special--product--detail1">
                            <div class="special--product--img">
                                <img src="./upload/<?php echo $value['img']; ?>" alt="">
                            </div>
                            <div class="special--product--name">
                                <p><?php echo $value['name']; ?></p>
                            </div>
                            <div class="special--product--price justify-content-center">
                                <p>Giá : <?php echo number_format($value['price']); ?> VNĐ</p>
                            </div>
                        </div></a>


                        <?php endforeach; ?>        
                    </div>
                </div>
                <!-- In sản phẩm danh mục mèo  -->
                <div class="web--eatcat ">
                    <div class="web--eatcat--block">
                        <p>Mèo yêu</p>
                    </div>
                    <div class="web--eatcat--detail1 col-">
                    <?php foreach($loadSanPhamDanhMucMeo as $value): ?>
                        <a href="?act=chiTietSanPham&idsp=<?php echo $value['id']?>"><div class="special--product--detail1">
                            <div class="special--product--img">
                                <img src="./upload/<?php echo $value['img']; ?>" alt="">
                            </div>
                            <div class="special--product--name">
                                <p><?php echo $value['name']; ?></p>
                            </div>
                            <div class="special--product--price justify-content-center">
                                <p>Giá : <?php echo number_format($value['price']); ?> VNĐ</p>
                            </div>
                        </div></a>
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