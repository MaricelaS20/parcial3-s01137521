<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Grafico</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.3.1/echarts.min.js" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
    <style>
        .chart {
            width: 100%;
            height: 200px;
        }
    </style>
</head>

<body>
    <div class="col-md-12">
        <h1 class="text-center">Grafico</h1>
        <div class="col-md-8 col-md-offset-2">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="chart-container">
                            <div class="chart has-fixed-height" id="bars_basic"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script type="text/javascript">
    var bars_basic_element = document.getElementById('bars_basic');
    if (bars_basic_element) {
        var bars_basic = echarts.init(bars_basic_element);
        bars_basic.setOption({
            color: ['#3398DB'],
            tooltip: {
                trigger: 'axis',
                axisPointer: {
                    type: 'shadow'
                }
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            xAxis: [{
                type: 'category',
                data: ['Ropa', 'Perfume'],
                axisTick: {
                    alignWithLabel: true
                }
            }],
            yAxis: [{
                type: 'value'
            }],
            series: [{
                name: 'Total de Productos',
                type: 'bar',
                barWidth: '20%',
                data: [
                    {{ $ropa_count }},
                    {{ $perfume_count }},
                ]
            }]
        });
    }
</script>
