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

    protected $Query;

    /**
     * Router constructor.
     */
    private function __construct()
    {
        $this->Routes = new Collection();
        $this->Query = new Query();
    }

    /**
     * @param $key
     * @return mixed|void
     */
    public function __get($key)
    {

    }

    /**
     * @return null
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
        return ($this->Routes->keyExists($route)) ? $this->Routes->getItem($route) : false;
    }

    /**
     * @return Collection
     */
    public function getRoutes()
    {
        return $this->Routes;
    }

    /**
     * @param Core $core
     * @throws \Exception
     */
    public function startRouting(Core $core)
    {
        $route = explode('/', explode('?', $_SERVER['REQUEST_URI'])[0]);
        $Module_name = (!empty($route[1]) ? $route[1] : 'example');
        $Action_name = (!empty($route[2]) ? $route[2] : 'index');
        $croute = $this->getRoute(new Route('Module\\' . ucfirst($Module_name), $Action_name));

        echo "Try to get route: /$Module_name/$Action_name<br>";
        if ($croute) {
            echo "Module: $Module_name<br>";
            echo "Action: $Action_name<br>";
            echo "Query: <br>";
            print_r($this->Query->getQuery());
            echo "<br>";

            $module = $core->getModule(ucfirst($Module_name));
            echo $module->action($Action_name);
            var_dump($module);
        } else {
            throw new \Exception("Route /$Module_name/$Action_name: not found!");
        }
    }
}
