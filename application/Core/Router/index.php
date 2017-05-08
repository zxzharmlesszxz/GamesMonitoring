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
        $controller_name = 'Controller_' . (!empty($routes[1]) ? $routes[1] : 'Main');
        $action_name = 'action_' . (!empty($routes[2]) ? $routes[2] : 'index');
        $model_name = 'Model_' . (!empty($routes[1]) ? $routes[1] : 'Main');

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
