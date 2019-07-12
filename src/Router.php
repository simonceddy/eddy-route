<?php
namespace Eddy\Route;

use FastRoute\RouteCollector;
use FastRoute\RouteParser;
use FastRoute\DataGenerator;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Server\RequestHandlerInterface as Handler;
use Middlewares\FastRoute as RouterMiddleware;

/**
 * The Router class acts as a decorator for RouteCollector.
 */
class Router extends RouteCollector implements MiddlewareInterface
{
    /**
     * The Dispatcher instance
     *
     * @var Dispatcher
     */
    protected $dispatcher;

    protected $psr15;

    public function __construct(
        RouteParser $routeParser = null,
        DataGenerator $dataGenerator = null
    ) {
        parent::__construct(
            $routeParser ?? new Parser\RouteParser(),
            $dataGenerator ?? new Data\RouteDataGenerator()
        );
    }

    public function route(string $method, string $path, $handler)
    {
        $this->addRoute($method, $path, $handler);
        return $this;
    }

    public function map(string $method, string $path, $handler)
    {
        $this->addRoute($method, $path, $handler);
        return $this;
    }

    public function dispatcher()
    {
        isset($this->dispatcher) ?: $this->dispatcher = new Dispatcher($this);
        return $this->dispatcher;
    }

    /**
     * Adds as a route group.
     *
     * @param string $path
     * @param callable $callback
     *
     * @return self
     */
    public function group(string $path, callable $callback)
    {
        $this->addGroup($path, $callback);
        return $this;
    }

    public function process(Request $request, Handler $handler): Response
    {
        return $this->psr15()->process($request, $handler);
    }

    /**
     * Get the PSR-15 Middleware instance
     *
     * @return MiddlewareInterface
     */
    public function psr15()
    {
        isset($this->psr15) ?: $this->psr15 = new RouterMiddleware($this->dispatcher());
        return $this->psr15;
    }
}
