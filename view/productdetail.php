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
<style>
.co-black{
    color:black;
}
span{
    color:red;
}
</style>
<body>

        <div class="app">
        <div class="app__container">
            <div class="grid wide">
                <div class="row sm-gutter ">
                    <div class="col l-5 ">
                        <div class="home-product-item">     
                            <div class="item-img">
                                <img  src="./upload/<?= $list_ctsp[0]['img'];?>" class="home-product-item__img" alt="">
                            </div>
                            <div class="item-dt">
                                <img src="./upload/<?= $list_ctsp[0]['img'];?>" class="item-dt-1" alt="">

                                <img src="./upload/<?= $list_ctsp[0]['img'];?>" class="item-dt-1" alt="">
        
                                <img src="./upload/<?= $list_ctsp[0]['img'];?>" class="item-dt-1" alt="">
        
                                <img src="./upload/<?= $list_ctsp[0]['img'];?>" class="item-dt-1" alt="">
                            </div>
                        </div>
                        </div>
                        <div class="col l-7 ">
                                <h2 class="home-product-item__name"><?= $list_ctsp[0]['name_sp']; ?></h2>
                            <div class="home-product-item__price">
                                <span class="home-product-item__price-curent"><?= $list_ctsp[0]['price']; ?></span>
                                <span class="home-product-item__price-old">590.000đ</span>
                            </div>
                        <form action="?act=addToCart" method="post" >
                            <div class="home-product-item__sl">
                                <label class="home-product-item__label"> Số lượng:</label>
                                <input  class="home-product-item__input co-black" value="<?= $list_ctsp[0]['quantity'];?>" type="number" id="quantity" name="quantity" min="1" />
                            </div>
                            <?php if(isset($nofi)&& ($nofi)!=""){
                                    echo "<style='color:red'>$nofi</style>" ;
                                }?>
                            <div class="home-product-item__sl">
                            <label class="home-product-item__label"> Khối lượng :</label> 
                               <select style="color:black;" name="" id="">
                                <?php foreach($list_ctsp as $weight): ?> 
                                    <option  class="co-black" value="<?php $weight['id_ctsp'] ?>"><?= $weight['weight']; ?></option>
                                <?php endforeach?>
                            </select>
                            </div>
                            <div class="home-product-item__sl">
                            <label class="home-product-item__label"> Loại :</label>
                                <select style="color:black;" name="" id=""> 
                                <?php foreach($list_ctsp as $genre): ?> 
                                    <option  class="co-black" value="<?php $genre['id_ctsp'] ?>"><?= $genre['genre']; ?></option>
                                <?php endforeach?>
                                </select> 
                            </div>
                          
                                <div class="home-product-item__buy">
                            <input type="hidden" name="id_sp" value="<?php echo $list_ctsp[0]['id_sp']?>">
                            <input type="hidden" name="name_sp" value="<?php echo $list_ctsp[0]['name_sp']?>">
                            <input type="hidden" name="price" value="<?php echo ($list_ctsp[0]['price']) ?>">
                            <input type="hidden" name="weight" value="<?php echo $weight['weight']; ?>">
                            <input type="hidden" name="genre" value="<?php echo $genre['genre'];?>">
                            <input type="hidden" name="img" value="./upload/<?php echo $list_ctsp[0]['img']?>">
                            <a href="#"><button class="home-product-item__buy btn-mua" >MUA NGAY</button> </a>
                            <input type="submit" name="addCart" class="home-product-item__buy btn-them" value="THÊM VÀO GIỎ HÀNG" ></input>
                            <!-- <a href="#"><button class="home-product-item__buy btn-them" name="addCart" >THÊM VÀO GIỎ HÀNG</button></a> -->
                                </div>
                        </form>
                        </div>
                    </div>
                    <div class="motasp">
                        <?php $list_ctsp[0]['description'];?>
                    </div>
                    
                <div class="home-product1">
                    <h3 class="prodct-lq">Sản phẩm liên quan</h3>
                    <div class="row sm-gutter">
                        <!-- <h3>Sản phẩm liên quan</h3> -->
                        <div class="col l-2-4 m-4 c-6">
                            <!-- Product item -->
                            <!-- <a class="home-product-item1" href="Detail1.html" target="_self">
                                <div class="home-product-item1__img" style="background-image: url(https://bizweb.dktcdn.net/thumb/large/100/432/370/products/sua-bot-cho-meo-dr-kyan-precaten-anh.jpg?v=1626752115000);">
                                </div>
                                <h4 class="home-product-item1__name">Sữa cho mèo Dr.Kyan Precaten</h4>
                                <div class="home-product-item1__price">
                                    <span class="home-product-item1__price-curent">500.000đ</span>
                                    <span class="home-product-item1__price-old">590.000đ</span>
                                </div>
                            </a> -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <h1>Bình luận</h1>
                            
    </div>
    <?php include "./view/_footer.php";?>
</body>
</html>
<script>
    const addCart=document.querySelector('addCart');
    console.log(addCart);
</script>
