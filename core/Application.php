<?php

namespace Aigletter\Framework;

use Aigletter\App\Controllers\HomeController;
use Aigletter\App\Controllers\ShopController;
use Aigletter\Framework\Exceptions\GetComponentException;
use Aigletter\Framework\Interfaces\RunnableInterface;

class Application implements RunnableInterface
{
    protected static $instance;
    protected array $config;

    private function __construct(array $config)
    {
        $this->config = $config;
    }

    public static function getApp(array $config = []): Application
    {
        if (self::$instance === null) {
            self::$instance = new self($config);
        }

        return self::$instance;
    }

    public function run()
    {
        $router = $this->getComponent('router');
        require_once __DIR__ . '/../routes/routes.php';
        $action = $router->route($_SERVER['REQUEST_URI']);
        return $action();
    }

    public function getComponent($key)
    {
        if (isset($this->config['components'][$key]['factory'])) {
            $factoryClass = $this->config['components'][$key]['factory'];
            $arguments = $this->config['components'][$key]['arguments'] ?? [];
            return (new $factoryClass($arguments))->createComponent();
        }
        /*$class = $this->config['components'][$key]['class'];
        if (class_exists($class)) {
            $instance = new $class();
            return $instance;
        }*/


        throw new GetComponentException('Component not found');
    }
}