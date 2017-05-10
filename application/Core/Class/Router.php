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

    /**
     *
     */
    public function start()
    {
        $this->routes = new Collection();
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $action_name = (!empty($routes[2]) ? $routes[2] : 'index');

        echo "Action: $action_name <br>";
    }

    /**
     *
     */
    protected function ErrorPage404()
    {
        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');
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
