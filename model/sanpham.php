<?php
/****************************************************************************************/
    // Thêm sản phẩm 
    function insert_sanpham($tensp,$anh,$price,$description,$iddm){
        $sql="insert into sanpham(name,img,price,description,iddm) values('$tensp','$anh','$price','$description','$iddm')";
        return pdo_execute($sql);
    }
    function insert_soluong($quantity,$id_sp){
        $sql="insert into quantity(quantity,id_sp) values('$quantity','$id_sp')";
        pdo_execute($sql);
    }
    function insert_chitietsanpham($weight,$genre,$id_sp){
        $sql="insert into chitietsanpham(weight,genre,id_sp) values('$weight','$genre','$id_sp')";
        pdo_execute($sql);
    }
    function display_ctsp($id_sp){
        $sql="SELECT sanpham.id as id_sp,chitietsanpham.id_ctsp as id_ctsp,sanpham.name as name_sp,sanpham.img as img,sanpham.price as price,sanpham.description as description,chitietsanpham.weight as weight,
        chitietsanpham.genre as genre,quantity.quantity FROM sanpham 
        INNER JOIN chitietsanpham ON sanpham.id=chitietsanpham.id_sp
        INNER JOIN quantity ON sanpham.id=quantity.id_sp 
        WHERE chitietsanpham.id_sp=$id_sp";
        return pdo_query($sql);
    }
    
/****************************************************************************************/
    // Sản phẩm top 10    
    function loadall_sanpham_top10(){
        $sql="select * from sanpham where 1 order by luotxem desc limit 0,4"; 
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
/****************************************************************************************/
    // Lọc giá tăng dần , giảm dần 
    function loadall_sanpham_home($filter){
        $sql="select * from sanpham where 1 ";
        if($filter!=""){
            $sql.="order by price $filter";
        }         $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
/****************************************************************************************/
    // In sản phẩm danh mục chó và mèo
    function load_sanpham_danhmuc_cho(){
        $sql = "SELECT sanpham.id, sanpham.name, sanpham.price , sanpham.img, danhmuc.name 
        AS tendm FROM `sanpham` LEFT JOIN danhmuc ON sanpham.iddm = danhmuc.id 
        WHERE danhmuc.name = 'Chó' LIMIT 2";
        $result = pdo_query($sql);
        return $result;
    }
    function load_sanpham_danhmuc_meo(){
        $sql = "SELECT sanpham.id, sanpham.name, sanpham.price , sanpham.img, danhmuc.name 
        AS tendm FROM `sanpham` LEFT JOIN danhmuc ON sanpham.iddm = danhmuc.id 
        WHERE danhmuc.name = 'Mèo' LIMIT 2";
        $result = pdo_query($sql);
        return $result;
    }
/****************************************************************************************/
    function danhsach_sanpham(){
        $sql="select * from sanpham where 1"; 
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
    function loadall_sanpham($kyw="",$iddm=0){
        $sql="SELECT sanpham.id, sanpham.name, sanpham.price, sanpham.img, danhmuc.name AS 
        tendm FROM `sanpham` LEFT JOIN danhmuc ON sanpham.iddm = danhmuc.id;"; 
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
/****************************************************************************************/
        // In sản phẩm danh mục chó và mèo
    function sanpham_theodanhmuc($iddm){
        $sql = "select * from sanpham where iddm = $iddm";
        $result = pdo_query($sql);
        return $result;
    }
/****************************************************************************************/
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