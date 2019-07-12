<?php
require __DIR__ . '/vendor/autoload.php';

$r = new Eddy\Route\Router();

$r->get('/', function () {
    return new Zend\Diactoros\Response\JsonResponse('hello world');
});

$d = $r->dispatcher();

$r->get('/test', function () {
    return new Zend\Diactoros\Response\JsonResponse('hello test');
});

dd($d, $r);
