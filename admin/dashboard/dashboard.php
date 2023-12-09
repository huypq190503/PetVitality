
<?php

$doanhthu_ngay=doanhthu_ngay();
$doanhthu_thang=doanhthu_thang();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biểu đồ cột theo sản phẩm</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="myChart" width="400" height="200"></canvas>
    <canvas id="yourChart" width="400" height="200"></canvas>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var ttx = document.getElementById('yourChart').getContext('2d');

        
        var month = <?php echo json_encode(array_column($doanhthu_thang,'month')); ?>;
        var doanhthu_thang = <?php echo json_encode(array_column($doanhthu_thang,'doanhthu_thang')); ?>;
        var day = <?php echo json_encode(array_column($doanhthu_ngay,'date')); ?>;
        var doanhthu_ngay = <?php echo json_encode(array_column($doanhthu_ngay,'doanhthu_ngay')); ?>;

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: day,
                datasets: [{
                    label: 'Doanh số theo ngày',
                    data: doanhthu_ngay,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        var yourChart = new Chart(ttx, {
            type: 'bar',
            data: {
                labels: month,
                datasets: [{
                    label: 'Doanh số theo tháng',
                    data: doanhthu_thang,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
