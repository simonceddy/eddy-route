<?php
require __DIR__ . '/vendor/autoload.php';

$r = new Eddy\Route\Router();

$r->get('/', function () {
    return new Zend\Diactoros\Response\JsonResponse('hello world');
});

$r->get('/test', function () {
    return new Zend\Diactoros\Response\JsonResponse('hello test');
});

$r->get('/testing', function () {
    return new Zend\Diactoros\Response\JsonResponse('hello test again');
});

$d = new mindplay\middleman\Dispatcher([$r, new Middlewares\RequestHandler()]);

(new Zend\HttpHandlerRunner\Emitter\SapiEmitter())->emit($d->dispatch(
    Zend\Diactoros\ServerRequestFactory::fromGlobals()
));

// dd($d, $r);
