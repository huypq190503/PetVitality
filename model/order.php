<?php

 function danhsach_donhang(){
        $sql = "SELECT cart_detail.*,pttt.name_pttt FROM cart_detail INNER JOIN pttt ON cart_detail.id_pttt=pttt.id_pttt";
        $result = pdo_query($sql);
        return $result;
}

 function thongtin_donhang($id){
        $sql = "SELECT * FROM `cart_detail` WHERE id=".$id;
        $result = pdo_query($sql);
        return $result;
}
 function danhsach_pttt(){
        $sql = "select * from pttt";
        $result = pdo_query($sql);
        return $result;
}
function addOrder($id_user, $hoten, $sdt, $email, $diachi, $tongtien, $id_pttt){
    $sql="INSERT INTO cart_detail (id_user, hoten, sdt, email, diachi, tongtien, id_pttt) VALUES($id_user, '$hoten', '$sdt', '$email', '$diachi', $tongtien, $id_pttt);";
    $id=pdo_executeid($sql);
    return $id;
}

function addOrderDetail($id_order, $id_pro, $giamua, $soluong, $thanhtien){
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = date("Y-m-d H:i:s");
    $sql="INSERT INTO order_detail (id_order, id_pro, giamua, soluong, thanhtien,date) VALUES ($id_order, $id_pro, $giamua, $soluong, $thanhtien,'$date' );";
    pdo_execute($sql);
}

function lichsu_donhang(){
    $sql="SELECT order_detail.*,status.name as trangthai FROM order_detail INNER JOIN status ON order_detail.id_status=status.id_status ;";
    return pdo_query($sql);
}
function order_detail($id_order){
    $sql="SELECT order_detail.*,sanpham.img as img, sanpham.name as name,status.name as trangthai FROM order_detail INNER JOIN status ON order_detail.id_status=status.id_status INNER JOIN sanpham ON order_detail.id_pro=sanpham.id WHERE order_detail.id=".$id_order;
    return pdo_query($sql);
}
?>