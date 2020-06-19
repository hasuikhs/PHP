# Apache 2.4 + PHP 7.4.4 (Windows 10)

## 1. Apache 2.4 설치

- [Apache 2.4 다운로드](https://www.apachelounge.com/download/)

- [비주얼 C++ 설치](https://www.microsoft.com/ko-kr/download/details.aspx?id=53840)

- Apache 2.4 파일을 원하는 경로에 압축 해제

- `\conf`의 `httpd.conf` 파일 수정

  ```
  ...
  
  Define SRVROOT "아파치 경로"
  ServerRoot "${SRVROOT}"
  
  ...
  
  # 포트
  Listen 80
  
  ...
  
  # 웹문서 저장위치 변경
  DocumentRoot "원하는 경로"
  <Directory "원하는 경로"
  ...
  
  # ServerName 변경
  ServerName localhost:포트
  ```

- 시스템 환경 변수 Path 등록

  - `아파치 경로\bin` 추가

- cmd창 열고 

  ```bash
  $ httpd -k install
  ```

## 2. PHP 7.4.4 설치

- [PHP 7.4.4 다운로드](https://windows.php.net/download/)
  
- Binaries and sources Releases에서 원하는 버전, 비트, None Thread Safe 후 Zip 파일 다운로드
  
  - **FastCGI 방식으로 구동할 것이기 때문에 None Thread Safe**
  
- 원하는 설치 경로에 압축 해제

- `php.ini-production` 파일 수정

  ```
  # extension_dir = "./" 찾아서 주석 해제 후
  extension_dir = "php 설치 경로/ext"
  ```

- `php.ini-production` 파일명 `php.ini`로 수정

## 3. Apache - PHP 연동

- `아파치 설치 경로\conf\httpd.conf`

  - `<IfModule dir_module>`을 찾아서 `DirectoryIndex`dp `index.php`를 `index.html` 앞에 추가

  - 다음 구문 맨 밑에 추가

    ```
    PHPIniDir "php.ini 파일 경로"
    LoadModule php7_module "php 설치 경로/php7apache2_4.dll"
    AddType application/x-httpd-php .html .php
    AddHandler application/x-httpd-php .php
    ```

- cmd

  ```bash
  $ httpd -k restart
  ```

