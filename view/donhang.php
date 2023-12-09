
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử đơn hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ddd;
            margin: 0;
            padding: 0;
            
            
        }

        header {
            background-color: #f0ad4e;
            color: white;
            padding: 1rem;
            text-align: center;
        }

        table {
           
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        th, td {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f0ad4e   ;
            color: white;
        }
        .btn-group{
            display:flex;
        }
        .back-btn {
            box-sizing:border-box;
            display: block;
            margin: 20px auto;
            width: 250px;
            padding: 10px 20px;
            background-color: #f0ad4e;
            color: black;
            text-decoration: none;
            text-align: center;
            border-radius: 5px;
            transition: 0.5s
        }
        .back-btn:hover {
            box-sizing:border-box;
            display: block;
            margin: 20px auto;
            width: 250px;
            padding: 10px 20px;
            background-color: #f0ad4e;
            color: white;
            text-transform: uppercase;
            text-decoration: none;
            text-align: center;
            border-radius: 5px;
        }
        .detail {
            box-sizing:border-box;
            display: block;
            margin: 20px auto;
            width: 150px;
            padding: 10px 20px;
            background-color: #f0ad4e;
            color: white;
            text-transform: uppercase;
            text-decoration: none;
            text-align: center;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Lịch sử đơn hàng</h1>
    </header>
    
    <table>
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Thời gian</th>
                <th>Trạng thái</th>
                <th>Chi tiết đơn hàng</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($order_history as $order):?>
            <tr>
                <td><?= "PET#". $order['id']?></td>
                <td><?= $order ['date']?></td>
                <td><?= $order ['trangthai']?></td>
                <td><a href="index.php?act=order_detail&id_order=<?= $order['id'] ?>" class="detail">Chi tiết đơn hàng</a></td>
            <?php endforeach ?>
            </tr>
            <!-- Thêm các dòng dữ liệu khác tương tự cần thiết -->
        </tbody>
    </table>
    <div class="btn-group">
        <a class="back-btn" href="index.php">Quay lại trang chủ</a>
        <a class="back-btn" href="index.php?act=product">Đi đặt hàng</a>
    </div>
</body>
</html>