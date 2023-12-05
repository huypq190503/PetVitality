<style>
        h1{
            margin-bottom: 2rem ;
        }
        .mb-3{
            margin-bottom: 2rem !important;
        }
    </style>

<?php 
    //   $weight=array_column($product,'weight');
    //   $listweight=implode("",$weight);
    //   $genre=array_column($product,'genre');
    //   $listgenre=implode("",$genre);
?>
<div class="col-md-8">
    <h1>Sửa sản phẩm</h1>
    <form method="post" action="?act=suasp" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $product[0]; ?>">
        <div class="mb-3">
            <label for="danhmuc" class="form-label">Danh mục sản phẩm</label><br>
            <select name="iddm" id="danhmuc" class="form-control">
                <?php foreach($listdanhmuc as $value): ?>
                <option value="<?php echo $value['id']?>"
                 <?php if($product[0]['iddm'] == $value['id']): ?> selected
                    <?php endif; ?>>
                    <?php echo $value['name']?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name" placeholder="Nhập tên sản phẩm" name="name_pro"
                value="<?php echo $product[0]['name']; ?>" />
        </div>
        <div class="mb-3">
            <?php if($product[0]['img'] != null && $product[0]['img'] != ""): ?>
            <img width="200" src="<?php echo "../upload/".$product[0]['img']; ?>" alt="">
            <?php endif; ?>
            <label for="image" class="form-label">Ảnh sản phẩm</label><br><br>
            <input type="file" id="image" name="img_pro" />
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá sản phẩm</label>
            <input type="text" class="form-control" id="price" placeholder="Nhập giá sản phẩm" name="price_sp"
                value="<?php echo $product[0]['price']; ?>" />
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Số lượng</label>
            <input type="text" class="form-control" id="price" placeholder="Nhập giá sản phẩm" name="quantity"
                value="<?php 
                    echo $str_quantity;
                 ?>" />
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Mô tả sản phẩm</label>
            <input type="text" class="form-control" id="" placeholder="Mô tả" name="description"
                value="<?= $product[0]['description']; ?>" />
        </div>       
        <div class="mb-3">
            <label for="price" class="form-label">Khối lượng</label>
            <input type="text" class="form-control" id="" placeholder="Khối lượng" name="weight"
                value="<?= $str_weight;?>" />
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Loại</label>
            <input type="text" class="form-control" id="" placeholder="Loại" name="genre"
                value="<?= $str_genre;?>" />
        </div>
        <button type="submit" class="btn btn-primary" name="capnhat">Chỉnh sửa</button>
    </form>
</div>
