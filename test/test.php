<?php
define('TEST', "테스트");
include("config/constants.php");


	echo "원본 : ".TEST;
	echo "<br/>"; // 줄 바꿈
	echo "변환 : ".iconv("EUC-KR", "UTF-8", TEST);
?>