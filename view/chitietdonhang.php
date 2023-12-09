<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
<title>Hóa Đơn Thanh Toán</title>
    
   
<style>
        body, table {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        #invoice {
            max-width: 700px;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            transition: box-shadow 0.3s ease;
            position: relative;
        }
        button{
            position: absolute;
            right: 10px;
            top: 10px;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            background-color: black;
            color: #fff;
        }
        #invoice:hover {
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
        }

        #header {
            background-color: #FFC700;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        #customer-info, #total {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        #total {
            margin-top: 20px;
            padding: 10px;
            text-align: right;
            font-size: 18px;
            background-color: #e6e6e6;
            transition: background-color 0.3s ease;
        }

        #total:hover {
            background-color: #d4d4d4;
        }

        #status {
            margin-top: 20px;
            padding: 10px;
            text-align: center;
            background-color: #FFC700;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        #status:hover {
            background-color: #be9709;
        }
    </style>

</head>

<body>

        <div id="invoice">  
            <div id="header">
                <a href="index.php?act=order_history"><button >X</button></a>
                <h2>Hóa Đơn Thanh Toán</h2>
                <p>Cửa Hàng Thức Ăn Cho Chó và Mèo</p>
            </div>
            <div id="customer-info">
                <?php foreach ($thongtin_donhang as $thongtin):?>
                        <h3>Thông Tin Khách Hàng</h3>
                        <p><strong>Tên:</strong> <?= $thongtin['hoten']?></p>  
                        <p><strong>Địa Chỉ:</strong><?= $thongtin['diachi']?></p>
                        <p><strong>Số điện thoại:</strong> <?= $thongtin['sdt']?></p>
                <?php endforeach?>
                    </div>

                    <table>

                        <thead>       
                            <tr>            
                                <th>STT</th>
                                <th>Ngày mua</th>       
                                <th>Ảnh</th>         
                                <th>TÊN</th>         
                                <th>Số Lượng</th>         
                                <th>Đơn Giá</th>                    
                            </tr>
                        </thead>
                            <tbody>
                                <?php foreach($order_detail as $key => $detail):?>
                                <tr>      
                                    <td><?= $key + 1?></td>
                                    <td><?= $detail['date']?></td>
                                    <td><img src="./upload/<?=$detail['img']?>" width="70"alt=""> </td>
                                    <td><?= $detail['name']?></td>            
                                    <td><?= $detail['soluong']?></td>
                                    <td><?= $detail['giamua']?></td>
                                   
                                </tr>

                        </tbody>
                    </table>

            <div id="total">
                        <p><strong>Tổng Cộng: <?= $detail['thanhtien']?></strong></p>
                    </div>

                    <div id="status">
                        <p><strong>Trạng Thái Đơn Hàng: <?= $detail['trangthai']?></strong> </p>
                    </div>
                    <?php endforeach?>
        </div>

</body>

</html>