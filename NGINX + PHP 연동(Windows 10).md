# NGINX + PHP 연동(Windows 10)

## 1. NGINX 설치

- [NGINX 다운로드](http://nginx.org/en/download.html)

- NGINX 파일을 원하는 경로에 압축 해제

- `\conf`의 `nginx.conf` 파일 수정

  ```
  ...
  
  server {
  	# 포트 번호
  	listen	포트번호;
  	server_name localhost;
  	
  	...
  	
  	location / {
  		root	html;
  		index	index.html index.htm index.php;
  	}
  	
  	...
  	
  	# pass the PHPscripts to FastCGI server listening on 127.0.0.1:9000
  	#
  	location ~ \.php$ {
  		root			html
  		fastcgi_pass	127.0.0.1:9000;
  		fastcgi_index	index.php;
  		fastcgi_param	SCRIPT_FILENAME nginx경로/html$fastcgi_script_name;
  		include			fastcgi_prams;
  	}
  	
  	...
  }
  ```

## 2. PHP 연동

- `nginx.exe`를 실행

- PHP가 설치된 폴더에서 CMD 실행 후

  - **PHP는 꼭 NTS 버전이어야 함!!!**
    - TS 버전 : 다중 스레드 가능 빌드로 멀티 스레드 SAPI(server API)와 PHP를 웹서버에 로드할 경우
    - NTS 버전 : 단일 스레드 가능 빌드로 멀티 스레딩을 사용하지 않고 FastCGI 프로토콜을 통한 웹서버를 사용할 경우

  ```bash
  $ php-cgi -b 127.0.0.1:9000 -c php.ini
  ```
  
  - **PHP가 C 드라이브가 아닌 다른 드라이브에 설치되었다면 -c 뒤의 옵션을 넣어주어야 함**
