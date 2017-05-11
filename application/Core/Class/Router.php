<?php

/**
 * Class Route
 */

namespace Core;

use Core\Interfaces\RouterInterface;
use Core\Interfaces\SingletonInterface;

class Router implements RouterInterface, SingletonInterface
{
    /**
     * @var
     */
    private static $instance;

    protected $routes;

    private function __construct()
    {
        $this->routes = new Collection();
    }

    /**
     *
     */
    static public function start()
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $action_name = (!empty($routes[2]) ? $routes[2] : 'index');

        echo "Action: $action_name <br>";
    }

    /**
     * @param $key
     * @return mixed|void
     */
    public function __get($key)
    {

    }

    /**
     * @return Router
     */
    static public function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     *
     */
    public function __clone()
    {

    }

    /**
     *
     */
    public function __wakeup()
    {

    }
}
