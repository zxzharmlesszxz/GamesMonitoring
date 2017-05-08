<?php

/**
 * Class Route
 */

namespace Core;

use Core\Interfaces\RouterInterface;

class Router implements RouterInterface
{
    /**
     *
     */
    static public function start()
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $controller_name = 'Controller';
        $action_name = (!empty($routes[2]) ? $routes[2] : 'index');
        $model_name = 'Model';

        echo "Model: $model_name <br>";
        echo "Controller: $controller_name <br>";
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
}
