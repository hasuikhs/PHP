# PHP Spreadsheet

## 0. 사전 준비

### 0.1 Composer 설치

- [Composer 다운로드 및 설치](http://getcomposer.org/download )
  - **Install Shell Menus** 선택

### 0.2 php.ini 수정

- `세미콜론(;)` 제거

  ```
  extension=fileinfo
  extension=gd2
  extension=mbstring
  extension=openssl
  ```

## 1. PHP Spreadsheet 시작하기

### 1.1 설치

```bash
$ composer require phpoffice/phpspreadsheet
```

### 1.2 사용

```php
require_once __DIR__.'vendor/autoload.php';	// 위의 설치 경로 불러오기
$oSpreadsheet = \PhpOffice\phpspreadsheet\IOFactory::load($excelFileName)
```





