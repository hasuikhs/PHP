<?php
	$str1 = "127.0.0.1";
	$str2 = "0.0.0.0";
	$str3 = "255.255.255.255";
	$str4 = "0-0-0-0";
	$str5 = "256.0.0.1";
	
	$reg = '/^([01]?\d?\d|2[0-4]\d|25[0-5])\.([01]?\d?\d|2[0-4]\d|25[0-5])\.([01]?\d?\d|2[0-4]\d|25[0-5])\.([01]?\d?\d|2[0-4]\d|25[0-5])$/';
	
	echo preg_match($reg, $str1);
	echo preg_match($reg, $str2);
	echo preg_match($reg, $str3);
	echo preg_match($reg, $str4);
	echo preg_match($reg, $str5);
?>