<!-- Trang hiển thị sản phẩm khi vào trang  -->
    <?php
            include "./view/_header.php";  
            include "./view/_menu.php";  
    ?>


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
                        <?php ?>
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
                <div class="web--eatdog">
                    <div class="web--eatdog--block">
                        <p>CHÓ CƯNG</p>
                    </div>
                    <div class="web--eatdog--detail1">
                        <a href="../HTML_Chitiet_sanpham/Detail17.html"><div class="special--product--detail1">
                            <div class="special--product--img">
                                <img src="./upload/17.1.png" alt="">
                            </div>
                            <div class="special--product--name">
                                <p>Thức ăn cao cấp dành cho chó FIBs</p>
                            </div>
                            <div class="special--product--price justify-content-center">
                                <p>Giá: 199.000đ</p>

                            </div>
                        </div></a>
                    </div>
                </div>
                <div class="web--eatcat ">
                    <div class="web--eatcat--block">
                        <p>MÈO YÊU</p>
                    </div>
                    <div class="web--eatcat--detail1 col-">
                        <a href="../HTML_Chitiet_sanpham/Detail1.html"><div class="special--product--detail1">
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
            <div class="button--more">
                <button type="button" class="web__button--eatdogcat" name="more"><a href="../HTML/Product.html">XEM
                        THÊM</a></button>
            </div>
        </div>
        <!-- Footer -->
        <div class="web--discount">
            <img src="./upload/discount.png" alt="">
        </div>
        <?php include "./view/_footer.php";?>