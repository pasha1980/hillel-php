<?php

namespace Aigletter\Framework\Components\Routing;

use Aigletter\App\Controllers\HomeController;
use Aigletter\App\Controllers\ShopController;
use Aigletter\Framework\Interfaces\RouteInterface;

class Router implements RouteInterface
{
    public function __construct()
    {

    }

    public function route(string $uri): callable
    {
        if ($uri === '/') {
            $controller = new HomeController();
            $method = 'index';
        } else {
            $segments = explode("/", $uri);

            array_shift($segments);

            if ($segments[0] === 'shop') {
                $controller = new ShopController();
                if ($segments[1] === 'show') {
                    $method = 'show';
                }
            }
        }

        if (isset($controller, $method) && method_exists($controller, $method)) {
            return static function () use ($controller, $method) {
                return $controller->$method();
            };
        }

        http_response_code(404);
        echo '404 Not found';
        die();
    }
}