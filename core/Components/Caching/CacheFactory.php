<?php

namespace Aigletter\Framework\Components\Caching;


use Aigletter\Contracts\ComponentFactory;

class CacheFactory extends ComponentFactory
{
    protected function createConcreteComponent()
    {
        return new Cache($this->arguments['filename']);
    }
}