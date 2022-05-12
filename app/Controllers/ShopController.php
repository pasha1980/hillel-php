<?php

namespace Aigletter\App\Controllers;

use Aigletter\Framework\Application;

class ShopController
{
    public function __construct()
    {
        $cache = Application::getApp()->getComponent('cache');
        $cache->set('hello', 'Hello world!!!!');
    }

    public function show()
    {
        $cached = Application::getApp()->getComponent('cache')->get('hello');
        echo 'Shop controller show method. Cached value: ' . $cached . '<br>';

        echo Application::getApp()->getComponent('test')->sayHello();
    }
}