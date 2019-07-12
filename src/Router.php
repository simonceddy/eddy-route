<?php
namespace Eddy\Route;

use FastRoute\RouteCollector;
use FastRoute\RouteParser;
use FastRoute\DataGenerator;

/**
 * The Router class acts as a decorator for RouteCollector.
 */
class Router extends RouteCollector
{
    /**
     * The Dispatcher instance
     *
     * @var Dispatcher
     */
    protected $dispatcher;

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
}
