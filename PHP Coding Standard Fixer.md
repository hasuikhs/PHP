# PHP Coding Standard Fixer

- PSR-1과 PSR-2에 맞게 코딩 스타일을 교정

## 0. PSR(PHP Standard Recommendation)

### 0.1 PSR-0

- autoloader를 통해 클래스를 손쉽게 로딩 가능케 하는 표준
- PSR-4가 제정되면서 무효화
- PSR-4는 PHP 5.4 이상에서 사용 가능하므로 그 이하 버전에서는 PSR-0을 따라야함

### 0.2 PSR-1

- PHP 파일은 BOM(Byte Order Mark) 없는 UTF-8 인코딩을 사용

- `namespace`와 `class`는 오토로딩 표준(PSR-0, PSR-4)를 따를 것

  ```php
  <?php
  namespace Vendor\Model;
  
  class Foo
  {
  	// code
  }
  ```

- 클래스 이름은 반드시 PascalCase를 따를 것

- 클래스 내 상수는 반드시 모두 대문자로 작성하고 구분자를 `_`를 사용할 것

- 클래스 내 메소드의 이름은 반드시 camelCase를 사용할 것

### 0.3 PSR-2

> PSR-1 표준의 연장선으로 가독성이 좋도록 더욱 구체적인 코딩 스타일을 가이드

- Indent는 `tab` 대신 4칸의 `space` 사용

- 다는 태그(`?>`)는 사용하지 않음

- `namespace` 선언 뒤에는 한줄의 공백을 사용하고 여러 개의 use는 줄 공백업이 사용 후에 마지막 블록 뒤에 한 줄의 공백을 사용할 것

- 클래스와 메소드 구문의 여는 괄호는 다음 줄에 사용하고 닫는 괄호는 본문 다음 줄에 사용할 것

- 가시성과 관련된 키워드인 `abstract`와 `final` 은 모든 메소드와 프로퍼티에 명시적으로 사용하고 제일 먼저 와야하며 `static` 구문은 그 후에 위치시킬 것

- `if`나 `elseif` 같은 제어 관련 구문은 제어문 뒤에 한 개의 공백을 두고 그 후에 괄호를 사용하고 조건문을 기술할 것

- 함수 호출이나 메소드 호출은 메소드명 뒤에 공백이 존재하면 안됨

- `if`나 `elseif` 같은 제어 관련 구문의 여는 괄호는 제어문과 같은 줄에 위치해야 하며 닫는 괄호는 본문의 다음 줄에 위치

  ```php
  <?php
  namespace Vendor\Package;
  
  use FooInterface;
  use BarClass as Bar;
  
  class Foo extends Bar implements FooInterface
  {
      public function sampleFunction($a, $b = null)
      {
  		if ($a === $b) {
              bar();
          } elseif ($a > $b) {
              $foo->bar($arg1);
          }
  	}
  }
  ```

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

  