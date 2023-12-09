<?php
function doanhthu_ngay(){
    $sql="SELECT date, SUM(thanhtien) AS doanhthu_ngay
    FROM order_detail GROUP BY date";
    $day=pdo_query($sql);
    return $day;   
}
function doanhthu_thang(){
    $sql="SELECT DATE_FORMAT(date, '%Y-%m') AS month, SUM(thanhtien) AS doanhthu_thang
    FROM order_detail GROUP BY month;";
    $day=pdo_query($sql);
    return $day;   
}
?>