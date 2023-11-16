
<div>
    <div>
        <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
    </div>
    <br>
    <form action="index.php?act=listsp" method="POST">
        <input type="text" name="kyw" id="">
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
        <div>
            <div>        
            <table class="table table-bordered border-primary">
                <tr>
                    <th></th>
                    <th>MÃ SẢN PHẨM</th>
                    <th>TÊN SẢN PHẨM</th>
                    <th>ẢNH</th>
                    <th>GÍA</th>
                    <th></th>
                </tr>
                <?php
                    foreach($listsanpham as $sanpham){
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
                                <td>'.$id.'</td>
                                <td>'.$name.'</td>
                                <td>'.$anh.'</td>
                                <td>'.$price.'</td>
                                <td><a href="'.$suasp.'"><input type="button" value="Sửa"></a> <a href="'.$xoasp.'"><input type="button" value="Xóa"></a></td>
                            </tr>';
                    }
                ?>
            </table>
            </div>
            <div>
                <input type="button" value="CHỌN TẤT CẢ" onclick="ctt()">
                <input type="button" value="BỎ CHỌN TẤT CẢ" onclick="btt()">
                <input type="button" value="XÓA CÁC MỤC ĐÃ CHỌN">
                <a href="index.php?act=addsp"> <input type="button" value="NHẬP THÊM"></a>
            </div>
    </div>
</div>
<script>
    let chon = document.getElementById("chon");
    function ctt(){
        chon.checked = true;
    }
    function btt(){
        chon.checked = false;
    }
</script>