# 03_PHP_Function_02

<div style="text-align: right"><b>작 성 일 : 20.03.05.</b></div>
<div style="text-align: right"><b>작 성 자 : 김 한 석 &nbsp&nbsp</b></div>

## 01. date()

- 현재 날짜/시간을 포멧에 맞게 date 형식으로 출력하는 함수

```php
<?php
	echo date("Y-m-d H:i:s"), "<br>";
?>
```

```
2020-03-05 07:54:16
```

## 02. mktime()

- 인자로 주어진 (시, 분, 초, 월, 일 년)에 대응하는 타임스탬프를 반환하는 함수

```php
<?php 
	$timestamp = mktime(0, 0, 0, 1, 3, 2020);
	echo date('Y-m-d', $timestamp); 
?>
```

```
2020-01-03
```

## 03. strtotime()

- 주어진 날짜 형식의 문자열을 유닉스 타임스탬프로 변환하는 함수

```php
<?php 
	$timestamp = strtotime("+1 week");
	echo date("Y-m-d", $timestamp), "<br/>";

	$timestamp = strtotime("2020-01-01 +1 week");
	echo date("Y-m-d", $timestamp);
?>
```

```
2020-03-12
2020-01-08
```

## 04. time()

- 1970년 1월 1일 0시 0분 0초부터 지금까지 지나온 초를 정수형태로 반환하는 함수

```php
<?php 
	echo time();
?>
```

```
1583396661
```

## 05. setcookie()

- 헤더에 보낼 쿠키를 정의하는 함수
- `setookie(쿠키명, 쿠키값, 만료시간, 경로, 도메인, 보안, httponly)`
  - **쿠키명(필수)** : 설정될 쿠키 이름을 결정
  - **쿠키값(선택)** : 쿠키 이름에 입력될 값
  - **만료시간(선택)** : Default 값은 0이며 쿠키가 유지될 시간을 설정
  - **경로(선택)** : 경로를 지정할 경우 특정 위치와 하위 경로에서만 사용 가능하도록 설정
  - **슬래쉬(/)** : 슬래쉬 기호를 값으로 입력할 경우 전체 경로에서 사용됨을 의미
  - **도메인(선택)** : 사용될 도메인을 지정가능함. 서브도메인 입력시 해당 서브도메인만 사용가능
  - **보안(선택)** : 보안 프로토콜인 https에서만 사용가능하도록 설정함
  - **httponly** : HTTP에서만 사용가능하도록 하여, 스크립트에 의한 쿠키 접근을 허용안하게 함.

```php
<?php 
	setcookie("쿠키", time());
?>
```

![image-20200305173634110](C:\Bitnami\wampstack-7.3.15-0\apache2\htdocs\02_PHP_Fuction.assets\image-20200305173634110.png)

## 06. header()

- 가공하지 않은HTTP 헤더를 전송하기 위해 사용하는 함수

- `header(string $string [, bool $replace = true [, int $http_response_code]])`
  - `$string` : 송신하는 HTTP status 코드를 ㅍ시하거나 브라우저를 리다이렉트할 문자열
  - `$replace` : 이전에 송신된 비슷한 헤더를 바꿀지 또는 같은 형식의 두번째 헤더를 추가할지를 지정
  - `$http_response_code` : HTTP response 코드를 강제적으로 지정

```php
<?php
    header("HTTP/1.0 404 Not Found");
?>
```

```php
<?php
    header("Location:http://www.naver.com");
?>
```

## 07. session_start()

- session을 시작하는 함수

```php
<?php
    session_start();
?>
```

## 08. session_destroy()

- session을 파괴하는 함수

```php
<?php
    session_destroy();
?>
```

## 09. `$_GET`, `$_POST`

- html의 form에서 get or post방식으로 보낸 값들을 받기

```html
<!-- get or post -->
<form method="get" action="form-action.php">
	<p><label>Color : <input type="text" name="color"></label></p>
	<p><label>Sport : <input type="text" name="sport"></label></p>
    <p><input type="submit" value="Submit"></p>
</form>
```

```php
<?php
  $color = $_GET['color'];	// $_POST['color']
  $sport = $_GET['sport'];	// $_POST['sport']
?>
```

## 10. $_COOKIE

- 쿠키의 이름을 가지고 쿠키의 값을 가져온다.

```php
<?php 
	$cookie = $_COOKIE["쿠키"];	// 27. setcookie에서 만든 쿠키
	echo $cookie;
?>
```

```
1583397350
```

## 11. $_SESSION

- session을 등록 session_start() 후에 한다.

```php
<?php
    session_start();
	$_SESSION['test'] = 'test';
?>
```

- 다른 페이지에서 세션을 보려면

```php
<?php
    session_start();
	$id = session_id();
	echo $_SESSION['test'];
?>
```

```
bd5609d8123def4e2e8fe2e4f87ffc28c
```

## 12. $_SERVER['HTTP_X_FORWARDED_FOR']

- 프록시를 통해 올 경우 클라이언트의 IP를 가져오는 함수

```php
<?php
    $_SERVER['HTTP_X_FORWARDED_FOR'];
?>
```

## 13. $_SERVER

- 서버, 실행환경 정보를 담고 있는 배열

```php
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
```

```
Mozilla/5.0 (Windows NT 10.0; Win64; x64) ...
test=1234



127.0.0.1
C:/Bitnami/wampstack-7.3.15-0/apache2/htdocs
C:/Bitnami/wampstack-7.3.15-0/apache2/htdocs/test/test.php
HTTP/1.1
127.0.0.1
/test/test.php?test=1234
```