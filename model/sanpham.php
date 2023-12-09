<?php
/****************************************************************************************/
    // Thêm sản phẩm 
    
    function insert_sanpham($name_pro,$img_pro,$price_sp,$description,$iddm){
        $sql="insert into sanpham(name,img,price,description,iddm) values('$name_pro','$img_pro','$price_sp','$description','$iddm')";
        return pdo_execute($sql);
    }
/****************************************************************************************/
    // Thêm chitietsanpham
    function insert_chitietsanpham($quantity,$weight,$genre,$id_sp){
        $sql="insert into chitietsanpham(quantity,weight,genre,id_sp) values('$quantity','$weight','$genre','$id_sp')";
        pdo_execute($sql);
    }
/****************************************************************************************/
        // Cập nhật sản phẩm
 function update_sanpham($id,$name_pro,$img_pro,$price_sp,$description,$iddm){
            if($img_pro!="")
                $sql="UPDATE `sanpham` SET `name`='$name_pro',`img`='$img_pro',`price`='$price_sp',`description`='$description',`iddm`='$iddm' WHERE id=".$id;
            else{
                $sql="UPDATE `sanpham` SET `name`='$name_pro',`price`='$price_sp',`iddm`='$iddm' WHERE id=".$id;
            }
            pdo_execute($sql);       
    }
/****************************************************************************************/
    // Cập nhật chitietsanpham
        function update_bienthe($quantity,$weight,$genre,$id_sp){
            $sql="UPDATE chitietsanpham SET `quantity`='$quantity',`weight`='$weight',`genre`='$genre', WHERE chitietsanpham.id_sp=".$id_sp;
            pdo_execute($sql);
        }
/****************************************************************************************/
    // Xoá sản phẩm
        function delete_sanpham($id){
            $sql="DELETE FROM sanpham WHERE sanpham.id=".$id;
            pdo_execute($sql);
        }
/****************************************************************************************/
    // Xoá biến thể
        function delete_bienthe($id){
            $sql="DELETE FROM chitietsanpham WHERE chitietsanpham.id_sp=".$id;
            pdo_execute($sql);
        }

/****************************************************************************************/
// Danh sách sản phẩm  theo id
function display_sanpham($id){
    $sql="SELECT * FROM sanpham WHERE id=".$id;
    return pdo_query($sql);
}
// Hiển thị sản phẩm theo search
function display_search($search=""){
    $sql="SELECT * FROM sanpham ";
    if($search!=""){
        $sql.=" and sanpham.name like '%".$search."%'";
    }
    $sql.=" order by id asc";
    return pdo_query($sql);
}
//Tìm 1 sản phẩm theo id
function loadone_sanpham($id){
    $sql="SELECT * FROM sanpham WHERE id=?";
    return pdo_query_one($sql,$id);
}
// List sản phẩm
function list_sanpham(){
    $sql="SELECT * FROM sanpham WHERE 1";
    return pdo_query($sql);
}
// Sản phẩm cùng loại
function loadone_sanpham_cungloai($id,$iddm){
    $sql="select * from sanpham where iddm=$iddm AND id <> $id";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
//List sản phẩm theo Keyword
function loadall_sanpham($kyw="",$iddm=0){
    $sql="SELECT sanpham.id , sanpham.name, sanpham.price, sanpham.img,sanpham.luotxem ,danhmuc.name AS 
    tendm FROM `sanpham` INNER JOIN danhmuc ON sanpham.iddm = danhmuc.id WHERE 1"; 
    if($kyw!=""){
        $sql.=" and sanpham.name like '%".$kyw."%'";
    }
    if($iddm>0){
        $sql.=" and sanpham.iddm ='".$iddm."'";
    }
    $sql.=" order by id asc";
    // die($sql);
    $listsanpham=pdo_query($sql);
    return $listsanpham;
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
        // In sản phẩm danh mục chó và mèo
    function sanpham_theodanhmuc($iddm){
        $sql = "select * from sanpham where iddm = $iddm";
        $result = pdo_query($sql);
        return $result;
    }


/****************************************************************************************/
        // hiển thị chi tiết sản phẩm
    function display_chitietsanpham($id){
        $sql="SELECT * FROM chitietsanpham WHERE chitietsanpham.id_sp=".$id;
        return pdo_query($sql);
    }
/****************************************************************************************/
    // List Biến thể
    function list_bienthe(){
        $sql="SELECT * FROM chitietsanpham WHERE 1";
        return pdo_query($sql);
    }
/****************************************************************************************/
    // Gộp bảng theo id sản phẩm
    function display_ctsp($id_sp){
        $sql="SELECT sanpham.id as id_sp,chitietsanpham.id_ctsp as id_ctsp,
        sanpham.name as name_sp,sanpham.img as img,
        sanpham.price as price,sanpham.description as description,sanpham.iddm as iddm,
        chitietsanpham.weight as weight,
        chitietsanpham.genre as genre,
        chitietsanpham.quantity as quantity FROM sanpham 
        INNER JOIN chitietsanpham ON sanpham.id=chitietsanpham.id_sp
        WHERE chitietsanpham.id_sp=$id_sp ORDER BY weight,genre  ASC";
        return pdo_query($sql);
    }
/****************************************************************************************/
    function list_ctsp(){
        $sql="SELECT sanpham.id as id_sp,chitietsanpham.id_ctsp as id_ctsp,
        sanpham.name as name_sp,sanpham.img as img,sanpham.price as price,sanpham.description as description,
        chitietsanpham.weight as weight,chitietsanpham.genre as genre,
        chitietsanpham.quantity as quantity,danhmuc.name as name_dm FROM sanpham 
        INNER JOIN chitietsanpham ON sanpham.id=chitietsanpham.id_sp
        INNER JOIN danhmuc ON sanpham.iddm=danhmuc.id";
        return pdo_query($sql);
}
/****************************************************************************************/
//Sản phẩm cart
function loadone_sanphamCart ($idList) {
    // $sql = 'SELECT sanpham.*,chitietsanpham.id_ctsp as id_ctsp,chitietsanpham.weight as weight,chitietsanpham.genre as genre FROM sanpham
    // INNER JOIN chitietsanpham ON sanpham.id=chitietsanpham.id_sp WHERE id in ('.$idList.')';
    $sql = 'SELECT * FROM sanpham  WHERE id in ('.$idList.')';
    $sanpham = pdo_query($sql);
    return $sanpham;
}
?>