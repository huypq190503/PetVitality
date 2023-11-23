<?php
    function insert_sanpham($tensp,$anh,$price,$iddm){
        $sql="insert into sanpham(name,img,price,iddm) values('$tensp','$anh','$price','$iddm')";
        pdo_execute($sql);
    }
    function delete_sanpham($id){
        $sql="delete from sanpham where id=".$id;
        pdo_execute($sql);
    }
    function loadall_sanpham_top10(){
        $sql="select * from sanpham where 1 order by luotxem desc limit 0,10"; 
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
    function loadall_sanpham_home(){
        $sql="select * from sanpham where 1 order by id desc limit 0,9"; 
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
    // In sản phẩm danh mục chó và mèo
    function load_sanpham_danhmuc_cho(){
        $sql = "SELECT sanpham.id, sanpham.name, sanpham.price , sanpham.img, danhmuc.name 
        AS tendm FROM `sanpham` LEFT JOIN danhmuc ON sanpham.iddm = danhmuc.id 
        WHERE danhmuc.name = 'Chó cưng' LIMIT 2";
        $result = pdo_query($sql);
        return $result;
    }
    function load_sanpham_danhmuc_meo(){
        $sql = "SELECT sanpham.id, sanpham.name, sanpham.price , sanpham.img, danhmuc.name 
        AS tendm FROM `sanpham` LEFT JOIN danhmuc ON sanpham.iddm = danhmuc.id 
        WHERE danhmuc.name = 'Mèo yêu' LIMIT 2";
        $result = pdo_query($sql);
        return $result;
    }
    function danhsach_sanpham(){
        $sql="select * from sanpham where 1"; 
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
        // End sản phẩm danh mục chó và mèo
    function loadall_sanpham($kyw="",$iddm=0){
        $sql="SELECT sanpham.id, sanpham.name, sanpham.price, sanpham.img, danhmuc.name AS 
        tendm FROM `sanpham` LEFT JOIN danhmuc ON sanpham.iddm = danhmuc.id where 1"; 
        if($kyw!=""){
            $sql.=" and name like '%".$kyw."%'";
        }
        if($iddm>0){
            $sql.=" and iddm ='".$iddm."'";
        }
        $sql.=" order by id desc";
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }

    function load_ten_dm($iddm){
        if($iddm>0){ 
        $sql="select * from danhmuc where id=".$iddm;
        $dm=pdo_query_one($sql);
        extract($dm);
        return $name;
        }else{
            return "";
        }
    } 
    function loadone_sanpham($idsp){
        $sql="select * from sanpham where id=".$idsp;
        $sp=pdo_query_one($sql);
        return $sp;
    }
    function loadone_sanpham_cungloai($id,$iddm){
        $sql="select * from sanpham where iddm=".$iddm." AND id <> ".$id;
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
    function update_sanpham($id,$tensp,$photo,$giasp,$iddm){
        if($photo!="")
            $sql="UPDATE `sanpham` SET `name`='$tensp',`price`='$giasp',`img`='$photo',`iddm`='$iddm' WHERE id=".$id;
        else
            $sql="UPDATE `sanpham` SET `name`='$tensp',`price`='$giasp',`iddm`='$iddm' WHERE id=".$id;
        pdo_execute($sql);       
    }
?>