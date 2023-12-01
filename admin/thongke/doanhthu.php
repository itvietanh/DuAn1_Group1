<?php
function getDayInMonth()
{
    $arrDay = [];
    $month = date("m");
    $year = date("Y");
    for ($day = 1; $day <= 31; $day++) {
        $time = mktime("12", "0", "0", $month, $day, $year);
        if (date("m", $time) == $month) {
            $arrDay[] = date("Y-m-d", $time);
        }
    }
    return $arrDay;
}

$listDay = getDayInMonth();
// echo "<pre>";
// print_r($listDay);
// die();

foreach ($list_orderTicket as $ticket) {
    extract($ticket);
    $date[] = $order_date;
}
$check_date = implode(",", $date);
?>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript"></script>
<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Ngày', 'Doanh Thu', {
                role: 'style'
            }],
            <?php 
                foreach ($listDay as $day) {
                    ?>
                    ['<?=$day?>', 
                    <?php if ($day == $order_date) {
                        echo $soluong * $price;
                    }?>, 'color: #76A7FA'],
                    <?php
                }
            ?>
            // ['2010', 10, 'color: gray'],
            // ['2020', 14, 'color: #76A7FA'],
            // ['2030', 16, 'opacity: 0.2'],
            // ['2040', 22, 'stroke-color: #703593; stroke-width: 4; fill-color: #C5A5CF'],
            // ['2050', 28, 'stroke-color: #871B47; stroke-opacity: 0.6; stroke-width: 8; fill-color: #BC5679; fill-opacity: 0.2']
        ]);

        var options = {
            title: 'Thống Kê'
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>

<body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
</body>