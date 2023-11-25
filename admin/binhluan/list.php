<div>
<div>
    <div>
        <h1>DANH SÁCH BÌNH LUẬN</h1>
    </div>
        <div>
            <div>
            <table>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>NỘI DUNG</th>
                    <th>IDuser</th>
                    <th>IDpro</th>
                    <th>NGÀY BÌNH LUẬN</th>   
                    <th></th>        
                </tr>
                <?php
                    foreach($listbinhluan as $binhluan){
                        extract($binhluan);
                        $suabl="index.php?act=suabl&id=".$id;
                        $xoabl="index.php?act=xoabl&id=".$id;
                        echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>'.$id.'</td>
                                <td>'.$noidung.'</td>
                                <td>'.$iduser.'</td>
                                <td>'.$idpro.'</td>
                                <td>'.$ngaybinhluan.'</td>
                                <td><a href="'.$suabl.'"><input type="button" value="Sửa"></a> <a href="'.$xoabl.'"><input type="button" value="Xóa"></a></td>
                            </tr>';
                    }
                ?>  
            </table>
        </div>
        <div>
            <input type="button" value="CHỌN TẤT CẢ">
            <input type="button" value="BỎ CHỌN TẤT CẢ">
            <a href="index.php?act=addbl"> <input type="button" value="NHẬP THÊM"></a>
        </div>
    </div>
</div>