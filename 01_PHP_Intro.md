# 01_PHP_Intro

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
  <?php
      echo 1 + 1;
  ?>
  ```

- 빼기

  ```php
  <?php
      echo 1 - 1;
  ?>
  ```

- 곱하기

  ```php
  <?php
      echo 10 * 2;
  ?>
  ```

- 나누기

  ```php
  <?php
      echo 10 / 2;
  ?>
  ```

### 3.2 문자

#### 3.2.1 문자열

```php
<?php
    echo 'Hello World';
?>
```

#### 3.2.2 큰 따옴표("") vs 작은 따옴표('')

- 큰 따옴표("")를 쓰면 변수를 치환해서 출력해 준다.

  ```php
  <?php
      $name = PHP;
  	echo "Hello World $name";	// Hello World PHP
  ?>
  ```

- 작은 따옴표('')를 쓰면 문자열을 그대로 출력해 준다.

  ```php
  <?php
      $name = PHP;
  	echo 'Hello World $name';	// Hello World $name
  ?>
  ```

## 4. 변수

- PHP에서는 데이터 타입을 적지 않고 `$`로 변수명을 정해서 사용 가능하다.

  ```php
  <?php
      $name = PHP;
  	$int = 1;
  	$float = 1.5;
  ?>
  ```

  

