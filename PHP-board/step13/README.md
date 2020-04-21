Class autoload

```php
function my_autoloader($className) {
    include __DIR__ . '/../classes/' . $className . 'class.php';
}
spl_autoload_register('my_autoloader');
```

