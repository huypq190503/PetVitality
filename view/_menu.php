<!-- Cắt phần menu  -->
<nav class="navbar navbar-expand-md sticky-top">
            <!-- sticky top dán chặt ở trên, na..md thì từ kích thước medium trở lên thì nó sẽ expand ra -->
            <div class="container-fluid">
                <!-- container-fluid là sẽ chiếm toàn bộ chiều ngang -->
                <div class="nav" data-target="collapse">
                    <nav class="nav__pc">
                        <ul class="navbar-nav ml-auto">
                            <!-- cho phép hiện các cái đường link khi co trang mình vào-->
                            <!-- ml auto là auto margin left -->
                            <li class="nav-item">
                                <!-- nav-item quy định màu là màu xanh, flex 1, mỗi item cách ra một khoảng -->
                                <a class="nav-link" href="index.php">TRANG CHỦ</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="Contact.html" class="nav-link">LIÊN HỆ</a>
                            </li> -->
                            <li class="nav-item">
                                <a href="Product.html" class="nav-link">SẢN PHẨM</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="Blog_Trangchu.html" class="nav-link">BLOG</i></a>
                            </li> -->

                        </ul>
                    </nav>
                    <label for="nav--input" class="nav__bars-btn">
                        <i class="fas fa-bars"></i>
                    </label>

                    <input type="checkbox" class="nav__input" name="" id="nav--input">

                    <label for="nav--input" class="navbar--overlay"></label>
                    <nav for="nav--input" class="nav--bar">
                        <label for="nav--input" class="nav--bar--close">
                            <i class="fas fa-times"></i>
                        </label>
                        <ul class="nav__list">
                            <li>
                                <a class="nav--link" href="#"><i class="fas fa-home"></i>TRANG CHỦ </a>
                            </li>
                            <li>
                                <a href="Contact.html" class="nav--link"><i class="fas fa-phone"></i> LIÊN HỆ </a>
                            </li>
                            <li>
                                <a href="Product.html" class="nav--link"><i class="fas fa-dolly"></i>SẢN PHẨM </a>
                            </li>
                            <li>
                                <a href="Blog_Trangchu.html" class="nav--link"><i class="fas fa-newspaper"></i>BLOG</a>
                            </li>

                        </ul>
                    </nav>
                </div>

                <!-- search -->
                <div class="search--bar">
                    <input type="text" value="" name="search" id="search" placeholder="Bạn muốn tìm gì?" autocomplete="off"
                        class="search--input">
                    <button type="button" class="search--button" onclick="timKiemSanPham()"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </nav>