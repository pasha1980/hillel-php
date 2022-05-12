<?php

namespace Aigletter\Framework\Components\Routing;


use Aigletter\Contracts\ComponentFactory;
use Mursalov\Routing\Router;

class RouterFactory extends ComponentFactory
{
    protected function createConcreteComponent(): Router
    {
        return new Router();
    }
}