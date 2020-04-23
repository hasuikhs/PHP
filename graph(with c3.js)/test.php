<?php

include __DIR__ . '/./include/inc.common.php';
$aData = getClickData($conn);

var_dump($_GET);

$maxDate = $aData['date'][count($aData['date']) - 1];
$minDate = $aData['date'][0];

array_unshift($aData['date'], "x");
array_unshift($aData['click'], "click");

?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=EUC-KR">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<title>stat</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.11/c3.min.css" />

<body>
  <script src="https://d3js.org/d3.v3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.11/c3.min.js"></script>

  <input type="date" max="<?= $maxDate ?>" min="<?= $minDate ?>" id="fDate" />

  <input type="date" max="<?= $maxDate ?>" min="<?= $minDate ?>" id="lDate" />
  <button onclick="search()">검색</button>

  <div id="chart" />
  <script>
    function search() {
      $.ajax({
          url: "test.php",
          type: "GET",
          data: {
            fDate: $("#fDate").val(),
            lDate: $("#lDate").val(),
          }
        })
        .done(function() {
          console.log(data.fDate)
        })
    }

    var x_data = <?php echo json_encode($aData['date']); ?>;
    var click_data = <?php echo json_encode($aData['click']); ?>;
    var chart = c3.generate({
      bindto: '#chart',
      data: {
        x: 'x',
        columns: [
          x_data,
          click_data
        ],
        axes: {
          data2: 'y2' // ADD
        },
        type: 'spline',
        connectNull: false
      },
      point: {
        show: false
      },
      axis: {
        x: {
          type: 'timeseries',
          tick: {
            format: '%m-%d'
          }
        }
      },
      zoom: {
        enabled: true
      }
    });
  </script>
</body>

</html>