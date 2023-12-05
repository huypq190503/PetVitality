<style>
        .mb-3{
            margin-bottom: 1rem !important;
        }
    </style>

<div class="col-md-8" >
        <h1 class="mb-3" >THÊM MỚI SẢN PHẨM</h1>
    <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
        <label for="danhmuc" class="form-label">Danh mục sản phẩm</label><br>
            <select name="iddm" id="" class="form-control" >
                <?php
                    foreach($listdanhmuc as $danhmuc){
                        extract($danhmuc);
                        echo '<option value="'.$id.'">'.$name.'</option>';
                    }
                ?>      
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name" placeholder="Nhập tên sản phẩm" name="name_pro" required/>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Ảnh sản phẩm</label><br>
            <input type="file" id="image" name="img_pro" />
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Giá sản phẩm</label>
            <input type="text" class="form-control" id="price" placeholder="Nhập giá sản phẩm" name="price_sp" required/>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Số lượng</label>
            <input type="text" class="form-control" id="price" placeholder="Nhập số lượng" name="quantity" />
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Mô tả sản phẩm</label>
            <input type="text" class="form-control" id="price" placeholder="Mô tả" name="description" />
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Khối lượng</label>
            <input type="text" class="form-control" id="weight" placeholder="Khối lượng" name="weight" />
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Loại</label>
            <input type="text" class="form-control" id="genre" placeholder="Loại" name="genre" />
        </div>
        <div>
            <input type="submit" name="themmoi" value="THÊM MỚI">
            <input type="reset" value="NHẬP LẠI">
            <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
        </div>
        <?php
            if(isset($thongbao)&&($thongbao!="")){
                echo "$thongbao";
                header("Location: sanpham/list.php");
            }
        ?>
    </form>
</div>  