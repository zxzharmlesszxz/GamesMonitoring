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
    private static $instance = null;

    /**
     * @var Collection
     */
    protected $Routes;

    /**
     * Router constructor.
     */
    private function __construct()
    {
        $this->Routes = new Collection();
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
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
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
        $this->Routes->addItem($route, "$route->Module/$route->Action");
    }

    /**
     * @param Route $route
     * @return mixed
     */
    public function getRoute(Route $route)
    {
        return $this->Routes->getItem($route);
    }

    /**
     * @return Collection
     */
    public function getRoutes()
    {
        return $this->Routes;
    }
}
