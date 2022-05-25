<?php

namespace Aigletter\Framework\routers;

use Aigletter\App\Controllers\CoinFlipController;
use Aigletter\App\Controllers\HomeController;
use Aigletter\App\Controllers\ShopController;
use Mursalov\Routing\Router;

/** @var Router $router */
$router->addRoute('/', [HomeController::class, 'index']);
$router->addRoute('/shop/show', [ShopController::class, 'show']);
$router->addRoute('/coin/flip', [CoinFlipController::class, 'flip']);
//test exception
$router->addRoute('/coin/flipflip', [CoinFlipController::class, 'flipflip']);