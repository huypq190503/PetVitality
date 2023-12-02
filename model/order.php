<?php
    function danhsach_donhang(){
        $sql = "select * from cart_detail";
        $result = pdo_query($sql);
        return $result;
    }
function addOrder($id_user, $hoten, $sdt, $email, $diachi, $tongtien, $pttt){
    $sql="INSERT INTO cart_detail (id_user, hoten, sdt, email, diachi, tongtien, pttt) VALUES ($id_user, '$hoten', '$sdt', '$email', '$diachi', $tongtien, $pttt);";
    $id=pdo_executeid($sql);
    return $id;
}

function addOrderDetail($id_order, $id_pro, $giamua, $soluong, $thanhtien){
    $sql="INSERT INTO order_detail (id_order, id_pro, giamua, soluong, thanhtien) VALUES ($id_order, $id_pro, $giamua, $soluong, $thanhtien );";
    pdo_execute($sql);
}
?>