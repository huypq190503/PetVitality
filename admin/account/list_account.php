
<div class="col-md-12">
        <h2>Quản lý Tài Khoản</h2>
    <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">User</th>
                <th scope="col">Pass</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Hotline </th>
                <th scope="col">Role
                </th>
            </tr>
        </thead>
        <tbody>
                <?php foreach($list_account as $key => $acc): ?>
            <tr>
                <th scope="row">
                    <?php echo $key + 1; ?>
                </th>
                <td>
                    <?php echo $acc['user']; ?>
                </td>
                <td>
                    <?php echo $acc['pass']; ?>
                </td>
                <td>
                    <?php echo $acc['email']; ?>
                </td>
                <td>
                    <?php echo $acc['address']; ?>
                </td>
                <td>
                    <?php echo $acc['tel']; ?>
                </td>
                <td>
                    <?php echo $acc['name']; ?>
                </td>
                <td>
                  
                    <a class="btn btn-danger" 
                    onclick="return confirm('bạn có muốn xóa không')" href="?act=xoa_acc&id=<?php echo $acc['id']; ?>"> Xóa
                    </a>    
                   

                </td>
            </tr>
            <?php endforeach; ?>  
          


        </tbody>            
            </table>
            <div>
                <!-- <input type="button" value="CHỌN TẤT CẢ" onclick="ctt()">
                <input type="button" value="BỎ CHỌN TẤT CẢ" onclick="btt()">
                <input type="button" value="XÓA CÁC MỤC ĐÃ CHỌN"> -->
                <!-- <a href="index.php?act=addsp"> <input type="button" value="NHẬP THÊM"></a> -->
            </div>
</div>






