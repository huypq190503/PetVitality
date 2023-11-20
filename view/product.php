<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./view/user/CSS/Product.css">
    <link rel="stylesheet" href="./view/user/CSS/grid.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./view/user/CSS/Font-awesome/css/all.min.css">
    <title>Sản phẩm</title>

</head>

<body>
    <div class="app">
       
        <div class="app__container">
            <div class="grid-wide">
                <div class="search">
                    <input type="text" placeholder="Bạn muốn tìm sản phẩm gì?" id="search_text">
                    <label class="fas fa-search"></label>
                </div>
                <div class="row sm-gutter app__content">
                    <div class="col l-2 m-3 c-0">
                        <nav class="category">
                            <h3 class="category__heading">
                                <i class="category__heading-icon fas fa-list"></i> DANH MỤC
                            </h3>
                            <ul class="category-list">
                                <li class="category-item" id="category-item">
                                    <a href="HOME.html" class="category-item__link">Trang chủ</a>
                                </li>
                                <li class="category-item category-item--active">
                                    <a href="#category-item" class="category-item__link" id="sanpham-category">Sản phẩm
                                    </a>
                                    <li class="category-item category-item-1">
                                        <a href="#category-item" class="category-item__link" id="category--thucanchocho">Thức ăn cho
                                        chó</a>
                                    </li>
                                    <li class="category-item category-item-1">
                                        <a href="#category-item" class="category-item__link" id="category--thucanchomeo" >Thức ăn cho mèo</a>
                                    </li>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="col l-10 m-9 c-12">
                        <h3 class="category__heading">TẤT CẢ SẢN PHẨM</h3>
                        <div class="home-filter">
                            <div class="select-input">
                                <span class="select-input__label">Sắp xếp theo</span>
                                <i class="select-input__icon fas fa-angle-down"></i>
                                <!-- List options -->
                                <ul class="select-input__list">
                                    <li class="select-input__item">
                                        <a href="#category-item" class="select-input__link tangdan" id="tangdan">Giá: tăng dần</a>
                                    </li>
                                    <li class="select-input__item">
                                        <a href="#category-item" class="select-input__link" id="giamdan">Giá: giảm
                                            dần</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Grid -> Row -> Column -->
                        <div class="home-product dsSanPham1">
                            <div class="row" id="dsSanPham1">
                            </div>
                        </div>
                        <div class="home-product dsSanPham2">
                            <div class="row" id="dsSanPham2">
                            </div>
                        </div>
                        <ul class="pagination home-product__pagination">

                            <li class="pagination-item pagination-item--active">
                                <a href="#category-item" class="pagination-item__link " id="page-1">1</a>
                            </li>
                            <li class="pagination-item">
                                <a href="#category-item" class="pagination-item__link " id="page-2">2</a>
                            </li>
                            <!-- <li class="pagination-item">
                                <a href="#category-item" class="pagination-item__link " id="page-3">3</a>
                            </li> -->
                            <li class="pagination-item">
                                <span href="#category-item" class="pagination-item__link ">
                                    <i class="pagination-item_icon fas fa-angle-right" id="next"></i>
                                </span>
                            </li>
                        </ul>
                        <div class="xemthem" id="xemthem">
                            <div id="more" onclick="xemThem()">
                                <span>
                                    Xem thêm <i class="select-input__icon fas fa-angle-down"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  

        </div>


    </div>

</body>

</html>