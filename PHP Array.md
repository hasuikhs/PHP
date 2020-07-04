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

## 4. array_count_values()

- 동일한 배열의 값의 개수를 구함
- 동일한 배열의 개수를 합한 값을 그대로 배열로 리턴

```php
$test = array('one', 'two', 'two', 'three');

$count = array_count_values($test);
```

```
Array ('one' => 1, 'two' => 2, 'three' => 1)
```

## 5. array_keys()

- 배열의 키값을 반환

```php
$test = aray('a' => 'apple', 'b' => 'banana');

$test_key = array_keys($test);
```

```
Array ( [0] => 'a', [1] => 'b')
```

## 6. array_merge()

- 두 개 이상의 배열을 하나로 합침
- 합쳐질 배열들의 키값이 같다면 뒤의 배열값으로 덮어씌움

```php
$arr1 = array('a' => 'apple', 'b' => 'banana');
$arr2 = array('c' => 'coconut');

$mergeArr = array_merge($arr1, $arr2);
```

```
Array ('a' => 'apple', 'b' => 'banana', 'c' => 'coconut')
```

## 7. array_reverse()

- 원래 배열 값을 역순으로 저장

```php
$arr = array(1, 2, 3, 4);

$rev = array_reverse($arr);
```

```
Array (4, 3, 2, 1)
```

## 8. array_push()

- 배열의 맨 뒤에 한개나 그 이상의 원소를 더함

```php
$test = array(1, 2);

array_push($test, 3, 4);
```

```
Array (1, 2, 3, 4)
```

## 9. array_pop()

- 배열의 맨 뒤에 있는 원소를 꺼내고 그 원소를 삭제

```php
$stack = array ("orange", "banana", "apple", "raspberry");

$fruit = array_pop($stack);
```

- 원본을 건드리므로 $stack에는 'raspberry'가 없어짐

## 10. array_unshfit()

- 배열의 맨 앞에 한개나 그 이상의 원소를 추가

```php
$fruits = ["Banana", "Orange"];
array_unshift($fruits, "Apple");

print_r( $fruits );
# Array
# (
#     [0] => Apple
#     [1] => Banana
#     [2] => Orange
# )
```

## 11. array_shift()

- 배열의 맨 앞에 있는 원소를 꺼내고 삭제

```php
$fruits = ["orange", "banana", "apple"];
$fruit = array_shift( $fruits );

var_dump( $fruit );
# string(6) "orange"

print_r( $fruits );
# Array
# (
#     [0] => banana
#     [1] => apple
# )
```

