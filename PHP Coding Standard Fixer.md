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