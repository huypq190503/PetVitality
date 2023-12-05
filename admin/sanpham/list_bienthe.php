

<div class="col-md-12">
        <h2>QUẢN LÝ BIẾN THỂ</h2>
    <br>
    <?php ?>
    
    <!-- <form class="mb-3" action="index.php?act=listsp" method="POST">
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
    </form> -->

        <table class="table" >
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Khối lượng</th>
                <th scope="col">Loại</th>
                <th scope="col">Số lượng</th>
            </tr>
        </thead>
        <tbody>
                <?php foreach($product_bienthe as $key => $sanpham): ?>
                     
            <tr>
                <th scope="row">
                    <?php echo $key + 1; ?>
                </th>
                <td>
                    <?php echo $sanpham['weight']."g"; ?>
                </td>
                <td>
                    <?php echo $sanpham['genre']; ?>
                </td>
                <td>
                    <?php echo  $sanpham['quantity']; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>            
            </table>

            <div>
                <a href="?act=listsp" class="btn btn-success">Quay lại</a>
                <a class="btn btn-danger"  
                    href="?act=suasp&id=<?=$product[0]['id'];?>"> Cập nhật
                </a>
            </div>
            
</div>




