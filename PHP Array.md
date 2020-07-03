# PHP Array

## 1. array()

- 기본적인 배열을 생성시키는 함수

```php
$arr = array()
```

## 2. list()

- 변수를 배열처럼 만듦

```php
$test = array(1,"2","3");

while (list($key, $val) = each($test)){
     echo $key."=>".$val."<br/>";
}
```

```
0=>1
1=>2
2=>3
```

## 3. each()

- 배열에서 다음 키 이름과 배열 값을 쌍으로 돌려줌

```php
$people = array("Peter", "Joe", "Glenn", "Cleveland");
print_r (each($people));
```

```
Array ( [1] => Peter [value] => Peter [0] => 0 [key] => 0 )
```



