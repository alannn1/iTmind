<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="max-w-full">
        <div class="flex flex-col items-center p-2 bg-white shadow">
            <div id="grafik-user"></div>
        </div>    
    </div>
</body>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var user =  <?php echo json_encode($user) ?>;
    var bulanUser = <?php echo json_encode($bulanUser) ?>;

    Highcharts.chart('grafik-user', {
        chart: {
            type: 'column', // Gunakan 'column' untuk grafik batang vertikal
            width: 420,  
            height: 320  
        },
        title: {
            text: 'Grafik User Form Rekomendasi'
        },
        subtitle: {
            text: 'iTmind'
        },
        xAxis: {
            categories: bulanUser, // Bulan akan menjadi kategori di sumbu X
            title: {
                text: 'Bulan'
            }
        },
        yAxis: {
            title: {
                text: 'Number of Users'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'New Users',
            data: user
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>
</html>
