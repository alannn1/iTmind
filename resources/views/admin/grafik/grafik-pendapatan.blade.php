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
            <div id="grafik-pendapatan"></div>
        </div>    
    </div>
</body>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var pendapatan =  <?php echo json_encode($total_price)  ?>;
    var bulan =  <?php echo json_encode($bulan)  ?>;

    Highcharts.chart('grafik-pendapatan', {
        chart: {
            type: 'column', // Menggunakan tipe grafik batang vertikal
            width: 420,  
            height: 320  
        },
        title: {
            text: 'Grafik Pendapatan'
        },
        subtitle: {
            text: 'iTmind'
        },
        xAxis: {
            categories: bulan,
            title: {
                text: 'Bulan'
            }
        },
        yAxis: {
            title: {
                text: 'Nominal Pendapatan Bulanan'
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
            name: 'Pendapatan',
            data: pendapatan
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
