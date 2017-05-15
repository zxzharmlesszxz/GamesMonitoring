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
        $module = explode('\\', strtolower($route->Module))[1];
        $this->Routes->addItem($route, "$module/$route->Action");
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

    public function startRouting()
    {
        global $core;
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $Module_name = (!empty($routes[1]) ? $routes[1] : 'Main');
        $Action_name = (!empty($routes[2]) ? $routes[2] : 'index');

        echo "Module: $Module_name<br>";
        echo "Action: $Action_name<br>";

        $module = $core->getModule(ucfirst($Module_name));
        echo $module->action($Action_name);
    }
}
