<?php

namespace Aigletter\App\Components\Test;

use aigletter\contracts\ComponentFactory;

class TestFactory extends ComponentFactory
{
    protected function createConcreteComponent()
    {
        return new Test();
    }
}