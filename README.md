# Laravel Check Default Password

Check is user using default password and force them to change their password. 
This package compatible for Laravel 6.x, 7.x, 8.x, 9.x, 10,x

## Installation

You can install the package via composer:

```bash
composer require yudhatp/laravel-check-default-password
```

publish config file with:

```bash
php artisan vendor:publish --tag=yudhatp-check-default-password-config
```

## Usage

on "kernel.php", add this line on your "protected $middlewareGroups"
```php
'web' => [
    ...
    \Yudhatp\CheckDefaultPassword\Middleware\CheckDefaultPasswordMiddleware::class,
    ...
],
```

## Setting Config

change default laravel user field. at default the value is "id"

```php
'user' => 'id'
```

change redirect url to form change password

```php
'redirect' => 'profile'
```

set password which not allowed
```php
'passwords' => [
    ...
    '1234',
    '123456',
    ...
]
```

set except routes. make sure your redirect url (for change password) is on this list
```php
'except-routes' => [
    ...
    'login',
    'logout',
    'profile',
    ...
]
```


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
