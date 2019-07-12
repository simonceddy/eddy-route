<?php
namespace Eddy\Route\Data;

use FastRoute\DataGenerator\GroupCountBased;

class RouteDataGenerator extends GroupCountBased
{
    public function __construct()
    {
        $this->staticRoutes = new \ArrayObject(
            [],
            \ArrayObject::ARRAY_AS_PROPS|\ArrayObject::STD_PROP_LIST
        );
        $this->methodToRegexToRoutesMap = new \ArrayObject(
            [],
            \ArrayObject::ARRAY_AS_PROPS|\ArrayObject::STD_PROP_LIST
        );
    }
}
