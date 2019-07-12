<?php
namespace Eddy\Route;

use FastRoute\Dispatcher\GroupCountBased;

class Dispatcher extends GroupCountBased
{
    protected $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
        parent::__construct($router->getData());
    }
}
