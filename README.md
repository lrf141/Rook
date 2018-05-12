# Rook
A simple template engine written in PHP

# How to use
```
$ composer require lrf141/rook
```
```php

use Lrf141\Rook\Engine;
$engine = new Engine('path/to/template');
echo $engine.render('template_name', ['data' => 'hello,world']);
```

```php:template_name.php
<?php
echo $data;
?>
<h1><?= $data ?></h1>
<?
```
