<div class="col-md-8">
    <h3>Sửa danh mục sản phẩm</h3>
    <form method="post" action="?act=editdm">
        <input type="hidden" value="<?php echo $danhmuc['id']; ?>" name="iddm">
        <div class="mb-3">
            <label for="name" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" id="name" placeholder="Nhập tên danh mục" name="tendm"
                value="<?php echo $danhmuc['name']; ?>" />
        </div>
        <button type="submit" class="btn btn-warning" name="btnsubmit">Sửa</button>
    </form>
</div>