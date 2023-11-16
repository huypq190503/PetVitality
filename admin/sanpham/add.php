
<div>
    <div>
        <h1>THÊM MỚI SẢN PHẨM</h1>
    </div>
    <div>
    <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
        <div>
            Danh mục 
            <select name="iddm" id="">
                <?php
                    foreach($listdanhmuc as $danhmuc){
                        extract($danhmuc);
                        echo '<option value="'.$id.'">'.$name.'</option>';
                    }
                ?>      
            </select>
        </div>
        <div>
            Tên sản phẩm 
            <input type="text" name="tensp">
        </div>
        <div>
            Ảnh 
            <input type="file" name="anh">
        </div>
        <div>
            Giá
            <input type="text" name="giasp">
        </div>
        <div>
            <input type="submit" name="themmoi" value="THÊM MỚI">
            <input type="reset" value="NHẬP LẠI">
            <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
        </div>
        <?php
            if(isset($thongbao)&&($thongbao!="")) echo "$thongbao";
        ?>
    </form>
  </div>
</div>  
