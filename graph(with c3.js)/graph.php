<?php

include __DIR__ . '/./include/inc.common.php';

?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=EUC-KR">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<title>stat</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.11/c3.min.css" />

<body>
    <script src="https://d3js.org/d3.v3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.11/c3.min.js"></script>

    <input type="date" id="ps" />

    <input type="date" id="pe" />
    <button onclick="search()">검색</button>

    <div id="chart" />
    <script src="function.js"></script>
    <script>
        var x_data = <?= json_encode($aData['date']); ?>;
        var click_data = <?= json_encode($aData['click']); ?>;
        var mal03 = <?= json_encode($aData['mal03']); ?>;
        var mal05 = <?= json_encode($aData['mal05']); ?>;
        chart(x_data, click_data, mal03, mal05)
    </script>
</body>

</html>