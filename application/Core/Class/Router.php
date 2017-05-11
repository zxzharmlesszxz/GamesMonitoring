<?php

/**
 * Class Route
 */

namespace Core;

use Core\Interfaces\RouterInterface;
use Core\Interfaces\SingletonInterface;

/**
 * Class Router
 * @package Core
 */
class Router implements RouterInterface, SingletonInterface
{
    /**
     * @var
     */
    private static $instance;

    /**
     * @var Collection
     */
    protected $routes;

    /**
     * Router constructor.
     */
    private function __construct()
    {
        $this->routes = new Collection();
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

    /**
     * @param Route $route
     * @return mixed|void
     */
    public function setRoute(Route $route)
    {
        $this->routes->addItem($route, $route);
    }

    /**
     * @param Route $route
     * @return mixed
     */
    public function getRoute(Route $route)
    {
        return $this->routes->getItem($route);
    }

    /**
     * @return Collection
     */
    public function getRoutes()
    {
        return $this->routes;
    }
}
