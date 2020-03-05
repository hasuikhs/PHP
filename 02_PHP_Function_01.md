# 02_PHP_Function_01

<div style="text-align: right"><b>작 성 일 : 20.03.05.</b></div>
<div style="text-align: right"><b>작 성 자 : 김 한 석 &nbsp&nbsp</b></div>

## 01. dirname()

- 주어진 파일 경로에서 경로 이름만을 반환

```php
<?php
    echo dirname("/home/work/menu/test.php");
?>
```

```
/home/work/menu
```

## 02. basename()

- 경로를 제외한 파일의 이름만을 반환

```php
<?php
    echo basename("/home/work/menu/test.php");
?>
```

```
test.php
```

## 03. pathinfo()

- 파일 경로에 대한 정보를 반환하는 함수
- 옵션에 따라 연관 배열 또는 문자열로 변환

```php
<?php
	$path_array = pathinfo("/home/work/menu/test.php");
	
	echo $path_array['dirname'], "<br>";	// /home/work/menu
	echo $path_array['basename'], "<br>";	// test.php
	echo $path_array['extension'], "<br>";	// php
	echo $path_array['filename'], "<br>";	// test
?>
```

```
/home/work/menu
test.php
php
test
```

## 04. parse_url()

- 문자열을 URL로 해석하고 URL의 구성요소에 맞게 연관배열을 생성
- URL의 유효성 검사는 하지 않는다.

```php
<?php
	$path=parse_url("http://127.0.0.1/test/test.php?user=user01&pass=1234");

	foreach($path as $key=>$data){
    	echo "[".$key."] : ".$data."<br/>";
	}
?>
```

```
[scheme] : http
[host] : 127.0.0.1
[path] : /test/test.php
[query] : user=user01&pass=1234
```

## 05. urlencode()

- URL에 공백이나 한글로 된 경우에 인코딩이 필요한 경우 인코딩을 해주는 함수

```php
<?php
	echo urlencode('테스트.php');
?>
```

```
%ED%85%8C%EC%8A%A4%ED%8A%B8.php
```

## 06. urldecode()

- urlencode()로 인코딩된 문자열을 디코딩하는 함수

```php
<?php
	echo urldecode('%ED%85%8C%EC%8A%A4%ED%8A%B8.php');
?>
```

```
테스트.php
```

## 07. explode()

- 문자열을 분할하여 배열로 저장하는 함수

```php
<?php
	$str = "하나 둘 셋 넷";
	$str_array = explode(' ', $str);

	for($cnt = 0; $cnt < count($str_array); $cnt++){
		echo $str_array[$cnt], "<br>";
	}
?>
```

```
하나
둘
셋
넷
```

## 08. implode()

- 배열을 하나의 문자열로 만드는 함수

```php
<?php
	$str = "하나 둘 셋 넷";
	$str_array = explode(' ', $str);	// 분해

	$str = implode(':', $str_array);	// 조립
	echo $str;
?>
```

```
하나:둘:셋:넷
```

## 09. preg_match()

- 인자로 주어진 정규표현식을 찾는 함수
- 찾으면 true, 아니면 false를 반환, $match가 붙는다면 포함된 문자열을 배열형태로 $match에 저장
- `preg_match(string %pattern, string %subject [, array $matches])`

```php
<?php
    // 찾을 문자열에 i가 붙으면 대소문자 구분하지 않는다.
	if (preg_match("/php/i", "PHP is the web scripting language of choice.", $match)) {
		echo "A match was found.<br>";
	} else {
    	echo "A match was not found.<br>";
	}

	echo $match[0];
?>
```

```
A match was found.
PHP
```

## 10. preg_split()

- 정규 표현식에 따라 문자열을 나누는 함수
- `preg_split(string $pattern, string %subject [, int $limit [, int $flags]])`
  - **$pattern** : 검색할 패턴 문자열
  - **$subject** : 입력 문자열
  - **$limit** : $limit회까찌 나눠진 문자열을 반환(-1 : 무제한)
  - **$flags** :
    - `PREG_SPLIT_NO_EMPTY` : 문자열을 나눈 후 비어있지 않은 데이터만을 반환
    - `PREG_SPLIT_OFFSET_CAPTURE` : 문자열의 시작 위치도 반환
    - `PREG_SPLIT_DELIM_CAPTURE` : 구분자 패턴 안의 서브패턴도 검출하여 반환

