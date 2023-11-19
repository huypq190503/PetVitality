
<div>
    <div>
        <h1>DANH SÁCH DANH MỤC</h1>
    </div>
    <br>
        <div>
            <div>
            <table class="table table-bordered border-primary">
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>TÊN</th>
                    <th></th>
                </tr>
                <?php
                    foreach($listdanhmuc as $danhmuc){
                        extract($danhmuc);
                        $suadm="index.php?act=suadm&id=".$id;
                        $xoadm="index.php?act=xoadm&id=".$id;
                        echo '<tr>
                                <td><input type="checkbox" id="chon"></td>
                                <td>'.$id.'</td>
                                <td>'.$name.'</td>
                                <td><a href="'.$suadm.'"><input type="button" value="Sửa"></a> 
                                <a  href="'.$xoadm.'"  ><input type="button"  value="Xóa"></a></td>
                            </tr>';
                    }
                ?>  
            </table>
        </div>
        <div>
        <input type="button" value="CHỌN TẤT CẢ" onclick="ctt()">
                <input type="button" value="BỎ CHỌN TẤT CẢ" onclick="btt()">
                <input type="button" value="XÓA CÁC MỤC ĐÃ CHỌN">
            <a href="index.php?act=adddm"> <input type="button" value="NHẬP THÊM"></a>
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