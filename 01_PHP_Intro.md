# 01_PHP_Intro

<div style="text-align: right"><b>작 성 일 : 20.03.05.</b></div>
<div style="text-align: right"><b>작 성 자 : 김 한 석 &nbsp&nbsp</b></div>

## 1. PHP?

- **PHP(Professional Hypertext Preprocessor)**는 수많은 HTML로 만든 웹 페이지를 정적으로 동작하는 것이 아닌 **사용자 정의로 동적인 웹 애플리케이션을 만들기 위한 서버 사이드 스크립트 언어**

## 2. 장점

- 다양한 웹 템플릿 시스템, 웹 콘텐츠 관리 시스템 및 웹 프레임워크와 함께 사용 가능

- 오픈소스 기반으로 만들어져 누구나 쉽게 설치 가능
- 데이터베이스와 쉽게 연동 가능
- 웹 위에서 동작하기 때문에 OS에 관계없이 원하는 애플리케이션을 동작 가능

## 3. 데이터 타입

### 3.1 숫자

- 더하기

  ```php
  echo 1 + 1;
  ```
  
- 빼기

  ```php
  echo 1 - 1;
  ```
  
- 곱하기

  ```php
  echo 10 * 2;
  ```
  
- 나누기

  ```php
  echo 10 / 2;
  ```

### 3.2 문자

#### 3.2.1 문자열

```php
echo 'Hello World';
```

#### 3.2.2 큰 따옴표("") vs 작은 따옴표('')

- 큰 따옴표("")를 쓰면 변수를 치환해서 출력해 준다.

  ```php
  $name = PHP;
  echo "Hello World $name";	// Hello World PHP
  ```
  
- 작은 따옴표('')를 쓰면 문자열을 그대로 출력해 준다.

  ```php
  $name = PHP;
  echo 'Hello World $name';	// Hello World $name
  ```

## 4. 변수

- PHP에서는 데이터 타입을 적지 않고 `$`로 변수명을 정해서 사용 가능하다.

  ```php
  $name = PHP;
  $int = 1;
  $float = 1.5;
  ```

## 5. 배열

### 5.1 1차원 배열

- 배열 생성

  ```php
  $arr = array();
  ```

- 배열 입력

  ```php
  $arr[0] = "apple";
  $arr[1] = "banana";
  $arr[2] = "orange";
  ```

- 생성과 동시에 초기화

  ```php
  $arr = array("apple", "banana", "orange");
  ```

### 5.2 다차원 배열

- 배열 생성

  ```php
  $arr = array(
  	array(),
      array(),
      ...
  );
  ```

- 배열 입력

  ```php
  $arr[0][0] = "apple";
  $arr[0][1] = "korea";
  $arr[0][2] = 1000;
  
  $arr[1][0] = "banana";
  $arr[1][1] = "philippines";
  $arr[1][2] = 2000;
  ```

- 생성과 동시에 초기화

  ```php
  $arr = array(
  	array("apple", "korea", 1000),
      array("banana", "philippines", 2000)
  );
  ```

### 5.3 연관 배열

- PHP에서는 숫자뿐만 아니라 문자열도 배열 요소의 인덱스로 사용 가능

- 배열 참조

  ```php
  $arr = array();
  $arr["apple"] = 1000;
  $arr["banana"] = 2000;
  $arr["orange"] = 1500;
  ```

- 생성과 동시에 초기화

  ```php
  $arr = array("apple" => 1000, "banana" => 2000, "orange" => 1500);
  ```

## 6. 클래스

### 6.1 클래스와 인스턴스

```php
class MyFileObject {
    function isFile() {
        return is_file('data.txt');
    }
}

$file = new MyFileObject();
var_dump($file->isFile());	// 클래스의 변수나 메서드 접근
```

### 6.2 생성자

```php
class MyFIleObject {
    function __construct($fname) {
        $this->filename = fname;
    }
    
    function isFile() {
        return is_file($this->filename);
    }
}

$file = new MyFileObject('data.txt');

var_dump($file->isFile());
var_dump($file->filename);	// php는 변수를 따로 선언하지 않아도 생성자의 $this로 접근 가능
```

### 6.3 상속

```php
<?php
class Animal{
    function run(){
        print('running...<br>');
    }
    function breathe(){
        print('breathing...<br>')
    }  
}    

class Human extends Animal{
    function think(){
        print('thinking...<br>');
    }
    function talk(){
        print('talking...<br>')
    }
}
$human = new Human();
$human->run();
$human->think();
?>
```





