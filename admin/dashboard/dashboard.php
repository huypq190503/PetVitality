
<?php

$listsanpham=list_sanpham();
$listbienthe=list_bienthe();
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

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');

        
        var month = <?php echo json_encode(array_column($listbienthe,'id_sp')); ?>;
        var total = <?php echo json_encode(array_column($listbienthe,'quantity')); ?>;
        var day = <?php echo json_encode(array_column($listsanpham,'name')); ?>;
        var values = <?php echo json_encode(array_column($listsanpham,'price')); ?>;

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: day,
                datasets: [{
                    label: 'Doanh số theo ngày',
                    data: values,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Doanh số theo tháng',
                    data: total,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
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
