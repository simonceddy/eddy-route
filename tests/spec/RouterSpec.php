<?php

namespace spec\Eddy\Route;

use Eddy\Route\Router;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RouterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Router::class);
    }

    function it_can_add_routes()
    {
        $this->map('GET', '/', function () {
            return 'test';
        });

        $data = $this->getData()[0];

        $data->shouldHaveKey('GET');
        $data['GET']->shouldHaveKey('/');
    }
}
