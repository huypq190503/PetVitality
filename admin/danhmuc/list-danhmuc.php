
<!-- List danh mục -->

<div class="col-md-8">
    <h3>Danh sách danh mục sản phẩm</h3>
    <a href="?act=adddm" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">Thêm mới</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($dsdm as $key => $value): ?>
            <tr>
                <th scope="row">
                    <?php echo $key + 1; ?>
                </th>
                <td>
                    <?php echo $value['name']; ?>
                </td>
                <td>
                    <a href="?act=editdm&iddm=<?php echo $value['id']; ?>" class="btn btn-warning"
                    >Sửa</a>

                    <a class="btn btn-danger" 
                    onclick="return confirm('bạn có muốn xóa không')" href="?act=deletedm&iddm=<?php echo $value['id']; ?>" >
                        Xóa
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>


        </tbody>
    </table>
</div>

<!-- Add danh mục - Pop up - Modal  -->

<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Thêm danh mục</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <form class="modal-body" method="post" action="?act=adddm">
        <div class="mb-3">
            <label for="name" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" id="name" placeholder="Nhập tên danh mục" name="tendm" />
        </div>
        <button type="submit" class="btn btn-primary" name="btnsubmit">Thêm mới</button>
    </form>      

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
      </div>

    </div>
  </div>
</div>




<!-- <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeleteLabel">Thông báo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Hành động này không thể hoàn tác. Bạn có muốn xóa không?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <a href="" class="btn btn-danger" id="btn-delete">Xác nhận xóa</a>
            </div>
        </div>
    </div>
</div>


<script>
var modalDelete = document.getElementById('modalDelete')
modalDelete.addEventListener('show.bs.modal', function(event) {
    var button = event.relatedTarget
    var iddm = button.getAttribute('data-bs-id')
    var link = `?act=deletedm&iddm=${iddm}`
    document.getElementById("btn-delete").setAttribute("href", link)
})
</script> -->