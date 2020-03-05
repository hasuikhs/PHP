# 04_PHP_Function_03

## 01. ini_get()

- php.ini에 지정되어 있는 지시어의 값을 읽어온다.
  - 존재하지 않거나 값이 Off인 경우 공백을 반환
  - On으로 지정되어 있으면 1을 반환

```php
<?php 
	echo ini_get('display_errors');
?>
```

```
1
```

## 02. ini_set()

- php.ini를 설정한다.
- 해당 함수를 포함한 페이지만 일시적으로 변경이 적용된다.

```php
<?php 
	ini_set('display_errors', 1);
	echo ini_get('display_errors');
?>
```

```
1
```

## 03. extract()

- 배열 속의 키값들을 변수화 시키는 함수

```php
<?php 
	$map[id] = "test01";
	$map[name] ="홍길동";
	$map[phone] = "010-1234-5678";

	extract($map);

	echo $id, "<br>";
	echo $name, "<br>";
	echo $phone, "<br>";
?>
```

```
test01
홍길동
010-1234-5678
```

## 04. ob_start()

- 출력 버퍼링을 켜는 PHP 명령어
- 스크립트의 모든 출력을 내부 버퍼에 저장하게 한다.
- ob_start() 함수가 호출된 이후에는 어떠한 출력도 브라우저로 전송되지 않는다.

```php
<?php
    ob_start();
?>
```

## 05. ob_get_length()

- ob_start()가 선언된 이후로 출력되는 문자열의 길이를 반환하는 함수

```php
<?php 
	ob_start(); 

	echo "Hello "; 

	$len1 = ob_get_length(); 

	echo "World"; 

	$len2 = ob_get_length(); 

	ob_end_clean(); // 버퍼를 삭제 이전까지의 echo는 무효

	echo $len1 . ", " . $len2; 
?> 
```

```
6, 11
```

## 06. ob_end_flush()

- 출력물을 브라우저로 출력하고, 버퍼를 비우고, 종료한다.

```php
<?php 
	ob_start(); 

	echo "Hello "; 

	$len1 = ob_get_length(); 

	echo "World"; 

	$len2 = ob_get_length(); 

	ob_end_flush()
?> 
```

```
Hello World
```

## 07. flush()

- 현재 버퍼에 가지고 있는 값을 출력
- ob_flush() 뒤에 와야한다.

```php
ob_start();

for ($i = 0; $i < 10; $i++) {
	echo $i;
	echo "<br>";
	echo str_pad('', 4096);

	ob_flush();
	flush();
	sleep(1);
}

ob_end_flush();
```

```
// 1초 간격으로 출력
0
1
2
3
4
5
6
7
8
9
```

## 08. mb_substr()

- substr()의 한글 깨짐 문제를 해결하는 문자열 자르기 함수

- `mb_substr(string $string, int $start, int $length, string $endcoding)`

```php
<?php
	$test_str = "이것은, 테스트!";

	echo "한글 : ".$test_str."<br/>";
	echo "시작이 양수인 경우 #1  : ".mb_substr($test_str, 1, NULL, 'UTF-8').'<br/>';
	echo "시작이 양수인 경우 #2  : ".mb_substr($test_str, 2, NULL, 'UTF-8').'<br/>';
	echo "시작이 양수인 경우 #3  : ".mb_substr($test_str, 3, NULL, 'UTF-8').'<br/>';
	echo "시작이 양수인 경우 #4  : ".mb_substr($test_str, 3, 3, 'UTF-8').'<br/>';
	echo "시작이 양수인 경우 #5  : ".mb_substr($test_str, 3, -1, 'UTF-8').'<br/>';
	echo "시작이 양수인 경우 #6  : ".mb_substr($test_str, -3, -1, 'UTF-8').'<br/>';
  
	echo "<br/>";
  
	echo "시작이 음수인 경우 #1  : ".mb_substr($test_str, -1, NULL, 'UTF-8').'<br/>';
	echo "시작이 음수인 경우 #2  : ".mb_substr($test_str, -2, NULL, 'UTF-8').'<br/>';
	echo "시작이 음수인 경우 #3  : ".mb_substr($test_str, -3, 1, 'UTF-8').'<br/>';
	echo "시작이 음수인 경우 #4  : ".mb_substr($test_str, -3, -1, 'UTF-8').'<br/>';
?>
```

```
한글 : 이것은, 테스트!
시작이 양수인 경우 #1 : 것은, 테스트!
시작이 양수인 경우 #2 : 은, 테스트!
시작이 양수인 경우 #3 : , 테스트!
시작이 양수인 경우 #4 : , 테
시작이 양수인 경우 #5 : , 테스트
시작이 양수인 경우 #6 : 스트

시작이 음수인 경우 #1 : !
시작이 음수인 경우 #2 : 트!
시작이 음수인 경우 #3 : 스
시작이 음수인 경우 #4 : 스트
```

## 09. mb_detect_encoding()

- 해당 문자열의 인코딩 정보를 얻는 함수

```php
<?php
	$test_str = "이것은, 테스트!";

	echo mb_detect_encoding($test_str);
?>
```

```
UTF-8
```

## 10. iconv()

- 외부에서 가져온 문자가 현재 파일의 인코딩과 맞지 않는 경우, 인코딩을 변환해주는 함수
- `iconv(기존 인코딩, 변환할 인코딩, 문자열)`

```php
<?php
    $str = "테스트";
    iconv("euc-kr", "utf-8", $str);
?>
```

## 11. mysqli

- mysql 기본 접속 및 사용 방법

```php
<?php
	$mysql_hostname = '접속주소';
	$mysql_username = '접속계정';
	$mysql_password = '계정암호';
	$mysql_database = '데이터베이스명';
	$mysql_port = '포트';

	// DB 연결
	$connect = mysqli_connect($mysql_hostname, 
                              $mysql_username, 
                              $mysql_password, 
                              $mysql_database);

	// DB 선택
	mysql_select_db($connect, $mysql_database) or die('DB 선택 실패');

	// Form에서 넘어온 데이터
	$searchName = $_POST['name'];

	$sql = "쿼리문";

	// SQL Query 실행
	$rs = mysqli_query($connect, $sql);

	while($info=mysqli_fetch_array($rs)){
		// 출력문
	}

	mysqli_close($connect);
?>
```

## 12. pdo

- 데이터베이스에 접근하는 공통 API를 제공하는 것을 목적으로 만들어짐
- mysqli는 객체 스타일과 절차적 스타일의 API를 제공하는데 비해서 pdo는 객체 스타일 API 제공
- prepared statement르 제공하므로 SQL Injection 방어에 사용 가능

```php
<?php
	$dsn = "mysql:host=localhost;port=3306;dbname=testdb;charset=utf8";

	try {
    	$db = new PDO($dsn, "testuser", "testuser");
    	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    	$keyword = "%테스트%";
    	$no = 1;

    	$query = "SELECT num, name FROM tb_test WHERE name LIKE ? AND num > ?";

    	$stmt = $db->prepare($query);
    	$stmt->execute(array($keyword, $no));
    	$result = $stmt->fetchAll(PDO::FETCH_NUM);

    	for($i = 0; $i < count($result); $i++) {
       		printf ("%s : %s <br />", $result[$i][0], $result[$i][1]);
    	}

	} catch(PDOException $e) {
    	echo $e->getMessage();
	}
?>
```

