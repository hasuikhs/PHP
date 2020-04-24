<?php
$ps = $_GET['ps'];
$pe = $_GET['pe'];

include __DIR__ . "/include/inc.common.php";

$aData = getClickData($conn, $ps, $pe);

echo json_encode($aData);