```php
<?php
	$str = "Hello World";

	$str_arr = preg_split('/ /', $str);

	for($cnt = 0; $cnt < count($str_arr); $cnt++){
		echo $str_arr[$cnt], "<br>";
	}
?>
```

```
Hello
World
```

## 11. preg_replace()

- 정규 표현식에 해당하는 패턴을 찾아서 다른 패턴으로 바꿔주는 함수
- `preg_replace(mix $pattern, mix $replacement, mix $subject)`

```php
<?php
	$str = "Hello World";

	$new_str = preg_replace('/hello/i', '안녕', $str);

	echo $new_str;
?>
```

```
안녕 World
```

## 12. strip_tags()

- 문자열에서 HTML 태그와 PHP 태그를 제거하는 함수

- `strip_tags(string $str [, string $allowable_tags])`

```php
<?php
	$str = "<p><strong>Hello</strong> World</P";

	echo strip_tags($str), "<br>";

	echo strip_tags($str, '<strong>');
?>
```

```
Hello World
Hello World		// 여기서는 보이지 않지만 <strong>이 적용된 문자열 출력
```

## 13. addslashes()

- 데이터베이스의 질의에서 처리할 필요가 있는 문자 앞에  백슬래시를 붙인 문자열을 반환

```php
<?php
	$str = "let's go";

	echo addslashes($str);
?>
```

```
let\'s go
```

## 14. stripslashes()

- addslashes()로 붙여준 백슬래시를 제거한 문자열을 반환

```php
<?php
	$str = "let's go";

	$add_slash_str = addslashes($str);

	$strip_slash_str = stripslashes($add_slash_str);

	echo $strip_slash_str;
?>
```

```
let's go
```

## 15. htmlspecialchars()

- 문자열에서 특정한 특수 문자를 HTML 앤티티로 변환하는 함수

  | 특수 문자 | 변환된 문자 |
  | :-------: | :---------: |
  |     &     |   `&amp;`   |
  |    ""     |  `&quot;`   |
  |    ''     |  `&#039;`   |
  |     <     |   `&lt;`    |
  |     >     |   `&gt;`    |

- `htmlspecialchars(string $string [, int $quote_style [, string $charset [, bool $double_encode]]])`

```php
<?php
	echo "<a href='test'>Test</a><br>";

	echo htmlspecialchars("<a href='test'>Test</a>");
?>

```

```
Test
<a href='test'>Test</a>
```

## 16. ucfirst()

- 문자열 중 첫 문자가 알파벳일 경우 대문자로 치환하는 함수

```php
<?php
	echo ucfirst("hello World.");
?>
```

```
Hello World.
```

## 17. lcfirst()

- 문자열 중 첫 문자가 알파벳이 겨우 소문자로 치환하는 함수

```php
<?php
	echo lcfirst("Hello World.");
?>
```

```
hello World.
```

## 18. strtolower()

- 문자열에서 대문자를 소문자로 변환하는 함수

```php
<?php
	echo strtolower("HeLlo WoRld.");
?>
```

```
hello world.
```

## 19. strtoupper()

- 문자열에서 소문자를 대문자로 변환하는 함수

```php
<?php
	echo strtoupper("HeLlo WoRld.");
?>
```

```
HELLO WORLD.
```

## 20. strlen()

- 문자열의 길이를 구하는 함수

```php
<?php
	echo strlen("HeLlo WoRld.");
?>
```

```
12
```

## 21. count()

- 배열의 개수를 구하는 함수

```php
<?php
	$str = "Hello World";

	$str_arr = preg_split('/ /', $str);

	echo count($str_arr)
?>
```

```
2
```

## 22. substr()

- 문자열의 일부분을 반환하는 함수
- `substr(string $str, int start [, int length])`
  - length가 음수일 경우 위치를 뜻함

```php
<?php
	echo substr('abcdefg', 3), "<br>";

	echo substr( 'abcdefg', 3, 2), "<br>";

	echo substr( 'abcdefg', -3, 2), "<br>";
	
	echo substr( 'abcdefg', -3, -1), "<br>";
?>
```

```
defg
de
ef
ef
```
