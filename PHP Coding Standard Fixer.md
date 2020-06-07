# PHP Coding Standard Fixer

- PSR-1과 PSR-2에 맞게 코딩 스타일을 교정

## 1. 설치

- composer

  ```bash
  $ php composer.phar global require fabpot/php-cs-fixer
  ```

##  2. 설정

- Windows

  ```bash
  set PATH=%PATH%; %APPDATA%\Composer\vendor\bin;
  ```

## 3. 사용

- `--verbose` : 자세한 진행 내역 출력
- `--dry-run` : 수정할 사항을 출력하고 실제 소스를 변경하지는 않음

## 4. VS Code에서 사용하기

### 4.1 설치

- 확장 프로그램에서 php cs fixer를 검색하고 설치

### 4.2 사용

- php 파일을 열고 `F1`키를 눌러 커멘드를 열고 `Format Document`를 실행하면 자동으로 수정

### 4.3 파일 저장할 때 자동으로 포매팅하기

- 설정에서

  ```json
  "php-cs-fixer" : "Onsave"
  ```

  