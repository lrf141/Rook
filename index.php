<?php
require_once 'vendor/autoload.php';

// sample php programs
echo 'hello';
$engine = new Lrf141\Rook\Engine('template/sample');
$engine->render('sample', ['msg' => 'hello!!']);
