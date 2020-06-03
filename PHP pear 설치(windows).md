# PHP pear 설치(windows)

- PHP 확장 라이브러리

## 1. `go-pear.phar` 다운로드

- [https://pear.php.net/go-pear.phar](https://pear.php.net/go-pear.phar) 이 주소로 들어가서 전체 복사
- php 폴더에 `go-pear.phar`로 저장

## 2. 시작 - 명령프롬프트 - 관리자 권한 실행

- 명령 프롬프트를 관리자 권한으로 실행

  - 관리자 권한으로 실행하지 않으면 권한 오류 출력

- 명령 프롬프트에서 php 경로로 이동

  ```bash
  $ cd C:\{path}\php
  ```

- `go-pear.phar`을 php로 실행

  ```bash
  $ php.exe go-pear.phar
  ```

  - **시스템/로컬 설치**

    ```bash
    Are you installing a system-wide PEAR or a local copy?
    (system|local) [system] :
    ```

    - system이면 `system`이나 그냥 `Enter`키 입력
    - local이면 `local` 입력

  - **php.exe 지정**

    - 위를 입력하면 아래와 같은 창 출력

    ```bash
    Below is a suggested file layout for your new PEAR installation.  To
    change individual locations, type the number in front of the
    directory.  Type 'all' to change all of them or simply press Enter to
    accept these locations.
    
     1. Installation base ($prefix)                   : C:\Dev\PHP
     2. Temporary directory for processing            : C:\Dev\PHP\tmp
     3. Temporary directory for downloads             : C:\Dev\PHP\tmp
     4. Binaries directory                            : C:\Dev\PHP
     5. PHP code directory ($php_dir)                 : C:\Dev\PHP\pear
     6. Documentation directory                       : C:\Dev\PHP\docs
     7. Data directory                                : C:\Dev\PHP\data
     8. User-modifiable configuration files directory : C:\Dev\PHP\cfg
     9. Public Web Files directory                    : C:\Dev\PHP\www
    10. System manual pages directory                 : C:\Dev\PHP\man
    11. Tests directory                               : C:\Dev\PHP\tests
    12. Name of configuration file                    : C:\Windows\pear.ini
    13. Path to CLI php.exe                           :
    
    1-13, 'all' or Enter to continue:
    ```

    - 현재 13번이 비어있으므로 **php.exe의 경로를 지정**해 주어야 함 `13` 입력

    - 폴더를 선택할 수 있는 창이 하나 뜨면 찾아서 추가하면

      ```
      1-13, 'all' or Enter to continue: 13
      php.exe (sapi: cli) found.
      ```

    - 위처럼 출력되고  확인

      ```bash
      Below is a suggested file layout for your new PEAR installation.  To
      change individual locations, type the number in front of the
      directory.  Type 'all' to change all of them or simply press Enter to
      accept these locations.
      
       1. Installation base ($prefix)                   : C:\Dev\PHP
       2. Temporary directory for processing            : C:\Dev\PHP\tmp
       3. Temporary directory for downloads             : C:\Dev\PHP\tmp
       4. Binaries directory                            : C:\Dev\PHP
       5. PHP code directory ($php_dir)                 : C:\Dev\PHP\pear
       6. Documentation directory                       : C:\Dev\PHP\docs
       7. Data directory                                : C:\Dev\PHP\data
       8. User-modifiable configuration files directory : C:\Dev\PHP\cfg
       9. Public Web Files directory                    : C:\Dev\PHP\www
      10. System manual pages directory                 : C:\Dev\PHP\man
      11. Tests directory                               : C:\Dev\PHP\tests
      12. Name of configuration file                    : C:\Windows\pear.ini
      13. Path to CLI php.exe                           : C:\Dev\PHP\
      
      1-13, 'all' or Enter to continue:
      ```

      - 여기서 `Enter`키 입력

      ```bash
      Would you like to alter php.ini <C:\Dev\PHP\php.ini>? [Y/n] :
      ```

      - `y` 입력

  - **레지스트리 등록**

    - 위의 과정을 모두 따라오면 아래와 같은 출력문을 읽을 수 있음

      ```bash
      * WINDOWS ENVIRONMENT VARIABLES *
      For convenience, a REG file is available under C:\{path}\PHPPEAR_ENV.reg .
      This file creates ENV variables for the current user.
      
      Double-click this file to add it to the current user registry.
      ```

    - 해당경로에 있는 `PEAR_ENV.reg` 실행

    

