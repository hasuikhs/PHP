# VS Code PHP Debug

## 1. VS Code

### 1.1 확장 프로그램 설치

- PHP IntelliSense : PHP 코드 힌트
- PHP Intelephense : PHP  문법
- PHP Debug : PHP 디버그

### 1.2 Settings

- VS Code File > Preferences > Settings에서 `Edit in settings.json` 선택

  ```
  "php.validate.enable" : false
  ```

## 2. XDebug

- 설정 전에 자신이 쓰고 있는 PHP 폴더가 맞는지 꼭 확인

- [https://xdebug.org/wizard](https://xdebug.org/wizard)에 자신의 `phpinfo()`가 출력하는 모든 정보(`ctrl + a`)를 입력

  - 다운로드 링크를 눌러 dll 다운로드

  - 해당 dll을 `PHP루트/ext`에 이동

  - `php.ini` 추가

    ```
    [XDebug]
    zend_extension = PHP루트\ext\php_xdebug-2.9.2-7.3-vc15-nts-x86_64.dll
    xdebug.remote_enable = 1
    xdebug.remote_autostart = 1
    ```

- VS Code로 돌아와서 Debug 탭 열기

  - `Create a lanunch.json file` 클릭
  - 여기서 상단에 Select Environment 드롭 다운 표시에서 `PHP` 선택

  - 다시 Debug 탭으로 돌아와서 
  - `Listen for Xdebug`를 눌러 `Launch currently open script` 선택 후 `F5`를 눌러 디버깅