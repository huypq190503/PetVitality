
<div class="col-md-12">
        <h2>DANH SÁCH LOẠI HÀNG HÓA</h2>
    <br>
    <form class="mb-3" action="index.php?act=listsp" method="POST">
        <a href="?act=addsp" class="btn btn-success">Thêm mới</a>
        <input type="text" name="kyw" id="" placeholder="Nhập sản phẩm cần tìm" >
        <select name="iddm" id="">
            <option value="0" selected>Tất cả</option>
            <?php
                foreach($listdanhmuc as $danhmuc){
                    extract($danhmuc);
                    echo '<option value="'.$id.'">'.$name.'</option>';
                }
            ?>   
        </select>
        <input type="submit" name="listok" value="TÌM">
    </form>
<<<<<<< HEAD
        <div>
            <div>        
            <table class="table table-bordered border-primary">
                <tr>
                    <th></th>
                    <th>MÃ SẢN PHẨM</th>
                    <th>TÊN SẢN PHẨM</th>
                    <th>ẢNH</th>
                    <th>Giá</th>
                    <th></th>
                </tr>
                <?php
                    foreach($listsanpham as $key => $sanpham){
                        extract($sanpham);
                        $suasp="index.php?act=suasp&id=".$id;
                        $xoasp="index.php?act=xoasp&id=".$id;
                        $anhpath="../upload/".$img;
                        if(is_file($anhpath)){
                            $anh="<img src='".$anhpath."' height='80'>";
                        }else{
                            $anh="no photo";
                        }

                        echo '<tr>
                                <td><input type="checkbox" id="chon"></td>
                                <input type="hidden" value="'.$id.'" >
                                <td>'.$key + 1 .'</td>
                                <td>'.$name.'</td>
                                <td>'.$anh.'</td>
                                <td>'.$price.'</td>
                                <td><a href="'.$suasp.'"><input type="button" value="Sửa"></a> <a href="'.$xoasp.'"><input type="button" value="Xóa"></a></td>
                            </tr>';
                    }
                ?>
=======

        <table class="table">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá sản phẩm</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
                <?php foreach($listsanpham as $key => $sanpham): ?>
            <tr>
                <th scope="row">
                    <?php echo $key + 1; ?>
                </th>
                <td>
                    <?php echo $sanpham['name']; ?>
                </td>
                <td>
                    <?php echo $sanpham['price']; ?>
                </td>
                <td>
                    <?php if($sanpham['img'] != "" && $sanpham['img'] != null):?>
                    <img width="100" src="<?php echo "../upload/" . $sanpham['img']; ?>" alt="">
                    <?php endif; ?>
                </td>
                <td>
                    <?php echo $sanpham['tendm']; ?>
                </td>
                <td>
                    <a href="?act=suasp&id=<?php echo $sanpham['id']; ?>" class="btn btn-warning">Sửa</a>
                    <a class="btn btn-danger" 
                    onclick="return confirm('bạn có muốn xóa không')" href="?act=xoasp&id=<?php echo $sanpham['id']; ?>" 
                    >
                        Xóa
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>


        </tbody>            
>>>>>>> a4c39f24363ec8a71501dd75b5b44ef1ba0e72b6
            </table>
            <div>
                <!-- <input type="button" value="CHỌN TẤT CẢ" onclick="ctt()">
                <input type="button" value="BỎ CHỌN TẤT CẢ" onclick="btt()">
                <input type="button" value="XÓA CÁC MỤC ĐÃ CHỌN"> -->
<<<<<<< HEAD
                <a href="index.php?act=addsp"> <input type="button" value="NHẬP THÊM"></a>
=======
>>>>>>> a4c39f24363ec8a71501dd75b5b44ef1ba0e72b6
            </div>
</div>



