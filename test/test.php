<?php 
	echo $_SERVER['HTTP_USER_AGENT'], "<br>";	// 웹 접속환경 정보

	echo $_SERVER['QUERY_STRING'], "<br>";		// 쿼리 정보

	echo $_SERVER["SCRIPT_URL"], "<br>";		// 현재 스크립트 URL 경로

	echo $_SERVER["SCRIPT_URI"], "<br>";		// 도메인 포함 URL 경로

	echo $_SERVER["HTTP_REFERER"] , "<br>";		// 이전 페이지 주소

	echo $_SERVER["REMOTE_ADDR"] , "<br>";		// 사용자 IP

	echo $_SERVER["DOCUMENT_ROOT"] , "<br>";	// 웹서버 루트 디렉토리

	echo $_SERVER["SCRIPT_FILENAME"], "<br>";	// 현재 스크립트 파일 경로

	echo $_SERVER["SERVER_PROTOCOL"], "<br>";	// 페이지가 요청된 프로토콜 정보

	echo $_SERVER["SERVER_NAME"], "<br>";		// 도메인 정보

	echo $_SERVER["REQUEST_URI"];				// 현재 요청한 URI
?>
