<?php
header('Cache-Control: no-cache, must-revalidate'); // HTTP 1.1
header('Pragma: no-cache'); // HTTP 1.0
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');   // Date in the past

$db_host = "127.0.0.1";
$db_user = "root";
$db_pass = "root";
$db_name = "DB_SIM_TRK";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die('cannot connect to mysql.');  
mysqli_set_charset($conn, "utf8");