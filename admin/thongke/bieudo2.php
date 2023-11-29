<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                <?php
                $tongdm = count($thongke);
                $i = 1;
                foreach ($thongke as $thongke1) {
                    extract($thongke1);
                    $dauphay = ($i == $tongdm) ? "" : ",";
                    echo "['" . $thongke1['name_film'] . "'," . $thongke1['quantity'] . "]$dauphay";
                    $i += 1;
                }
                ?>
            ]);

            var options = {
                title: 'Thống Kê Bình Luận'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
</head>

<body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
</body>

</html>