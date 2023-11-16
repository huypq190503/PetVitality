<?php
    if(is_array($sp)){
        extract($sp);
    }
    $anhpath="../upload/".$img;
    if(is_file($anhpath)){
        $anh="<img src='".$anhpath."' height='80'>";
    }else{
        $anh="no photo";
    }
?>
<div>
    <div>
        <h1>CẬP NHẬT LOẠI HÀNG HÓA</h1>
    </div>
    <div>
        <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
        <div>
            Danh mục
            <select name="iddm" id="">
                <option value="0" selected>Tất cả</option>
                <?php
                    foreach($listdanhmuc as $danhmuc){
                        extract($danhmuc);
                        if($iddm==$id) $s="selected"; else $s="";
                        echo '<option value="'.$id.'" '.$s.'>'.$name.'</option>';
                    }
                ?>   
            </select>
        </div>
        <div>
            Tên sản phẩm 
            <input type="text" name="tensp" placeholder="nhập vào tên" value="<?=$sp['name']?>">
        </div>
        <div>
            Ảnh 
            <input type="file" name="anh"> <?=$anh?>
        </div>
        <div>
            Gía 
            <input type="text" name="giasp" value="<?=$price?>">
        </div>
        <div>
                <input type="hidden" name="id" value="<?=$sp['id']?>">
                <input type="submit" name="capnhat" value="CẬP NHẬT">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
        </div>
        <?php
            if(isset($thongbao)&&($thongbao!="")) echo "$thongbao";
        ?>
        </form>
    </div>
</div>  